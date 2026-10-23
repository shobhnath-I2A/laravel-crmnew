<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->boolean('public_share_enabled')->default(false);
            $table->string('public_share_price_token', 64)->nullable()->unique();
            $table->string('public_share_no_price_token', 64)->nullable()->unique();
        });
    }

    public function down(): void
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->dropUnique(['public_share_price_token']);
            $table->dropUnique(['public_share_no_price_token']);
            $table->dropColumn([
                'public_share_enabled',
                'public_share_price_token',
                'public_share_no_price_token',
            ]);
        });
    }
};
