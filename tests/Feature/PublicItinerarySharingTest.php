<?php

namespace Tests\Feature;

use App\Models\Itinerary;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Tests\TestCase;

class PublicItinerarySharingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
            'session.driver' => 'array',
            'cache.default' => 'array',
        ]);
        DB::purge('sqlite');

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamps();
        });
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('module');
            $table->boolean('can_view')->default(false);
            $table->boolean('can_add')->default(false);
            $table->boolean('can_edit')->default(false);
            $table->boolean('can_delete')->default(false);
            $table->boolean('can_download')->default(false);
            $table->timestamps();
        });
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->integer('infant')->default(0);
        });
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('queryId')->default(0);
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('adult')->default(1);
            $table->integer('child')->default(0);
            $table->integer('package_theme_id')->nullable();
            $table->decimal('website_cost', 10, 2)->nullable();
            $table->date('website_validity')->nullable();
            $table->integer('accepted_hotel_option')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->timestamps();
        });
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        Schema::create('itinerary_destination', function (Blueprint $table) {
            $table->id();
            $table->foreignId('itinerary_id');
            $table->foreignId('destination_id');
            $table->timestamps();
        });
        Schema::create('package_themes', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
        });
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('itinerary_id');
        });
        Schema::create('package_day_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id');
            $table->string('type');
        });
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('country_code');
            $table->string('group_name');
            $table->string('key_name');
            $table->text('value')->nullable();
        });

        (require database_path('migrations/2026_10_23_000001_add_public_sharing_to_itineraries.php'))->up();
    }

    public function test_public_share_links_are_created_and_revoked_by_toggle(): void
    {
        $user = User::create([
            'name' => 'Share Test',
            'email' => Str::uuid().'@example.test',
            'password' => 'test-password',
            'email_verified_at' => now(),
        ]);
        DB::table('user_permissions')->insert([
            'user_id' => $user->id,
            'module' => 'Itinerary',
            'can_view' => true,
            'can_edit' => true,
        ]);
        DB::table('queries')->insert([
            'id' => 1,
            'mobile' => '+1 555 0100',
            'email' => 'customer@example.test',
            'name' => 'Share Customer',
            'infant' => 0,
        ]);
        $itinerary = Itinerary::create([
            'queryId' => 1,
            'name' => 'Test itinerary',
            'start_date' => '2026-10-23',
            'end_date' => '2026-10-25',
            'website_cost' => 123.45,
        ]);

        $this->actingAs($user)
            ->get(route('itinerary-share.create', $itinerary->id))
            ->assertOk()
            ->assertSee('Share Customer')
            ->assertSee('customer@example.test');

        $enabled = $this->actingAs($user)
            ->postJson(route('itinerary-share.update', $itinerary->id), ['linkSharing' => 1])
            ->assertOk()
            ->assertJsonPath('enabled', true);

        $withPriceUrl = $enabled->json('withPriceUrl');
        $withoutPriceUrl = $enabled->json('withoutPriceUrl');
        $this->assertNotSame($withPriceUrl, $withoutPriceUrl);
        $this->assertMatchesRegularExpression('#/shared-itinerary/[A-Za-z0-9]{64}$#', $withPriceUrl);
        $this->assertMatchesRegularExpression('#/shared-itinerary/[A-Za-z0-9]{64}$#', $withoutPriceUrl);
        $this->assertTrue($itinerary->fresh()->public_share_enabled);

        $this->app['auth']->logout();
        $this->get($withPriceUrl)->assertOk()->assertSee('123.45');
        $this->get($withoutPriceUrl)->assertOk()->assertDontSee('123.45');

        $this->actingAs($user);
        $this->postJson(route('itinerary-share.update', $itinerary->id), ['linkSharing' => 0])
            ->assertOk()
            ->assertJsonPath('enabled', false)
            ->assertJsonPath('withPriceUrl', '')
            ->assertJsonPath('withoutPriceUrl', '');

        $this->getJson($withPriceUrl)->assertNotFound();
        $this->getJson($withoutPriceUrl)->assertNotFound();
    }
}
