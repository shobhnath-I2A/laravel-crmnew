<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('query_statuses')->insert([

            [
                'id' => 1,
                'name' => 'New',
                'slug' => 'new',
                'color' => '#655be6',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 2,
                'name' => 'Active',
                'slug' => 'active',
                'color' => '#0cb5b5',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 3,
                'name' => 'No Connect',
                'slug' => 'no-connect',
                'color' => '#0f1f3e',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 4,
                'name' => 'Hot Lead',
                'slug' => 'hot-lead',
                'color' => '#e45555',
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 5,
                'name' => 'Confirmed',
                'slug' => 'confirmed',
                'color' => '#46cd93',
                'sort_order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 6,
                'name' => 'Cancelled',
                'slug' => 'cancelled',
                'color' => '#6c757d',
                'sort_order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 7,
                'name' => 'Invalid',
                'slug' => 'invalid',
                'color' => '#f9392f',
                'sort_order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 8,
                'name' => 'Proposal Sent',
                'slug' => 'proposal-sent',
                'color' => '#cc00a9',
                'sort_order' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 9,
                'name' => 'Follow Up',
                'slug' => 'follow-up',
                'color' => '#FF6600',
                'sort_order' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 11,
                'name' => 'No Revert',
                'slug' => 'no-revert',
                'color' => '#0f1f3e',
                'sort_order' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
