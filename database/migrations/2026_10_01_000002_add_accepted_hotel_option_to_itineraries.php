<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::table('itineraries', fn (Blueprint $t) => $t->unsignedTinyInteger('accepted_hotel_option')->nullable()); }
    public function down(): void { Schema::table('itineraries', fn (Blueprint $t) => $t->dropColumn('accepted_hotel_option')); }
};
