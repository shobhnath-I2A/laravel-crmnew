<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\WeatherSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
class WeatherSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $weatherSettingBuilder = WeatherSetting::query();

            if ($request->filled('keyword')) {
                $weatherSettingBuilder->where('city_name', 'like', '%' . $request->keyword . '%');
            }

            $weatherSetting = $weatherSettingBuilder->latest()->paginate(10);
            $weatherSetting->appends($request->all());
            $weatherSettingCount = WeatherSetting::count();
            // dd($weatherSetting);
            return view('weather-setting.index', compact('weatherSetting', 'weatherSettingCount'));
        } catch (\Exception $e) {
            Log::error('Fetch to show the Weather Setting', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weather-setting.add-edit-weather-setting');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'city_name1' => 'required|string|max:255',
                'city_name2' => 'required|string|max:255',
                'city_name3' => 'required|string|max:255',
                'city_name4' => 'required|string|max:255',
            ]);
            // dd($validated);
            // Save data
            $weatherSetting  = WeatherSetting::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Weather Setting created successfully",
                'data' => $weatherSetting
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
            $weatherSetting = WeatherSetting::findOrFail($id);
            return view('weather-setting.add-edit-weather-setting', compact('weatherSetting'));
        } catch (\Exception $e) {
            Log::error('Show Weather Setting Error: ' . $e->getMessage());
            return back()->with('error', 'Weather setting not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $weatherSetting = WeatherSetting::findOrFail($id);
            return view('weather-setting.add-edit-weather-setting', compact('weatherSetting'));
        } catch (\Exception $e) {
            Log::error('Error fetch to weather setting', $e->getMessage());
            return back()->with('error', 'Weather setting not found.');
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
                'city_name1' => 'required|string|max:255',
                'city_name2' => 'required|string|max:255',
                'city_name3' => 'required|string|max:255',
                'city_name4' => 'required|string|max:255',
            ]);

            $weatherSetting = WeatherSetting::findOrFail($id);

            $weatherSetting->update($validated);

            return response()->json([
                'status' => true,
                'message' => "Weather Setting Update successfully",
                'data' => $weatherSetting
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
            $weatherSetting = WeatherSetting::findOrFail($id);
            $weatherSetting->delete();

            return redirect()->route('hotels.index')
                ->with('success', 'Weather setting deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Delete Weather Setting Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete weather setting.');
        }
    }
}
