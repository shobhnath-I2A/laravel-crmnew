<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Exception;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $clientBuilder = Client::with('addedBy');
            if ($request->filled('keyword')) {
                $clientBuilder->where(function ($query) use ($request) {
                    $query->where('first_name', 'like', '%' . $request->keyword . '%')
                        ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                        ->orWhere('email', 'like', '%' . $request->keyword . '%')
                        ->orWhere('mobile', 'like', '%' . $request->keyword . '%');
                });
            }
            $clients = $clientBuilder->latest()->paginate(20)->withQueryString();
            $clientCount = Client::count();

            return view('client.index', compact('clients', 'clientCount'));
        } catch (\Exception $e) {
            Log::error('Error fetching Client', [
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.add-client');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'submit_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:clients,email',
                'email2' => 'nullable|email',
                'mobile_code' => 'required|regex:/^\+\d{1,4}$/',
                'mobile' => 'required|digits:10',
                'mobile2' => 'nullable|digits:10',
                'mobile_code2' => 'nullable|regex:/^\+\d{1,4}$/',
                'city_id' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'dob' => 'required|date|before:today',
                'marriage_anniversary' => 'required|date|before:today',
            ]);

            $validated['dob'] = Carbon::parse($validated['dob'])->format('Y-m-d');
            $validated['marriage_anniversary'] = Carbon::parse($validated['marriage_anniversary'])->format('Y-m-d');
            $validated['created_by'] = auth()->id();

            $client = Client::create($validated);

            return response()->json([
                'message' => 'Client created successfully',
                'status' => 'success',
                'data' => $client
            ], 201);
        } catch (ValidationException $ve) {
            return response()->json([
                'message' => 'Validation failed',
                'status' => 'error',
                'errors' => $ve->validator->errors()
            ], 422);
        } catch (Exception $e) {
            Log::error('Error creating Client', [
                'error' => $e->getMessage()
            ]);
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
            $client = Client::findOrFail($id);
            return view('client.view-client', compact('client'));
        } catch (Exception $e) {
            Log::error('Error fetching Client: ' . $e->getMessage());
            return redirect()->route('clients.index')
                ->with('error', 'Client not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $client = Client::findOrFail($id);
            return view('client.add-client', compact('client'));
        } catch (Exception $e) {
            Log::error('Error fetching Client: ' . $e->getMessage());
            return redirect()->route('clients.index')
                ->with('error', 'Client not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        try {
            $validated = $request->validate([
                'submit_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:clients,email,' . $client->id,
                'email2' => 'nullable|email',
                'mobile_code' => 'required|regex:/^\+\d{1,4}$/',
                'mobile' => 'required|digits:10',
                'mobile2' => 'nullable|digits:10',
                'mobile_code2' => 'nullable|regex:/^\+\d{1,4}$/',
                'city_id' => 'nullable|exists:destinations,id',
                'address' => 'nullable|string|max:255',
                'dob' => 'required|date|before:today',
                'marriage_anniversary' => 'required|date|before:today',
            ]);

            $validated['dob'] = Carbon::parse($validated['dob'])->format('Y-m-d');
            $validated['marriage_anniversary'] = Carbon::parse($validated['marriage_anniversary'])->format('Y-m-d');
            $validated['created_by'] = auth()->id();

            $client->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Client updated successfully',
                'data' => $client
            ], 201);
        } catch (ValidationException $ve) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $ve->validator->errors()
            ], 422);
        } catch (Exception $e) {
            Log::error('Error creating Client', [
                'error' => $e->getMessage()
            ]);
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
            $client = Client::findOrFail($id);
            $client->delete();
            return response()->json([
                'status'  => true,
                'message' => 'Client deleted successfully.',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Client not found.',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error deleting client', [
                'id' => $id,
                'error' => $e->getMessage(),
            ]);
            return response()->json([
                'status'  => false,
                'message' => 'Something went wrong.',
            ], 500);
        }
    }
}
