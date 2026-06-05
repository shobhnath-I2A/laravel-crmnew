<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;

class WeatherSettingController extends Controller
{
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

            return view('weather-setting.index', compact(
                'weatherSetting',
                'weatherSettingCount'
            ));

        } catch (\Exception $e) {
            Log::error('Fetch Weather Setting Error', [
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Something went wrong.');
        }
    }

    public function create()
    {
        return view('weather-setting.add-edit-weather-setting');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'city_name' => 'required|string|max:255',
                'status' => 'nullable|in:0,1',
            ]);

            $apiWeather = $this->getWeatherByCity($validated['city_name']);
// dd($apiWeather);
            if ($apiWeather['status'] === false) {
                return response()->json([
                    'status' => false,
                    'message' => $apiWeather['message'] ?? 'Unable to fetch weather data',
                    'error' => $apiWeather['error'] ?? null,
                ], 500);
            }

            $data = $apiWeather['data'];

            $weatherSetting = WeatherSetting::create([
                'city_name' => strtolower($validated['city_name']),
                'cloud_pct' => $data['cloud_pct'] ?? null,
                'temp_weather' => $data['temp'] ?? null,
                'feels_like' => $data['feels_like'] ?? null,
                'humidity' => $data['humidity'] ?? null,
                'min_temp' => $data['min_temp'] ?? null,
                'max_temp' => $data['max_temp'] ?? null,
                'wind_speed' => $data['wind_speed'] ?? null,
                'wind_degrees' => $data['wind_degrees'] ?? null,
                'sunrise' => $data['sunrise'] ?? null,
                'sunset' => $data['sunset'] ?? null,
                'status' => $validated['status'] ?? 1,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Weather Setting created successfully',
                'data' => $weatherSetting,
            ], 201);

        } catch (ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->errors(),
            ], 422);

        } catch (\Exception $e) {
            Log::error('Store Weather Setting Error', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $weatherSetting = WeatherSetting::findOrFail($id);

            return view('weather-setting.add-edit-weather-setting', compact('weatherSetting'));

        } catch (\Exception $e) {
            Log::error('Show Weather Setting Error', [
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Weather setting not found.');
        }
    }

    public function edit(string $id)
    {
        try {
            $weatherSetting = WeatherSetting::findOrFail($id);

            return view('weather-setting.add-edit-weather-setting', compact('weatherSetting'));

        } catch (\Exception $e) {
            Log::error('Edit Weather Setting Error', [
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Weather setting not found.');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'city_name' => 'required|string|max:255',
                'status' => 'nullable|in:0,1',
            ]);

            $weatherSetting = WeatherSetting::findOrFail($id);

            $apiWeather = $this->getWeatherByCity($validated['city_name']);

            if ($apiWeather['status'] === false) {
                return response()->json([
                    'status' => false,
                    'message' => $apiWeather['message'] ?? 'Unable to fetch weather data',
                    'error' => $apiWeather['error'] ?? null,
                ], 500);
            }

            $data = $apiWeather['data'];

            $weatherSetting->update([
                'city_name' => strtolower($validated['city_name']),
                'cloud_pct' => $data['cloud_pct'] ?? null,
                'temp_weather' => $data['temp'] ?? null,
                'feels_like' => $data['feels_like'] ?? null,
                'humidity' => $data['humidity'] ?? null,
                'min_temp' => $data['min_temp'] ?? null,
                'max_temp' => $data['max_temp'] ?? null,
                'wind_speed' => $data['wind_speed'] ?? null,
                'wind_degrees' => $data['wind_degrees'] ?? null,
                'sunrise' => $data['sunrise'] ?? null,
                'sunset' => $data['sunset'] ?? null,
                'status' => $validated['status'] ?? $weatherSetting->status,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Weather Setting updated successfully',
                'data' => $weatherSetting,
            ]);

        } catch (ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->errors(),
            ], 422);

        } catch (\Exception $e) {
            Log::error('Update Weather Setting Error', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $weatherSetting = WeatherSetting::findOrFail($id);
            $weatherSetting->delete();

            return redirect()->route('weather-setting.index')
                ->with('success', 'Weather setting deleted successfully.');

        } catch (\Exception $e) {
            Log::error('Delete Weather Setting Error', [
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Failed to delete weather setting.');
        }
    }

    public function refreshWeather(string $id)
    {
        try {
            $weatherSetting = WeatherSetting::findOrFail($id);

            $apiWeather = $this->getWeatherByCity($weatherSetting->city_name);

            if ($apiWeather['status'] === false) {
                return response()->json([
                    'status' => false,
                    'message' => $apiWeather['message'] ?? 'Unable to refresh weather data',
                ], 500);
            }

            $data = $apiWeather['data'];

            $weatherSetting->update([
                'cloud_pct' => $data['cloud_pct'] ?? null,
                'temp_weather' => $data['temp'] ?? null,
                'feels_like' => $data['feels_like'] ?? null,
                'humidity' => $data['humidity'] ?? null,
                'min_temp' => $data['min_temp'] ?? null,
                'max_temp' => $data['max_temp'] ?? null,
                'wind_speed' => $data['wind_speed'] ?? null,
                'wind_degrees' => $data['wind_degrees'] ?? null,
                'sunrise' => $data['sunrise'] ?? null,
                'sunset' => $data['sunset'] ?? null,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Weather refreshed successfully',
                'data' => $weatherSetting,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    private function getWeatherByCity(string $city): array
    {
        try {
            $response = Http::withHeaders([
                'X-RapidAPI-Host' => config('services.rapidapi_weather.host'),
                'X-RapidAPI-Key' => config('services.rapidapi_weather.key'),
            ])->timeout(30)->get(config('services.rapidapi_weather.url'), [
                'city' => $city,
            ]);

            if (!$response->successful()) {
                return [
                    'status' => false,
                    'city' => $city,
                    'message' => 'Unable to fetch weather',
                    'error' => $response->body(),
                ];
            }

            return [
                'status' => true,
                'city' => $city,
                'data' => $response->json(),
            ];

        } catch (\Exception $e) {
            return [
                'status' => false,
                'city' => $city,
                'message' => $e->getMessage(),
            ];
        }
    }
}
