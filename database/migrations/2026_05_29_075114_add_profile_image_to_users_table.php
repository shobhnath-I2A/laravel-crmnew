<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('submit_name', 10)->nullable()->after('id');
            $table->string('mobile_code', 10)->nullable()->after('email');
            $table->string('mobile', 20)->nullable()->after('mobile_code');
            $table->string('website')->nullable()->after('mobile');
            $table->string('theme_color')->nullable()->after('website');
            $table->string('profile_image')->nullable()->after('theme_color');
            $table->foreignId('created_by')->nullable()->after('profile_image')->constrained('users')->nullOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn([
                'submit_name',
                'mobile_code',
                'mobile',
                'website',
                'profile_image',
                'created_by'
            ]);
        });
    }
};
