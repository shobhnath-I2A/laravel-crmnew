<?php
namespace App\Services;
use App\Models\{Itinerary, Query};
use Illuminate\Support\Facades\DB;

class ItineraryCopy
{
    public function copy(Itinerary $source, int $queryId, bool $rename = true): Itinerary
    {
        return DB::transaction(function () use ($source, $queryId, $rename) {
            if ($queryId) { Query::whereKey($queryId)->lockForUpdate()->firstOrFail(); }
            $source = Itinerary::with(['destinations', 'packages.destinations', 'packages.dayItems'])->lockForUpdate()->findOrFail($source->id);
            $copy = $source->replicate();
            $copy->queryId = $queryId;
            $copy->name = $source->name . ($rename ? ' Copy' : '');
            $copy->status = 0;
            $copy->accepted_hotel_option = null;
            $copy->created_by = auth()->id();
            $copy->save();
            $copy->destinations()->sync($source->destinations->modelKeys());
            foreach ($source->packages as $package) {
                $newPackage = $package->replicate();
                $newPackage->itinerary_id = $copy->id;
                $newPackage->created_by = auth()->id();
                $newPackage->save();
                $newPackage->destinations()->sync($package->destinations->modelKeys());
                foreach ($package->dayItems as $item) {
                    $newItem = $item->replicate();
                    $newItem->package_id = $newPackage->id;
                    $newItem->created_by = auth()->id();
                    $newItem->save();
                    // Copy raw detail values to avoid display-date accessors changing stored dates.
                    foreach (['package_day_item_hotels', 'package_day_item_flights', 'package_day_item_activities', 'package_day_item_transportations', 'package_day_item_prices'] as $table) {
                        foreach (DB::table($table)->where('package_day_item_id', $item->id)->get() as $row) {
                            $data = (array) $row;
                            unset($data['id']);
                            $data['package_day_item_id'] = $newItem->id;
                            $data['created_at'] = $data['updated_at'] = now();
                            DB::table($table)->insert($data);
                        }
                    }
                }
            }
            if ($queryId) { QueryHistory::record($queryId, 'proposal_copied', 'Proposal #'.$copy->id.' copied from #'.$source->id); }
            return $copy;
        });
    }
}
