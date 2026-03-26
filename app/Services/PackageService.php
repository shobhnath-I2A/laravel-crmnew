<?php

namespace App\Services;

use App\Models\Package;
use App\Models\Itinerary;
use App\Models\PackageDayItem;
use App\Models\PackageDayItemPrice;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PackageService
{
    /**
     * Create package from itinerary (ONLY ONCE)
     */
    public function createFromItinerary($itineraryId)
    {
        return DB::transaction(function () use ($itineraryId) {

            $itinerary = Itinerary::with('destinations')->findOrFail($itineraryId);

            // Prevent duplicate
            $existing = Package::where('itinerary_id', $itineraryId)->first();
            if ($existing) {
                return $existing;
            }

            // Create package
            $package = Package::create([
                'name' => $itinerary->name,
                'start_date' => $itinerary->start_date,
                'end_date' => $itinerary->end_date,
                'total_days' => $itinerary->total_days,
                'price_per_person' => $itinerary->website_cost ?? 0,
                'itinerary_id' => $itinerary->id,
            ]);

            // Sync destinations
            $package->destinations()->sync(
                $itinerary->destinations->pluck('id')->toArray()
            );

            // Create day-wise rows (1 per day)
            $this->generateDays($package, $itinerary);

            return $package;
        });
    }

    /**
     * Sync package when itinerary updated
     */
    public function syncWithItinerary($package, $itinerary)
    {
        DB::transaction(function () use ($package, $itinerary) {

            // Update basic info
            $package->update([
                'name' => $itinerary->name,
                'start_date' => $itinerary->start_date,
                'end_date' => $itinerary->end_date,
                'total_days' => $itinerary->total_days,
            ]);

            // Sync destinations (DO NOT override day selection)
            $package->destinations()->sync(
                $itinerary->destinations->pluck('id')->toArray()
            );

            // Sync days
            $this->syncDays($package, $itinerary);
        });
    }

    /**
     * Create days (initial)
     */
    private function generateDays($package, $itinerary)
    {
        $start = Carbon::parse($itinerary->start_date);
        $end   = Carbon::parse($itinerary->end_date);

        $dayNumber = 1;

        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {

            $item = PackageDayItem::create([
                'package_id' => $package->id,
                'day' => $dayNumber,
                'type' => 'daydetail',
                'destination_id' => $package->destinations->first()->id ?? null
            ]);

            // PackageDayItemPrice::create([
            //     'package_day_item_id' => $item->id,
            //     'price' => 0
            // ]);

            $dayNumber++;
        }
    }

    /**
     * Sync days when itinerary changes
     */
    private function syncDays($package, $itinerary)
    {
        $start = Carbon::parse($itinerary->start_date);
        $end   = Carbon::parse($itinerary->end_date);

        $dayNumber = 1;

        // Add / Update days
        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {

            $item = PackageDayItem::where('package_id', $package->id)
                ->where('day', $dayNumber)
                ->first();

            if (!$item) {
                // Create new day
                $item = PackageDayItem::create([
                    'package_id' => $package->id,
                    'day' => $dayNumber,
                    'type' => 'daydetail',
                    'destination_id' => $package->destinations->first()->id ?? null
                ]);

            } else {
                //  Update date only (keep user data safe)
                // $item->update([
                //     'date' => $date->format('Y-m-d')
                // ]);
            }

            $dayNumber++;
        }

        // Delete extra days
        $totalDays = $start->diffInDays($end) + 1;

        PackageDayItem::where('package_id', $package->id)
            ->where('day', '>', $totalDays)
            ->delete();
    }
}
