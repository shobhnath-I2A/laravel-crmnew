<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrencyExchangeMaster;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
class CurrencyExchangeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $currencyExchangeBuilder = CurrencyExchangeMaster::query();

            if ($request->filled('keyword')) {
                $currencyExchangeBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }

            $currencyExchange = $currencyExchangeBuilder->latest()->paginate(10);
            $currencyExchange->appends($request->all());
            $currencyExchangeCount = CurrencyExchangeMaster::count();
            // dd($currencyExchange);
            return view('currency-exchange.index', compact('currencyExchange', 'currencyExchangeCount'));
        } catch (\Exception $e) {
            Log::error('Fetch to show the Currency Exchange', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('currency-exchange.add-edit-currency-exchange');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
            ]);
            // dd($validated);
            // Save data
            $currencyExchange  = CurrencyExchangeMaster::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Currency Exchange created successfully",
                'data' => $currencyExchange
            ]);
        } catch (ValidationException $ve) {
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
    public function show(string $id)
    {
        try {
            $currencyExchange = CurrencyExchangeMaster::findOrFail($id);
            return view('currency-exchange.add-edit-currency-exchange', compact('currencyExchange'));
        } catch (\Exception $e) {
            Log::error('Show Currency Exchange Error: ' . $e->getMessage());
            return back()->with('error', 'Currency exchange not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $currencyExchange = CurrencyExchangeMaster::findOrFail($id);
            return view('currency-exchange.add-edit-currency-exchange', compact('currencyExchange'));
        } catch (\Exception $e) {
            Log::error('Error fetch to currency exchange', $e->getMessage());
            return back()->with('error', 'Currency exchange not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            //  Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|in:0,1',
            ]);

            $currencyExchange = CurrencyExchangeMaster::findOrFail($id);

            $currencyExchange->update($validated);

            return response()->json([
                'status' => true,
                'message' => "Currency Exchange Update successfully",
                'data' => $currencyExchange
            ]);
        } catch (ValidationException $ve) {
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $currencyExchange = CurrencyExchangeMaster::findOrFail($id);
            $currencyExchange->delete();

            return redirect()->route('currency-exchange.index')
                ->with('success', 'Currency exchange deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Delete Currency Exchange Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete currency exchange.');
        }
    }
}
