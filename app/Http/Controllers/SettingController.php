<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     try {
            // Default tab = teams
            $tab = $request->query('tab', 'team-management');
            return view('setting.index', compact('tab'));

        } catch (\Exception $e) {
            Log::error('Error fetching Setting Tabs', [
                'exception' => $e
            ]);

            return redirect()->route('settings.show', ['tab' => 'teams'])
                ->with('error', 'Something went wrong!');
        }
    // return view('setting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
     public function show(Request $request)
    {

        try {
            // Default tab = teams
            $tab = $request->query('tab', 'teams');
            return view('setting.index', compact('tab'));

        } catch (\Exception $e) {
            Log::error('Error fetching Setting Tabs', [
                'exception' => $e
            ]);

            return redirect()->route('settings.show', ['tab' => 'teams'])
                ->with('error', 'Something went wrong!');
        }
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
