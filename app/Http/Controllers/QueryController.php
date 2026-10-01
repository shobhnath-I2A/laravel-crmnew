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
use App\Models\QueryNote;
use App\Models\QueryLog;
use Carbon\Carbon;
use Exception;


class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate(['startDate' => 'nullable|date_format:d-m-Y', 'endDate' => 'nullable|date_format:d-m-Y', 'statusId' => 'nullable|integer|exists:query_statuses,id']);
        try {

            $loginUser = Auth::user();
            $queryBuilder = \App\Services\QueryAccess::scope(Query::with(['status', 'originCity', 'destinationCity', 'itineraries.destinations']), $loginUser);

            if ($request->filled('statusId')) {
                $queryBuilder->where('statusId', $request->statusId);
            }

            if ($request->filled('startDate')) {
                $startDate = Carbon::createFromFormat('d-m-Y', $request->startDate);
                $queryBuilder->whereDate('startDate', '>=', $startDate->format('Y-m-d'));
            }

            if ($request->filled('endDate')) {
                $endDate = Carbon::createFromFormat('d-m-Y', $request->endDate);
                $queryBuilder->whereDate('startDate', '<=', $endDate->format('Y-m-d'));
            }

            $queries = $queryBuilder
                ->latest()
                ->paginate(10);

            $queries->appends($request->all());

            $countQuery = \App\Services\QueryAccess::scope(Query::query(), $loginUser);

            if ($request->filled('startDate')) {
                $startDate = Carbon::createFromFormat('d-m-Y', $request->startDate);
                $countQuery->whereDate('startDate', '>=', $startDate->format('Y-m-d'));
            }

            if ($request->filled('endDate')) {
                $endDate = Carbon::createFromFormat('d-m-Y', $request->endDate);
                $countQuery->whereDate('startDate', '<=', $endDate->format('Y-m-d'));
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
                'queries' => new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10),
                'statuses' => collect(),
                'statusCounts' => collect(),
                'totalQueries' => 0,
                'users' => collect(),
                'error' => 'Unable to fetch queries at this time.'
            ]);
        }
    }























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
                'assignTo' => 'nullable|integer|exists:users,id',
                'serviceId' => 'nullable|string|max:100',
                'details' => 'nullable|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date|after_or_equal:startDate',
            ]);
            $validated['created_by'] = auth()->id();
            if (auth()->user()->role_id == 3) { $validated['assignTo'] = auth()->id(); }
            $validated['startDate'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['endDate'] = Carbon::parse($request->endDate)->format('Y-m-d');

            $query = DB::transaction(function () use ($validated) {
                $query = Query::create($validated);
                \App\Services\QueryHistory::record($query->id, 'query_created', 'Query created');
                return $query;
            });
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

                    $q->with('destinations')->latest();
                },
            ])->findOrFail($id);

            $statuses = QueryStatus::where('is_active', 1)
                ->orderBy('sort_order')
                ->get();

            $suppliers = collect();
            $postSaleItems = collect();

            if (in_array($tab, ['suppliers-communication', 'post-sales-supplier'])) {
                $suppliers = Supplier::with('destination')
                    ->where('status', 1)
                    ->latest()
                    ->get();
            }

            if ($tab === 'post-sales-supplier') {
                $accepted = $query->itineraries()->where('status', 1)->first();
                $postSaleItems = PackageDayItem::with([
                    'package.itinerary', 'supplier', 'hotelDetail.hotel', 'flightDetail', 'price',
                ])
                    ->selectedForAcceptance($accepted?->accepted_hotel_option)
                    ->whereHas('package.itinerary', function ($q) use ($query) {
                        $q->where('queryId', $query->id)->where('status', 1);
                    })
                    ->orderBy('type')
                    ->orderBy('day')
                    ->get()
                    ->groupBy('type');
            }

            $query->load(['originCity', 'destinationCity']);
            \App\Services\QueryWorkflowData::load($query, $tab);
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
                'assignTo' => 'nullable|integer|exists:users,id',
                'serviceId' => 'nullable|string|max:100',
                'details' => 'nullable|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date|after_or_equal:startDate',
            ]);

            $query = Query::findOrFail($id);

            if (auth()->user()->role_id == 3) { $validated['assignTo'] = auth()->id(); }
            $validated['startDate'] = Carbon::parse($validated['startDate'])->format('Y-m-d');
            $validated['endDate'] = Carbon::parse($validated['endDate'])->format('Y-m-d');
            $validated['child'] = $validated['child'] ?? 0;
            $validated['infant'] = $validated['infant'] ?? 0;

            DB::transaction(function () use ($query, $validated) {
                $query->update($validated);
                \App\Services\QueryHistory::record($query->id, 'query_updated', 'Query updated');
            });

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

        DB::transaction(function () use ($query, $request) {
            $query->update(['statusId' => $request->statusId]);
            \App\Services\QueryHistory::record($query->id, 'status_changed', 'Query status changed to '.$request->statusId);
        });

        return response()->json([
            'status' => true,
            'message' => 'Query status updated successfully'
        ]);
    }

    public function assignUser(Request $request)
    {
        $request->validate(['query_id' => 'required|integer|exists:queries,id', 'user_id' => ['required', 'integer', \Illuminate\Validation\Rule::exists('users', 'id')->where('status', 1)]]);
        try {
            $loginUser = auth()->user();

            if ($loginUser->role_id == 3 && $request->user_id != $loginUser->id) {
                return response()->json([
                    'status' => false,
                    'message' => 'Sales Executive cannot assign query to other users.'
                ], 403);
            }

            $query = Query::findOrFail($request->query_id);
            DB::transaction(function () use ($query, $request) {
                $query->assignTo = $request->user_id;
                $query->save();
                \App\Services\QueryHistory::record($query->id, 'query_assigned', 'Assigned to staff #'.$request->user_id);
            });

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
    public function addNote(Request $request)
    {
        $request->validate([
            'queryid' => 'required|integer|exists:queries,id',
            'details' => 'required|string|max:10000',
        ]);

        $queryId = $request->queryid;
        $details = $request->details;

        $userId = Auth::id();

        DB::transaction(function () use ( $queryId, $details,$userId ) {

            QueryNote::create([
                'query_id'     => $queryId,
                'details'     => $details,
                'added_by'     => $userId,
                'date_added'   => now(),
            ]);

            QueryLog::create([
                'details'       => 'Note Created',
                'query_id'       => $queryId,
                'added_by'       => $userId,
                'date_added'     => now(),
                'status_comment' => $details,
                'log_type'       => 'add_note',
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Note added successfully.',
        ]);
    }
}
