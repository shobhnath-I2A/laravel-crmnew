<?php
namespace Tests\Feature;

use App\Models\{AppSetting, User, Query, QueryInvoice, QueryPayment, QueryPaymentSchedule, QueryGuest, QueryLog, Itinerary};
use App\Services\QueryAccess;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\{DB, Http, Schema};
use Illuminate\Support\Str;
use Tests\TestCase;

/** Isolated fixtures: never run the legacy full migration chain or access the supplied .env database. */
class TravelWorkflowRegressionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:',
            'session.driver' => 'array', 'cache.default' => 'array', 'mail.default' => 'array', 'broadcasting.default' => 'null']);
        DB::purge('sqlite');
        Schema::create('users', function (Blueprint $t) {
            $t->id(); $t->string('name'); $t->string('email')->unique(); $t->string('password');
            $t->boolean('status')->default(1); $t->integer('role_id')->default(1);
            $t->integer('show_query_status')->default(0); $t->timestamp('last_seen_at')->nullable();
            $t->timestamp('email_verified_at')->nullable(); $t->rememberToken(); $t->timestamps();
        });
        Schema::create('branch_masters', function (Blueprint $t) { $t->id(); });
        Schema::create('role_masters', function (Blueprint $t) { $t->id(); $t->unsignedBigInteger('branch_id')->nullable(); });
        Schema::create('destinations', function (Blueprint $t) {
            $t->id(); $t->string('name');
        });
        (require database_path('migrations/2026_03_11_074541_create_queries_table.php'))->up();
        (require database_path('migrations/2026_05_25_103528_create_user_permissions_table.php'))->up();
        (require database_path('migrations/2026_07_08_113456_create_query_guests_table.php'))->up();
        (require database_path('migrations/2026_09_11_080412_create_query_logs_table.php'))->up();
        Schema::create('itineraries', function (Blueprint $t) {
            $t->id(); $t->unsignedBigInteger('queryId')->default(0); $t->string('name');
            $t->integer('status')->default(0); $t->integer('accepted_hotel_option')->nullable(); $t->timestamps();
        });
        Schema::create('suppliers', function (Blueprint $t) { $t->id(); });
        Schema::create('app_settings', function (Blueprint $t) {
            $t->id(); $t->integer('country_code'); $t->string('group_name'); $t->string('key_name'); $t->text('value')->nullable(); $t->timestamps();
        });
        Schema::create('packages', function (Blueprint $t) { $t->id(); $t->foreignId('itinerary_id'); });
        Schema::create('package_day_items', function (Blueprint $t) { $t->id(); $t->foreignId('package_id'); $t->string('type'); $t->timestamps(); });
        Schema::create('package_day_item_hotels', function (Blueprint $t) { $t->id(); $t->foreignId('package_day_item_id'); $t->integer('hotel_options')->nullable(); });
        (require database_path('migrations/2026_10_01_000001_create_query_workflow_tables.php'))->up();
        (require database_path('migrations/2026_10_23_000002_create_query_payment_schedules_table.php'))->up();
        (require database_path('migrations/2026_10_23_000003_add_payment_voiding_fields.php'))->up();
    }

    private function staff(array $attributes = []): User
    {
        return User::create(array_merge(['name' => 'Test Staff', 'email' => Str::uuid().'@example.test', 'password' => 'test-password', 'role_id' => 1, 'status' => 1, 'show_query_status' => 0], $attributes));
    }
    private function queryFor(User $user): Query
    {
        return Query::create(['name' => 'Test Customer', 'email' => 'customer@example.test', 'mobile' => '9999999999',
            'querytype' => 'Package', 'origin' => '1', 'destination' => '2', 'startDate' => '2026-10-20', 'endDate' => '2026-10-22',
            'adult' => 2, 'statusId' => 1, 'assignTo' => $user->id, 'created_by' => $user->id]);
    }
    private function invoiceFor(Query $query, User $staff): QueryInvoice
    {
        $itinerary = Itinerary::create(['name' => 'Test trip', 'queryId' => $query->id, 'status' => 1]);
        return QueryInvoice::create(['query_id' => $query->id, 'itinerary_id' => $itinerary->id,
            'currency' => 'INR', 'amount_minor' => 10000, 'description' => 'Agreed total', 'created_by' => $staff->id]);
    }
    private function paymentData(string $key, string $amount = '40.00'): array
    {
        return ['request_key' => $key, 'amount' => $amount, 'reference' => 'TX-123', 'method' => 'Bank', 'paid_on' => now()->toDateString()];
    }

    public function test_email_and_reports_require_login(): void
    {
        foreach (['/email-logs', '/compose-email/create?query_id=1', '/profit-loss-report'] as $url) {
            $this->get($url)->assertRedirect('/login');
        }
        $this->getJson('/test-mail')->assertNotFound();
    }
    public function test_visibility_scope_defaults_to_assigned_queries(): void
    {
        $a = $this->staff(['role_id' => 3]); $b = $this->staff(['role_id' => 3]);
        $own = $this->queryFor($a); $this->queryFor($b);
        $this->assertSame([$own->id], QueryAccess::scope(Query::query(), $a)->pluck('id')->all());
    }
    public function test_direct_query_url_cannot_bypass_list_visibility(): void
    {
        $a = $this->staff(['role_id' => 3]); $other = $this->queryFor($this->staff());
        DB::table('user_permissions')->insert(['user_id' => $a->id, 'module' => 'Query', 'can_view' => 1]);
        $this->actingAs($a)->getJson('/queries/'.$other->id)->assertNotFound();
    }
    public function test_guest_edit_cannot_move_guest_between_queries(): void
    {
        $user = $this->staff(); $a = $this->queryFor($user); $b = $this->queryFor($user);
        $guest = QueryGuest::create(['query_id' => $a->id, 'title' => 'Mr.', 'first_name' => 'Original', 'last_name' => 'Guest', 'gender' => 'Male', 'dob' => '2000-01-01']);
        $this->actingAs($user)->postJson('/query-guests', ['edit_id' => $guest->id, 'query_id' => $b->id,
            'title' => 'Mr.', 'first_name' => 'Changed', 'last_name' => 'Guest', 'gender' => 'Male', 'dob' => '01-01-2000'])->assertNotFound();
        $this->assertSame($a->id, $guest->fresh()->query_id);
    }
    public function test_guest_validation_returns_422(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user);
        $this->actingAs($user)->postJson('/query-guests', ['query_id' => $query->id])->assertUnprocessable();
        $this->assertDatabaseCount('query_guests', 0);
    }
    public function test_payment_retry_is_idempotent_and_uses_minor_units(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user); $this->invoiceFor($query, $user);
        $url = '/queries/'.$query->id.'/workflow/payments'; $data = $this->paymentData((string) Str::uuid(), '40.01');
        $this->actingAs($user)->post($url, $data)->assertRedirect();
        $this->post($url, $data)->assertRedirect();
        $this->assertDatabaseCount('query_payments', 1);
        $this->assertSame(4001, (int) QueryPayment::first()->amount_minor);
        $this->postJson($url, array_replace($data, ['amount' => '41.00']))->assertUnprocessable();
    }
    public function test_billing_view_uses_the_current_invoice_payments_and_supplier_totals(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user); $invoice = $this->invoiceFor($query, $user);
        $payment = QueryPayment::create([
            'query_id' => $query->id, 'query_invoice_id' => $invoice->id, 'request_key' => (string) Str::uuid(),
            'amount_minor' => 4001, 'reference' => 'TX-CURRENT', 'method' => 'UPI',
            'paid_on' => now()->toDateString(), 'created_by' => $user->id,
        ]);
        $invoice->setRelation('payments', collect([$payment]));
        $query->setRelation('invoice', $invoice);

        $this->actingAs($user);
        $html = view('billing.billing', [
            'query' => $query,
            'billingPrice' => 100,
            'billingCurrency' => 'INR',
            'supplierTotals' => collect(['INR' => ['amount' => 2500, 'paid' => 1000]]),
            'paymentSchedules' => collect(),
            'hasPaymentGateway' => true,
        ])->render();

        $this->assertStringContainsString('₹ 100', $html);
        $this->assertStringContainsString('₹ 40.01', $html);
        $this->assertStringContainsString('₹ 59.99', $html);
        $this->assertStringContainsString('₹ 75', $html);
        $this->assertStringContainsString('TX-CURRENT', $html);
        $this->assertStringNotContainsString('12,000,000', $html);
        $this->assertStringContainsString('Convenience Fee', $html);
        $this->assertStringContainsString('Send Payment Plan To Mail', $html);
        $this->assertStringContainsString('View Invoice', $html);
    }
    public function test_payment_schedules_can_be_created_updated_and_deleted_with_balance_limits(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user); $invoice = $this->invoiceFor($query, $user);
        $this->actingAs($user);
        $url = '/queries/'.$query->id.'/workflow/payment-schedules';
        $data = ['amount' => '40.00', 'convenience_fee' => '2.50', 'due_on' => now()->addDay()->toDateString()];
        $this->post($url, $data)->assertRedirect();
        $schedule = QueryPaymentSchedule::firstOrFail();
        $this->assertSame(4000, (int) $schedule->amount_minor);
        $this->assertSame(250, (int) $schedule->convenience_fee_minor);

        $this->post($url, array_replace($data, ['amount' => '60.01']))->assertSessionHasErrors('amount');
        $this->put($url.'/'.$schedule->id, array_replace($data, ['amount' => '35.00', 'convenience_fee' => '1.25']))->assertRedirect();
        $this->assertSame(3500, (int) $schedule->fresh()->amount_minor);
        $this->assertSame(125, (int) $schedule->fresh()->convenience_fee_minor);
        $this->delete($url.'/'.$schedule->id)->assertRedirect();
        $this->assertDatabaseMissing('query_payment_schedules', ['id' => $schedule->id]);
    }
    public function test_razorpay_link_is_tokenized_and_captured_payment_is_recorded_once(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user); $invoice = $this->invoiceFor($query, $user);
        AppSetting::create(['country_code' => 91, 'group_name' => 'payment_gateway', 'key_name' => 'api_key', 'value' => 'test_key']);
        AppSetting::create(['country_code' => 91, 'group_name' => 'payment_gateway', 'key_name' => 'api_secret', 'value' => 'test_secret']);
        $schedule = QueryPaymentSchedule::create([
            'query_id' => $query->id, 'query_invoice_id' => $invoice->id, 'amount_minor' => 10000,
            'convenience_fee_minor' => 500, 'due_on' => now()->addDay()->toDateString(), 'created_by' => $user->id,
        ]);
        Http::fake([
            'https://api.razorpay.com/v1/orders' => Http::response(['id' => 'order_test'], 200),
            'https://api.razorpay.com/v1/payments/pay_test' => Http::response([
                'order_id' => 'order_test', 'status' => 'captured', 'amount' => 10500, 'currency' => 'INR',
            ], 200),
        ]);

        $response = $this->actingAs($user)->post('/queries/'.$query->id.'/workflow/payment-schedules/'.$schedule->id.'/link');
        $response->assertRedirect()->assertSessionHas('payment_link');
        $schedule->refresh();
        $this->assertSame('order_test', $schedule->razorpay_order_id);
        $paymentUrl = $response->getSession()->get('payment_link');
        $token = \Illuminate\Support\Str::afterLast((string) $paymentUrl, '/payment/');
        $this->assertNotSame($token, $schedule->public_token_hash);
        $this->put('/queries/'.$query->id.'/workflow/payment-schedules/'.$schedule->id, [
            'amount' => '100.00', 'convenience_fee' => '0.00', 'due_on' => now()->addDay()->toDateString(),
        ])->assertStatus(409);
        $this->post('/queries/'.$query->id.'/workflow/payment-schedules/'.$schedule->id.'/link')->assertRedirect();
        Http::assertSentCount(1);
        $this->flushSession();
        $this->get('/payment/'.$token)->assertOk()->assertSee('Pay securely');

        $paymentId = 'pay_test';
        $signature = hash_hmac('sha256', 'order_test|'.$paymentId, 'test_secret');
        $callback = ['razorpay_payment_id' => $paymentId, 'razorpay_order_id' => 'order_test', 'razorpay_signature' => $signature];
        $this->post('/payment/'.$token.'/verify', $callback)->assertRedirect();
        $this->post('/payment/'.$token.'/verify', $callback)->assertRedirect();
        $this->assertDatabaseCount('query_payments', 1);
        $this->assertSame('paid', $schedule->fresh()->status);
        $this->assertSame(10000, (int) QueryPayment::first()->amount_minor);
    }
    public function test_payment_plan_email_reports_missing_smtp_configuration(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user); $invoice = $this->invoiceFor($query, $user);
        $schedule = QueryPaymentSchedule::create([
            'query_id' => $query->id, 'query_invoice_id' => $invoice->id, 'amount_minor' => 1000,
            'due_on' => now()->addDay()->toDateString(), 'created_by' => $user->id,
        ]);

        $this->actingAs($user)
            ->post('/queries/'.$query->id.'/workflow/payment-plan/email')
            ->assertRedirect()
            ->assertSessionHas('error', 'Payment plan email could not be sent. Check the SMTP settings and try again.');
        $this->post('/queries/'.$query->id.'/workflow/payment-schedules/'.$schedule->id.'/details')
            ->assertRedirect()
            ->assertSessionHas('error', 'Payment details email could not be sent. Check the SMTP settings and try again.');
    }
    public function test_manual_payment_delete_is_audited_as_a_void(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user); $invoice = $this->invoiceFor($query, $user);
        $payment = QueryPayment::create([
            'query_id' => $query->id, 'query_invoice_id' => $invoice->id, 'request_key' => (string) Str::uuid(),
            'amount_minor' => 2500, 'reference' => 'TX-VOID', 'method' => 'Bank',
            'paid_on' => now()->toDateString(), 'created_by' => $user->id,
        ]);

        $this->actingAs($user)->delete('/queries/'.$query->id.'/workflow/payments/'.$payment->id, [
            'void_reason' => 'Duplicate payment entry',
        ])->assertRedirect();
        $this->assertDatabaseHas('query_payments', [
            'id' => $payment->id, 'voided_by' => $user->id, 'void_reason' => 'Duplicate payment entry',
        ]);
        $this->assertNotNull($payment->fresh()->voided_at);
        $this->delete('/queries/'.$query->id.'/workflow/payments/'.$payment->id, [
            'void_reason' => 'Attempt second void',
        ])->assertStatus(409);
    }
    public function test_overpayment_and_negative_payment_are_rejected(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user); $this->invoiceFor($query, $user);
        $url = '/queries/'.$query->id.'/workflow/payments';
        $this->actingAs($user)->postJson($url, $this->paymentData((string) Str::uuid(), '100.01'))->assertUnprocessable();
        $this->postJson($url, $this->paymentData((string) Str::uuid(), '-1.00'))->assertUnprocessable();
        $this->assertDatabaseCount('query_payments', 0);
    }
    public function test_invoice_requires_accepted_proposal(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user);
        $this->actingAs($user)->postJson('/queries/'.$query->id.'/workflow/invoice', ['amount' => '100', 'currency' => 'INR', 'description' => 'Trip'])->assertUnprocessable();
        $this->assertDatabaseCount('query_invoices', 0);
    }
    public function test_invoice_and_history_roll_back_together(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user);
        Itinerary::create(['name' => 'Trip', 'queryId' => $query->id, 'status' => 1]);
        QueryLog::creating(function () { throw new \RuntimeException('Simulated history failure'); });
        $this->actingAs($user)->postJson('/queries/'.$query->id.'/workflow/invoice', ['amount' => '100', 'currency' => 'INR', 'description' => 'Trip'])->assertStatus(500);
        $this->assertDatabaseCount('query_invoices', 0);
    }
    public function test_acceptance_preserves_alternative_hotels_and_archived_proposals(): void
    {
        $user = $this->staff(); $query = $this->queryFor($user);
        $proposal = Itinerary::create(['name' => 'Trip', 'queryId' => $query->id, 'status' => 0]);
        $archived = Itinerary::create(['name' => 'Archived', 'queryId' => $query->id, 'status' => 3]);
        $package = DB::table('packages')->insertGetId(['itinerary_id' => $proposal->id]);
        foreach ([1, 2] as $option) {
            $item = DB::table('package_day_items')->insertGetId(['package_id' => $package, 'type' => 'accommodation']);
            DB::table('package_day_item_hotels')->insert(['package_day_item_id' => $item, 'hotel_options' => $option]);
        }
        $this->actingAs($user)->postJson('/itineraries/'.$proposal->id.'/accept', ['hotel_options' => 1])->assertOk();
        $this->assertDatabaseCount('package_day_item_hotels', 2);
        $this->assertSame(1, (int) $proposal->fresh()->accepted_hotel_option);
        $this->assertSame(3, (int) $archived->fresh()->status);
        $this->assertSame(5, (int) $query->fresh()->statusId);
    }
}
