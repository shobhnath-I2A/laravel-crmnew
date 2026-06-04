<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Destination;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::with(['destination', 'user'])
            ->when($request->filled('keyword'), function ($query) use ($request) {
                $keyword = $request->keyword;

                $query->where(function ($q) use ($keyword) {
                    $q->where('company_name', 'like', "%{$keyword}%")
                        ->orWhere('first_name', 'like', "%{$keyword}%")
                        ->orWhere('last_name', 'like', "%{$keyword}%")
                        ->orWhere('email', 'like', "%{$keyword}%")
                        ->orWhere('mobile', 'like', "%{$keyword}%");
                });
            })
            ->latest()
            ->paginate(20);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create-update');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'destination_id' => 'nullable|exists:destinations,id',
            'company_name'      => 'required|string|max:255',
            'submit_name'  => 'nullable|string|max:20',
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'nullable|string|max:100',
            'email'        => 'nullable|email|max:255',
            'mobile_code'  => 'nullable|string|max:10',
            'mobile'       => 'nullable|string|max:20',
            'address'      => 'nullable|string|max:500',
        ]);

        Supplier::create([
            'destination_id' => $request->destination_id,
            'company_name'      => $request->company_name,
            'submit_name'  => $request->submit_name,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'mobile_code'  => $request->mobile_code,
            'mobile'       => $request->mobile,
            'address'      => $request->address,
            'created_by'   => auth()->id(),
        ]);

        return redirect()
            ->route('suppliers.create')
            ->with('success', 'Supplier added successfully.');
    }
    public function searchCities(Request $request)
    {
        $search = $request->get('q');

        $cities = Destination::where('name', 'LIKE', '%' . $search . '%')
            ->limit(10)
            ->get(['id', 'name']);

        return response()->json($cities);
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
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.create-update', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        // dd($request->all());
        $request->validate([
            'destination_id' => 'nullable|exists:destinations,id',
            'company_name'      => 'required|string|max:255',
            'submit_name'  => 'nullable|string|max:20',
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'nullable|string|max:100',
            'email'        => 'nullable|email|max:255',
            'mobile_code'  => 'nullable|string|max:10',
            'mobile'       => 'nullable|string|max:20',
            'address'      => 'nullable|string|max:500',
        ]);

        $supplier->update([
            'destination_id' => $request->destination_id,
            'company_name'      => $request->company_name,
            'submit_name'  => $request->submit_name,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'mobile_code'  => $request->mobile_code,
            'mobile'       => $request->mobile,
            'address'      => $request->address,
            'created_by'   => auth()->id(),
        ]);

        return redirect()
            ->route('suppliers.create')
            ->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response()->json([
            'status' => true,
            'message' => 'Supplier deleted successfully.'
        ]);
    }
}
