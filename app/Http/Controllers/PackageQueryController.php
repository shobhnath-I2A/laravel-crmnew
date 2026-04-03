<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageQuery;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
class PackageQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
     {

         try {
            $packageQueryBuilder = PackageQuery::query();
            if ($request->filled('keyword')) {
                $packageQueryBuilder->where('full_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('phone_number', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%')
                    ->orWhere('phone_number', 'like', '%' . $request->keyword . '%');
            }
            $packageQuery = PackageQuery::latest()->paginate(10);
            $packageQueryCount = PackageQuery::count();
            return view('package-query.index', compact('packageQuery', 'packageQueryCount'));
        } catch (\Exception $e) {
            Log::error('Error fetching Package Query', [
                'error' => $e->getMessage()
            ]);
        }
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
