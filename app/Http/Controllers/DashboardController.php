<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $today = now()->startOfDay();
        $tomorrow = $today->copy()->addDay();

        $yearStart = $today->copy()->startOfYear();
        $nextYearStart = $yearStart->copy()->addYear();

        /*
         * Apply your existing portal/user access restrictions here.
         * Every dashboard query below inherits this scope.
         */
        $baseQuery = Query::query();

        $totalQueries = (clone $baseQuery)->count();

        $todayQueries = (clone $baseQuery)
            ->where('created_at', '>=', $today)
            ->where('created_at', '<', $tomorrow)
            ->count();

        // Assumes the status column is named "statusid".
        $statusCounts = (clone $baseQuery)
            ->select('statusid')
            ->selectRaw('COUNT(*) AS total')
            ->groupBy('statusid')
            ->pluck('total', 'statusid');

        $proposalSent = (int) ($statusCounts[8] ?? 0);
        $totalProConf = (int) ($statusCounts[9] ?? 0);
        $totalConfirmed = (int) ($statusCounts[5] ?? 0);
        $totalLost = (int) ($statusCounts[7] ?? 0);

        /*
         * Monthly query totals.
         * MONTH() is supported by MySQL/MariaDB.
         */
        $monthlyCounts = (clone $baseQuery)
            ->where('created_at', '>=', $yearStart)
            ->where('created_at', '<', $nextYearStart)
            ->selectRaw('MONTH(created_at) AS month_number, COUNT(*) AS total')
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'month_number');

        $monthlyChart = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthlyChart[] = [
                'country' => $yearStart->copy()->month($month)->format('M'),
                'visits' => (int) ($monthlyCounts[$month] ?? 0),
            ];
        }

        $hour = (int) now()->format('H');

        $greeting = $hour < 12
            ? 'Good Morning'
            : ($hour < 17 ? 'Good Afternoon' : 'Good Evening');
// dd($monthlyCounts, $monthlyChart);


            $statusNames = [
                1  => 'New',
                2  => 'Active',
                3  => 'No Connect',
                4  => 'Hot Lead',
                5  => 'Confirmed',
                6  => 'Cancelled',
                7  => 'Invalid',
                8  => 'Proposal Sent',
                9  => 'Follow Up',
                10 => 'No Revert',
            ];

            $statusChart = [];

            foreach ($statusNames as $id => $name) {
                $statusChart[] = [
                    'name'  => $name,
                    'value' => (int) ($statusCounts[$id] ?? 0),
                ];
            }
        // Change "dashboard" if your Blade view has a different name.
        return view('dashboard', compact(
            'greeting',
            'todayQueries',
            'totalQueries',
            'proposalSent',
            'totalProConf',
            'totalConfirmed',
            'totalLost',
            'monthlyChart',
            'statusChart',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
