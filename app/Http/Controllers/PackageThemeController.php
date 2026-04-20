<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageTheme;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
class PackageThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $packageThemeBuilder = PackageTheme::query();

            if ($request->filled('keyword')) {
                $packageThemeBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }

            $packageTheme = $packageThemeBuilder->latest()->paginate(10);
            $packageTheme->appends($request->all());
            $packageThemeCount = PackageTheme::count();
            // dd($packageTheme);
            return view('package-theme.index', compact('packageTheme', 'packageThemeCount'));
        } catch (\Exception $e) {
            Log::error('Fetch to show the Package Theme', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('package-theme.add-edit-package-theme');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:package_themes,name',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
                'status' => 'required|in:0,1',
            ]);
            // dd($validated);
            // Save data
            $packageTheme  = PackageTheme::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Package Theme created successfully",
                'data' => $packageTheme
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
            $packageTheme = PackageTheme::findOrFail($id);
            return view('package-theme.add-edit-package-theme', compact('packageTheme'));
        } catch (\Exception $e) {
            Log::error('Show Package Theme Error: ' . $e->getMessage());
            return back()->with('error', 'Package theme not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $packageTheme = PackageTheme::findOrFail($id);
            return view('package-theme.add-edit-package-theme', compact('packageTheme'));
        } catch (\Exception $e) {
            Log::error('Error fetch to package theme', $e->getMessage());
            return back()->with('error', 'Package theme not found.');
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
                'name' => 'required|string|max:255|unique:package_themes,name',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
                'status' => 'required|in:0,1',
            ]);

            $packageTheme = PackageTheme::findOrFail($id);

            $packageTheme->update($validated);

            return response()->json([
                'status' => true,
                'message' => "Package Theme Update successfully",
                'data' => $packageTheme
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

}
