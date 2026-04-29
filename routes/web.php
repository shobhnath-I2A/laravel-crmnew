<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityRateController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\QueryTaskController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelRateController;
use App\Http\Controllers\HotelRoomTypeController;
use App\Http\Controllers\PackageDaysItemController;
use App\Http\Controllers\PackageQueryController;
use App\Http\Controllers\TransferMasterController;
use App\Http\Controllers\TransferMasterRateListController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MealPlanMasterController;
use App\Http\Controllers\DayItineraryMasterController;
use App\Http\Controllers\LeadSourceController;
use App\Http\Controllers\PackageThemeController;
use App\Http\Controllers\WeatherSettingController;
use App\Http\Controllers\CurrencyExchangeMasterController;
use App\Http\Controllers\NotificationController;
use App\Events\LeadNotificationCreated;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'restrict.ip'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/queries', [QueryController::class, 'index'])->name('queries.index');
    Route::get('/queries/create', [QueryController::class, 'create'])->name('queries.create');
    Route::post('/queries', [QueryController::class, 'store'])->name('queries.store');
    Route::get('/queries/{id}/edit', [QueryController::class, 'edit'])->name('queries.edit');
    Route::put('/queries/{id}', [QueryController::class, 'update'])->name('queries.update');
    Route::get('/queries/{id}', [QueryController::class, 'show'])->name('queries.show');

    Route::resource('query-tasks', QueryTaskController::class);
    Route::get('/check-reminders', [QueryTaskController::class, 'checkReminders']);
    Route::post('/task-done/{id}', [QueryTaskController::class, 'markDone']);

    Route::resource('clients', ClientController::class);
    Route::resource('package-query', LeadController::class);

    Route::resource('itineraries', ItineraryController::class);
    Route::get('/itinerary/day-details', [ItineraryController::class, 'getDayDetails'])->name('itinerary.day.details');
    Route::get('/itinerary/acccomodation', [ItineraryController::class, 'createAccomodation'])->name('itinerary.day.accomodation');
    Route::post('/itinerary/store-acccomodation', [ItineraryController::class, 'storeAccomodation'])->name('itinerary.storeaccomodation');

    Route::get('/load-hotels', [ItineraryController::class, 'loadHotels']);
    Route::get('/load-hotel-data', [ItineraryController::class, 'loadHotelData']);

    Route::resource('hotels', HotelController::class);
    Route::resource('hotels-rates', HotelRateController::class);
    Route::get('/get-hotels/{destination}', [HotelController::class, 'getHotels']);

    Route::resource('room-type', HotelRoomTypeController::class);

    Route::resource('activities', ActivityController::class);
    Route::resource('activities-rates', ActivityRateController::class);

    Route::resource('destinations', DestinationController::class);
    Route::resource('package-days-items', PackageDaysItemController::class);
    Route::get('/get-master-data', [PackageDaysItemController::class, 'getMasterData']);

    Route::resource('transfers', TransferMasterController::class);
    Route::resource('transfer-rate-list', TransferMasterRateListController::class);

    Route::resource('settings', SettingController::class);
    Route::resource('meal-plan-master', MealPlanMasterController::class);
    Route::resource('day-itinerary-master', DayItineraryMasterController::class);
    Route::resource('lead-source', LeadSourceController::class);
    Route::resource('package-theme', PackageThemeController::class);
    Route::resource('weather-setting', WeatherSettingController::class);
    Route::resource('currency-exchange', CurrencyExchangeMasterController::class);

    Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount']);
    Route::get('/notifications/latest', [NotificationController::class, 'latest']);
    Route::post('/notifications/{id}/mark-read', [NotificationController::class, 'markRead']);
    Route::get('/test-broadcast', function () {
    $notification = (object) [
        'id' => 999,
        'lead_id' => 123,
        'type' => 'lead',
        'title' => 'Test Lead',
        'message' => 'This is test notification',
        'data' => [],
    ];

    event(new \App\Events\LeadNotificationCreated($notification, auth()->id()));

    return 'sent';
})->middleware('auth');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
