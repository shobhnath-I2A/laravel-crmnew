<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class leadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
     {

         try {
            $leadBuilder = Lead::query();
            if ($request->filled('keyword')) {
                $leadBuilder->where('full_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%')
                    ->orWhere('source', 'like', '%' . $request->keyword . '%');
            }
            $leadQuery = Lead::latest()->paginate(5);
            $leadQueryCount = Lead::count();
            return view('package-query.index', compact('leadQuery', 'leadQueryCount'));
        } catch (\Exception $e) {
            Log::error('Error fetching Lead', [
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('package-query.create-lead', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'    => 'required|string|max:255',
            'portal_id'    => 'nullable|integer',
            'email'        => 'nullable|email|max:255',
            'phone'        => 'required|string|max:20',
            'phone_code'   => 'nullable|string|max:10',
            'from_city'    => 'required|string|max:255',
            'to_city'      => 'required|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
            'travel_month' => 'nullable|string|max:100',
            'adult'        => 'required|integer|min:1',
            'child'        => 'nullable|integer|min:0',
            'infant'       => 'nullable|integer|min:0',
            'budget'       => 'nullable|numeric|min:0',
            'description'  => 'nullable|string',
            'source'       => 'nullable|string|max:255',
            'campaign'     => 'nullable|string|max:255',
            'priority'     => 'nullable|integer|in:0,1,2,3',
            'company_name' => 'nullable|string|max:255',
            'assign_to'    => 'nullable|string',
        ]);

        $validated['start_date'] = Carbon::parse($validated['start_date']);
        $validated['end_date'] = Carbon::parse($validated['end_date']);
        $adult  = (int) ($validated['adult'] ?? 1);
        $child  = (int) ($validated['child'] ?? 0);
        $infant = (int) ($validated['infant'] ?? 0);
        $totalPax = $adult + $child + $infant;
        $days = (int) $validated['start_date']->diffInDays($validated['end_date']) + 1;

        $portalId = $validated['portal_id'] ?? Auth::user()?->portal_id ?? session('portal_id') ?? session('userCountry');
        $assignedTo = null;

        if (($validated['assign_to'] ?? '') === 'me') {
            $assignedTo = Auth::id();
        }

        $lead = Lead::create([
            'full_name' => $validated['full_name'],
            'portal_id' => $portalId,
            'email' => $validated['email'] ?? null,
            'phone'      => $validated['phone'],
            'phone_code' => $validated['phone_code'] ?? '+91',
            'from_city' => $validated['from_city'],
            'to_city'   => $validated['to_city'],
            'travel_date' => $validated['start_date']->format('Y-m-d'),
            'travel_month' => $validated['travel_month'] ?? $validated['start_date']->format('F Y'),
            'total_pax' => $totalPax,
            'days' => $days,
            'budget' => $validated['budget'] ?? null,
            'description' => $validated['description'] ?? null,
            'source' => $validated['source'] ?? 'Manual',
            'campaign' => $validated['campaign'] ?? null,
            'utm_source' => $request->input( 'utm_source', session('utm_source') ),
            'utm_medium' => $request->input( 'utm_medium', session('utm_medium') ),
            'utm_campaign' => $request->input( 'utm_campaign', session('utm_campaign') ),
            'client_ip' => $request->ip(),
            'reference_url' => url()->previous(),
            'assigned_to' => $assignedTo,
            'created_by' => Auth::id(),
            'status' => 'new',
            'priority' => $validated['priority'] ?? 0,
            'company_name' => $validated['company_name'] ?? null,
            'is_authorized' => 1,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Lead created successfully.',
                'lead_id' => $lead->id,
            ]);
        }

        return redirect()
            ->route('leads.create')
            ->with('success', 'Lead created successfully.');
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
