<?php
namespace App\Http\Middleware;

use App\Models\{Query, QueryGuest, QueryTask, EmailLog, Itinerary, Package, PackageDayItem};
use App\Services\QueryAccess;
use Closure;
use Illuminate\Http\Request;

/** Enforce the same visibility rule on direct URLs as on the query list. */
class QueryWorkflowAccess
{
    public function handle(Request $request, Closure $next)
    {
        $controller = class_basename($request->route()->getControllerClass() ?? '');
        $method = $request->route()->getActionMethod();
        $module = match ($controller) {
            'QueryController', 'QueryMailController', 'EmailLogController', 'QueryLogController', 'QueryWorkflowController' => 'Query',
            'QueryGuestController' => 'Guest',
            'QueryTaskController' => 'Task',
            'ItineraryController', 'ItineraryPriceController', 'PackageDaysItemController', 'PackageController', 'QuotationController' => 'Itinerary',
            default => null,
        };
        if (!$module) { return $next($request); }
        $user = $request->user();
        abort_unless($user && (int) $user->status === 1, 403);
        $action = match ($method) {
            'store', 'create', 'duplicate', 'insertToQuery' => 'canAdd',
            'destroy' => 'canDelete',
            default => $request->isMethodSafe() ? 'canView' : 'canEdit',
        };
        if ($controller === 'QueryGuestController' && $request->filled('edit_id')) { $action = 'canEdit'; }
        abort_unless($user->{$action}($module), 403);

        // Validate every parent supplied, including a proposed new parent on update.
        foreach (['query_id', 'queryId', 'queryid'] as $key) {
            if ($request->filled($key)) {
                $value = $request->input($key);
                abort_unless(is_scalar($value) && ctype_digit((string) $value), 422);
                if ((int) $value === 0 && in_array($controller, ['ItineraryController', 'PackageController'])) { continue; }
                QueryAccess::find($value);
            }
        }
        $id = $request->route('id') ?? $request->route('itinery_setup');
        if ($controller === 'QueryController' && $method === 'show') {
            $tabModule = match ($request->query('tab', 'details')) {
                'guest-documents' => 'Guest', 'followups' => 'Task', 'suppliers-communication', 'post-sales-supplier' => 'Supplier', 'proposals' => 'Itinerary', default => 'Query',
            };
            abort_unless($user->canView($tabModule), 403);
        }
        if ($controller === 'QueryController' && $id) { QueryAccess::find($id); }
        $records = [];
        if ($controller === 'QueryGuestController') {
            $key = $request->route('query_guest') ?? $request->input('edit_id');
            if ($key) { $records[] = QueryGuest::findOrFail($key); }
        }
        if ($controller === 'QueryTaskController') {
            $key = $request->route('query_task') ?? $id;
            if ($key) { $records[] = QueryTask::findOrFail($key); }
        }
        if ($controller === 'EmailLogController' && $request->route('email_log')) {
            $record = EmailLog::findOrFail($request->route('email_log'));
            if (!$record->query_id) { abort_unless($user->isAdmin() || $record->created_by == $user->id, 403); }
            else { $records[] = $record; }
        }
        foreach ($records as $record) { QueryAccess::find($record->query_id ?? $record->queryId); }
        $itineraries = [];
        if (in_array($controller, ['ItineraryController', 'ItineraryPriceController', 'PackageController']) && $id) {
            $itineraries[] = Itinerary::findOrFail($id);
        }
        foreach (['itinerary', 'itinerary_id'] as $key) {
            $value = $request->route($key) ?? $request->input($key);
            if ($value) { $itineraries[] = $value instanceof Itinerary ? $value : Itinerary::findOrFail($value); }
        }
        foreach (['item', 'package_days_item'] as $key) {
            $value = $request->route($key);
            if ($value) {
                $item = $value instanceof PackageDayItem ? $value : PackageDayItem::findOrFail($value);
                if ($request->filled('package_id')) { abort_unless((int) $request->package_id === (int) $item->package_id, 422, 'An existing item cannot be moved to another package.'); }
                $itineraries[] = $item->package->itinerary;
            }
        }
        if ($request->filled('package_id') && in_array($controller, ['PackageDaysItemController', 'ItineraryController'])) {
            $package = Package::findOrFail($request->package_id);
            if ($request->filled('itinerary_id')) { abort_unless((int) $package->itinerary_id === (int) $request->itinerary_id, 422, 'Package and itinerary do not match.'); }
            $itineraries[] = $package->itinerary;
        }
        foreach ($itineraries as $itinerary) {
            abort_unless($itinerary, 404);
            if ($itinerary->queryId) { QueryAccess::find($itinerary->queryId); }
        }
        if (!$request->isMethodSafe() && in_array($method, ['update', 'destroy', 'archive', 'unarchive', 'updatePricing', 'store', 'getDayDetails']) && $itineraries) {
            return \Illuminate\Support\Facades\DB::transaction(function () use ($itineraries, $method, $request, $next) {
                $ids = collect($itineraries)->pluck('queryId')->filter()->unique()->sort()->values();
                foreach ($ids as $queryId) { Query::whereKey($queryId)->lockForUpdate()->firstOrFail(); }
                foreach ($itineraries as $itinerary) {
                    if (!$itinerary->queryId) { continue; }
                    $parent = QueryAccess::find($itinerary->queryId);
                    if ($method !== 'getDayDetails') {
                        $hasRecords = $parent->invoice()->where('itinerary_id', $itinerary->id)->exists()
                            || $parent->supplierBookings()->whereHas('item.package', fn ($q) => $q->where('itinerary_id', $itinerary->id))->exists();
                        abort_if($hasRecords, 409, 'This proposal has financial or supplier records and cannot be modified.');
                    }
                }
                return $next($request);
            });
        }
        if ($controller === 'QuotationController' && $id) { QueryAccess::find($id); }
        return $next($request);
    }
}
