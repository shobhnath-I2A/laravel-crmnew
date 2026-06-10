<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Query;
use App\Models\QueryStatus;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Itinerary;
use App\Models\PackageDayItem;
use Carbon\Carbon;
use Exception;


class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $loginUser = Auth::user();

            $queryBuilder = Query::with(['status', 'itineraries']);
            if ($loginUser->role_id != 1) {
                if ($loginUser->show_query_status == 0) {
                    // assigned query only
                    $queryBuilder->where('assignTo', $loginUser->id);
                }

                if ($loginUser->show_query_status == 1) {
                    // confirmed/proposal only
                    // $queryBuilder->whereHas('itineraries');
                    // OR if confirmed status id is fixed, use:
                    $queryBuilder->where('statusId', 5);
                }
            }
            if ($request->filled('statusId')) {
                $queryBuilder->where('statusId', $request->statusId);
            }

            $queries = $queryBuilder
                ->latest()
                ->paginate(00);

            $queries->appends($request->all());

            $countQuery = Query::query();
            if ($loginUser->role_id != 1) {

                if ($loginUser->show_query_status == 0) {
                    $countQuery->where('assignTo', $loginUser->id);
                }

                if ($loginUser->show_query_status == 1) {
                    $countQuery->where('statusId', 5);
                }
            }

            $totalQueries = (clone $countQuery)->count();

            $statuses = QueryStatus::where('is_active', 1)
                ->orderBy('sort_order')
                ->get();

            $statusCounts = (clone $countQuery)
                ->selectRaw('statusId, COUNT(*) as total')
                ->groupBy('statusId')
                ->pluck('total', 'statusId');

            if ($loginUser->role_id == 3) {
                $users = User::where('id', $loginUser->id)
                    ->where('status', 1)
                    ->get(['id', 'name']);
            } else {
                $users = User::where('status', 1)
                    ->orderBy('name')
                    ->get(['id', 'name']);
            }

            return view('queries.index', compact(
                'queries',
                'statuses',
                'statusCounts',
                'totalQueries',
                'users'
            ));
        } catch (Exception $e) {

            Log::error('Error fetching queries: ' . $e->getMessage());

            return view('queries.index', [
                'queries' => collect(),
                'statuses' => collect(),
                'statusCounts' => collect(),
                'totalQueries' => 0,
                'users' => collect(),
                'error' => 'Unable to fetch queries at this time.'
            ]);
        }
    }
    // public function index(Request $request)
    // {
    //     try {

    //         $loginUser = Auth::user();

    //         $queryBuilder = Query::with(['status', 'itineraries']);

    //         if ($request->filled('statusId')) {
    //             $queryBuilder->where('statusId', $request->statusId);
    //         }

    //         $queries = $queryBuilder
    //             ->latest()
    //             ->paginate(10);

    //         $queries->appends($request->all());

    //         $totalQueries = Query::count();

    //         $statuses = QueryStatus::where('is_active', 1)
    //             ->orderBy('sort_order')
    //             ->get();

    //         $statusCounts = Query::selectRaw('statusId, COUNT(*) as total')
    //             ->groupBy('statusId')
    //             ->pluck('total', 'statusId');

    //         if ($loginUser->role_id == 3) {
    //             $users = User::where('id', $loginUser->id)
    //                 ->where('status', 1)
    //                 ->get(['id', 'name']);
    //         } else {
    //             $users = User::where('status', 1)
    //                 ->orderBy('name')
    //                 ->get(['id', 'name']);
    //         }

    //         return view('queries.index', compact(
    //             'queries',
    //             'statuses',
    //             'statusCounts',
    //             'totalQueries',
    //             'users'
    //         ));
    //     } catch (Exception $e) {

    //         Log::error('Error fetching queries: ' . $e->getMessage());

    //         return view('queries.index', [
    //             'queries' => collect(),
    //             'statuses' => collect(),
    //             'statusCounts' => collect(),
    //             'totalQueries' => 0,
    //             'users' => collect(),
    //             'error' => 'Unable to fetch queries at this time.'
    //         ]);
    //     }
    // }
    // public function index(Request $request)
    // {
    //     try {

    //         $queryBuilder = Query::with('status');

    //         if ($request->filled('statusId')) {
    //             $queryBuilder->where('statusId', $request->statusId);
    //         }

    //         $queries = $queryBuilder
    //             ->latest()
    //             ->paginate(10);

    //         $queries->appends($request->all());

    //         $totalQueries = Query::count();

    //         $statuses = QueryStatus::where('is_active', 1)
    //             ->orderBy('sort_order')
    //             ->get();

    //         $statusCounts = Query::selectRaw('statusId, COUNT(*) as total')
    //             ->groupBy('statusId')
    //             ->pluck('total', 'statusId');

    //         return view('queries.index', compact(
    //             'queries',
    //             'statuses',
    //             'statusCounts',
    //             'totalQueries'
    //         ));
    //     } catch (Exception $e) {

    //         Log::error('Error fetching queries: ' . $e->getMessage());

    //         return view('queries.index', [
    //             'queries' => collect(),
    //             'statuses' => collect(),
    //             'statusCounts' => collect(),
    //             'totalQueries' => 0,
    //             'error' => 'Unable to fetch queries at this time.'
    //         ]);
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('queries.add-query');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'mobile' => 'required|digits:10',
                'email' => 'required|email',
                'submitName' => 'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'querytype' => 'required|string|max:100',
                'travelMonth' => 'nullable|string|max:50',
                'origin' => 'required|string|max:100',
                'destination' => 'required|string|max:100',
                'adult' => 'required|integer|min:1',
                'child' => 'nullable|integer|min:0',
                'infant' => 'nullable|integer|min:0',
                'leadSource' => 'nullable|string|max:100',
                'priorityStatus' => 'nullable|integer',
                'assignTo' => 'nullable|string|max:100',
                'serviceId' => 'nullable|string|max:100',
                'details' => 'nullable|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date',
            ]);
            $validated['startDate'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['endDate'] = Carbon::parse($request->endDate)->format('Y-m-d');

            $query = Query::create($validated);
            return response()->json([
                'status' => true,
                'message' => 'Query created successfully',
                'data' => $query
            ]);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        try {
            $tab = $request->query('tab', 'details');
            $status = $request->query('status', 'active');

            $allowedTabs = [
                'details',
                'proposals',
                'mails',
                'followups',
                'suppliers-communication',
                'post-sales-supplier',
                'voucher',
                'billing',
                'guest-documents',
                'history',
            ];

            if (! in_array($tab, $allowedTabs)) {
                $tab = 'details';
            }

            $query = Query::with([
                'status',
                'itineraries' => function ($q) use ($status) {
                    if ((string) $status === '3') {
                        $q->where('status', 3);
                    } else {
                        $q->whereIn('status', [0, 1, 2]);
                    }

                    $q->latest();
                },
            ])->findOrFail($id);

            $statuses = QueryStatus::where('is_active', 1)
                ->orderBy('sort_order')
                ->get();

            $suppliers = collect();
            $postSaleItems = collect();

            if ($tab === 'suppliers-communication') {
                $suppliers = Supplier::with('destination')
                    ->where('status', 1)
                    ->latest()
                    ->get();
            }

            if ($tab === 'post-sales-supplier') {
                $postSaleItems = PackageDayItem::with([
                    'package.itinerary',
                    'supplier',
                ])
                    ->whereHas('package.itinerary', function ($q) use ($query) {
                        $q->where('queryId', $query->id);
                    })
                    ->orderBy('type')
                    ->orderBy('day')
                    ->get()
                    ->groupBy('type');
            }

            return view('queries.view-query', compact(
                'query',
                'tab',
                'suppliers',
                'postSaleItems',
                'status',
                'statuses'
            ));
        } catch (Exception $e) {
            Log::error('Error fetching query: ' . $e->getMessage());

            return redirect()
                ->route('queries.index')
                ->with('error', 'Query not found.');
        }
    }
    // public function show(Request $request, $id)
    // {
    //     try {
    //         $tab = $request->query('tab', 'details');
    //         $status = $request->query('status', 'active');

    //         $allowedTabs = [
    //             'details',
    //             'proposals',
    //             'mails',
    //             'followups',
    //             'suppliers-communication',
    //             'post-sales-supplier',
    //             'voucher',
    //             'billing',
    //             'guest-documents',
    //             'history',
    //         ];

    //         if (! in_array($tab, $allowedTabs)) {
    //             $tab = 'details';
    //         }

    //         $query = Query::with([
    //             'itineraries' => function ($q) use ($status) {

    //                 if ((string) $status === '3') {
    //                     $q->where('status', 3);
    //                 } else {
    //                     $q->whereIn('status', [0, 1, 2]);
    //                 }

    //                 $q->latest();
    //             },
    //         ])->findOrFail($id);

    //         $suppliers = collect();
    //         $postSaleItems = collect();

    //         if ($tab === 'suppliers-communication') {
    //             $suppliers = Supplier::with('destination')
    //                 ->where('status', 1)
    //                 ->latest()
    //                 ->get();
    //         }

    //         if ($tab === 'post-sales-supplier') {
    //             $postSaleItems = PackageDayItem::with([
    //                 'package.itinerary',
    //                 'supplier',
    //             ])
    //                 ->whereHas('package.itinerary', function ($q) use ($query) {
    //                     $q->where('queryId', $query->id);
    //                 })
    //                 ->orderBy('type')
    //                 ->orderBy('day')
    //                 ->get()
    //                 ->groupBy('type');
    //         }

    //         return view('queries.view-query', compact(
    //             'query',
    //             'tab',
    //             'suppliers',
    //             'postSaleItems',
    //             'status'
    //         ));
    //     } catch (Exception $e) {
    //         Log::error('Error fetching query: ' . $e->getMessage());

    //         return redirect()
    //             ->route('queries.index')
    //             ->with('error', 'Query not found.');
    //     }
    // }
    // public function show(Request $request, $id)
    // {
    //     try {
    //         $tab = $request->query('tab', 'details');

    //         $allowedTabs = [
    //             'details',
    //             'proposals',
    //             'mails',
    //             'followups',
    //             'suppliers-communication',
    //             'post-sales-supplier',
    //             'voucher',
    //             'billing',
    //             'guest-documents',
    //             'history',
    //         ];

    //         if (! in_array($tab, $allowedTabs)) {
    //             $tab = 'details';
    //         }

    //         $query = Query::with([
    //             'itineraries',
    //         ])->findOrFail($id);

    //         $suppliers = collect();
    //         $postSaleItems = collect();

    //         if ($tab === 'suppliers-communication') {
    //             $suppliers = Supplier::with('destination')
    //                 ->where('status', 1)
    //                 ->latest()
    //                 ->get();
    //         }
    //         $postSaleItems = collect();

    //         if ($tab === 'post-sales-supplier') {
    //             $postSaleItems = PackageDayItem::with([
    //                 'package.itinerary',
    //                 'supplier',
    //             ])
    //                 ->whereHas('package.itinerary', function ($q) use ($query) {
    //                     $q->where('queryId', $query->id);
    //                 })
    //                 // ->whereNotIn('type', ['Leisure'])
    //                 // ->whereNotNull('title')
    //                 ->orderBy('type')
    //                 ->orderBy('day')
    //                 // ->orderBy('start_date')
    //                 ->get()
    //                 ->groupBy('type');
    //         }

    //         return view('queries.view-query', compact(
    //             'query',
    //             'tab',
    //             'suppliers',
    //             'postSaleItems'
    //         ));
    //     } catch (Exception $e) {
    //         Log::error('Error fetching query: ' . $e->getMessage());

    //         return redirect()
    //             ->route('queries.index')
    //             ->with('error', 'Query not found.');
    //     }
    // }
    // public function show(Request $request, $id)
    // {
    //     try {
    //         // $query = Query::findOrFail($id);
    //         $tab = $request->query('tab', 'details');
    //         $query = Query::with('itineraries')->findOrFail($id);
    //         $suppliers = collect();

    //     if ($tab === 'suppliers-communication') {
    //         $suppliers = Supplier::with('destination')
    //             ->latest()
    //             ->get();
    //     }
    //     if ($tab === 'post-sales-supplier') {
    //         $suppliers = Supplier::with('destination')
    //             ->latest()
    //             ->get();
    //     }

    //     return view('queries.view-query', compact('query', 'tab', 'suppliers'));
    //         // return view('queries.view-query', compact('query', 'tab'));
    //     } catch (Exception $e) {
    //         Log::error('Error fetching query: ' . $e->getMessage());
    //         return redirect()->route('queries.index')
    //             ->with('error', 'Query not found.');
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $query = Query::findOrFail($id);
            return view('queries.edit-query', compact('query'));
        } catch (Exception $e) {
            Log::error('Error fetching query: ' . $e->getMessage());
            return redirect()->route('queries.index')
                ->with('error', 'Query not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'mobile' => 'required|digits:10',
                'email' => 'required|email',
                'submitName' => 'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'querytype' => 'required|string|max:100',
                'travelMonth' => 'nullable|string|max:50',
                'origin' => 'required|string|max:100',
                'destination' => 'required|string|max:100',
                'adult' => 'required|integer|min:1',
                'child' => 'nullable|integer|min:0',
                'infant' => 'nullable|integer|min:0',
                'leadSource' => 'nullable|string|max:100',
                'priorityStatus' => 'nullable|integer',
                'assignTo' => 'nullable|string|max:100',
                'serviceId' => 'nullable|string|max:100',
                'details' => 'nullable|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date',
            ]);

            $query = Query::findOrFail($id);

            $validated['startDate'] = Carbon::parse($validated['startDate'])->format('Y-m-d');
            $validated['endDate'] = Carbon::parse($validated['endDate'])->format('Y-m-d');
            $validated['child'] = $validated['child'] ?? 0;
            $validated['infant'] = $validated['infant'] ?? 0;

            $query->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Query updated successfully',
                'data' => $query
            ]);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->errors()
            ], 422);
        } catch (Exception $e) {

            Log::error('Error updating query: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Update failed'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'statusId' => 'required|exists:query_statuses,id',
        ]);

        if ((int) $request->statusId === 5) {
            return response()->json([
                'status' => false,
                'message' => 'You can not mark as confirmed manually.'
            ], 403);
        }

        $query = Query::findOrFail($id);

        $query->update([
            'statusId' => $request->statusId
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Query status updated successfully'
        ]);
    }

    public function assignUser(Request $request)
    {
        try {
            $loginUser = auth()->user();

            if ($loginUser->role_id == 3 && $request->user_id != $loginUser->id) {
                return response()->json([
                    'status' => false,
                    'message' => 'Sales Executive cannot assign query to other users.'
                ], 403);
            }

            $query = Query::findOrFail($request->query_id);
            // dd($query);
            $query->assignTo = $request->user_id;
            $query->save();

            return response()->json([
                'status' => true,
                'message' => 'User assigned successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error Assign user: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Update failed'
            ], 500);
        }
    }
}
