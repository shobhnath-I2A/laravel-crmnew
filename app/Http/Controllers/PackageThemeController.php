<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageTheme;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
class PackageThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $packageThemeBuilder = PackageTheme::with('addedBy');

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
            $validated['created_by'] = auth()->id();
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

        $packageTheme = PackageTheme::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('package_themes', 'name')->ignore($packageTheme->id),
            ],
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:0,1',
        ]);

        // Upload image if provided
        if ($request->hasFile('image')) {

            // Delete old image
            if ($packageTheme->image && file_exists(public_path($packageTheme->image))) {
                @unlink(public_path($packageTheme->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/package-themes'), $filename);

            $validated['image'] = 'uploads/package-themes/' . $filename;
        }

        $validated['created_by'] = auth()->id();
        $packageTheme->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Package Theme updated successfully',
            'data' => $packageTheme->fresh(),
        ]);

    } catch (ValidationException $ve) {

        return response()->json([
            'status' => false,
            'message' => 'Validation Failed',
            'errors' => $ve->errors(),
        ], 422);

    } catch (\Exception $e) {

        return response()->json([
            'status' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}

}
