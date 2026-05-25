<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('name');
            $table->unsignedBigInteger('branch_Id')->nullable()->after('role_id');
            $table->integer('user_type')->default(1)->after('branch_Id');
            $table->string('user_country')->nullable()->after('user_type');
            $table->tinyInteger('show_query_status')->default(0)->after('user_country');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'last_name',
                'branch_Id',
                'user_type',
                'user_country',
                'show_query_status',
            ]);
        });
    }
};
