<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use App\Models\QueryStatus;
use App\Models\Destination;
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


        $statusChart = QueryStatus::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'name'])
            ->map(function (QueryStatus $status) use ($statusCounts, $totalQueries) {
                $value = (int) ($statusCounts[$status->id] ?? 0);

                return [
                    'name' => $status->name,
                    'value' => $value,
                    'share' => $totalQueries > 0
                        ? number_format(($value / $totalQueries) * 100, 1, '.', '')
                        : '0.0',
                ];
            })
            ->values()
            ->all();

        $topDestinations = Destination::query()
            ->join('queries', 'queries.destination', '=', 'destinations.id')
            ->select('destinations.id', 'destinations.name')
            ->selectRaw('COUNT(queries.id) AS query_count')
            ->groupBy('destinations.id', 'destinations.name')
            ->orderByDesc('query_count')
            ->orderBy('destinations.name')
            ->limit(5)
            ->get();

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
            'topDestinations',
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
