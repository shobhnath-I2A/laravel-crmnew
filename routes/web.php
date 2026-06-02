<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityRateController;
use App\Http\Controllers\AutomationController;
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
use App\Http\Controllers\BranchMasterController;
use App\Http\Controllers\ItineraryPriceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SmtpSettingController;

function permissionResource($uri, $controller, $module)
{
    Route::get($uri, [$controller, 'index'])
        ->middleware("module.permission:$module,view")
        ->name("$uri.index");

    Route::get("$uri/create", [$controller, 'create'])
        ->middleware("module.permission:$module,add")
        ->name("$uri.create");

    Route::post($uri, [$controller, 'store'])
        ->middleware("module.permission:$module,add")
        ->name("$uri.store");

    Route::get("$uri/{id}", [$controller, 'show'])
        ->middleware("module.permission:$module,view")
        ->name("$uri.show");

    Route::get("$uri/{id}/edit", [$controller, 'edit'])
        ->middleware("module.permission:$module,edit")
        ->name("$uri.edit");

    Route::put("$uri/{id}", [$controller, 'update'])
        ->middleware("module.permission:$module,edit")
        ->name("$uri.update");

    Route::delete("$uri/{id}", [$controller, 'destroy'])
        ->middleware("module.permission:$module,delete")
        ->name("$uri.destroy");
}

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware(['auth', 'verified', 'restrict.ip'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    permissionResource('queries', QueryController::class, 'Query');
    permissionResource('clients', ClientController::class, 'Client');
    permissionResource('package-query', LeadController::class, 'PackageQuery');
    permissionResource('itineraries', ItineraryController::class, 'Itinerary');
    permissionResource('hotels', HotelController::class, 'Hotel');
    permissionResource('room-type', HotelRoomTypeController::class, 'RoomType');
    permissionResource('activities', ActivityController::class, 'Activity');
    permissionResource('transfers', TransferMasterController::class, 'Transfer');
    // permissionResource('itineraries-price', ItineraryPriceController::class, 'ItineraryPrice');

    // Route::get('itineraries-price/{id}', [ItineraryPriceController::class, 'index'])
    // ->name('itineraries-price.index');

    // Route::get('/itineraries-final/{id}', [ItineraryController::class, 'finalItinerary'])
    //     ->name('itineraries.final')
    //     ->middleware('module.permission:itineraries-final,view');

    Route::get('/itineraries/{id}', [ItineraryController::class, 'show'])
    ->name('itineraries.show');

    Route::get('/itineraries-price/{id}', [ItineraryPriceController::class, 'index'])
        ->name('itineraries-price.index');

    Route::get('/itineraries-final/{id}', [ItineraryController::class, 'finalItinerary'])
        ->name('itineraries.final');


    Route::resource('query-tasks', QueryTaskController::class)
        ->middleware('module.permission:Task,view');

    Route::get('/check-reminders', [QueryTaskController::class, 'checkReminders'])
        ->middleware('module.permission:Task,view');

    Route::post('/task-done/{id}', [QueryTaskController::class, 'markDone'])
        ->middleware('module.permission:Task,edit');

    Route::get('/itinerary/day-details', [ItineraryController::class, 'getDayDetails'])
        ->middleware('module.permission:Itinerary,view')
        ->name('itinerary.day.details');

    Route::get('/itinerary/acccomodation', [ItineraryController::class, 'createAccomodation'])
        ->middleware('module.permission:Itinerary,edit')
        ->name('itinerary.day.accomodation');

    Route::post('/itinerary/store-acccomodation', [ItineraryController::class, 'storeAccomodation'])
        ->middleware('module.permission:Itinerary,edit')
        ->name('itinerary.storeaccomodation');

    Route::get('/load-hotels', [ItineraryController::class, 'loadHotels'])->name('load.hotels')
        ->middleware('module.permission:Itinerary,view');

    Route::get('/load-hotel-data', [ItineraryController::class, 'loadHotelData'])->name('load.hotel.data')
        ->middleware('module.permission:Itinerary,view');
    Route::get('/load-meal-plans', [HotelController::class, 'loadMealPlans'])
    ->name('load.meal.plans');

    Route::resource('hotels-rates', HotelRateController::class)
        ->middleware('module.permission:Hotel,edit');

    Route::get('/get-hotels/{destination}', [HotelController::class, 'getHotels'])
        ->middleware('module.permission:Hotel,view');

    Route::resource('activities-rates', ActivityRateController::class)
        ->middleware('module.permission:Activity,edit');

    Route::resource('destinations', DestinationController::class)
        ->middleware('module.permission:Itinerary,view');

    Route::resource('package-days-items', PackageDaysItemController::class)
        ->middleware('module.permission:Itinerary,edit');

    Route::get('/get-master-data', [PackageDaysItemController::class, 'getMasterData'])
        ->middleware('module.permission:Itinerary,view');

    Route::resource('transfer-rate-list', TransferMasterRateListController::class)
        ->middleware('module.permission:Transfer,edit');


    Route::resource('meal-plan-master', MealPlanMasterController::class)
        ->middleware('module.permission:MealPlan,view');

    Route::resource('day-itinerary-master', DayItineraryMasterController::class)
        ->middleware('module.permission:Itinerary,view');

    Route::resource('lead-source', LeadSourceController::class)
        ->middleware('module.permission:Query,edit');

    Route::resource('package-theme', PackageThemeController::class)
        ->middleware('module.permission:Itinerary,edit');

    Route::resource('weather-setting', WeatherSettingController::class);
    Route::resource('currency-exchange', CurrencyExchangeMasterController::class);

    Route::middleware(['auth', 'admin.only'])->group(function () {
        Route::resource('settings', SettingController::class);
        Route::get('/organisation/settings', [SettingController::class, 'createOrganization'])
            ->name('settings.createorganization');
        Route::post('/organisation/settings', [SettingController::class, 'saveOrganisation'])
            ->name('settings.organisation.save');
        Route::post('/default/settings', [SettingController::class, 'saveDefault'])
            ->name('settings.default.save');
        Route::post('/payment-gateway/settings', [SettingController::class, 'savePaymentGateway'])
            ->name('settings.payment.save');
        Route::post('/package-inclusions/settings', [SettingController::class, 'savePackageInclusions'])
            ->name('settings.package-inclusions.save');
        Route::resource('staff', StaffController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('branch-master', BranchMasterController::class);
        Route::resource('automation', AutomationController::class);
        Route::resource('smtp-setting', SmtpSettingController::class);
    });

    // Route::get('/settings/organisation', [SettingController::class, 'createOrganization'])
    // ->name('settings.createorganization');

    // Route::post('/settings/organisation', [SettingController::class, 'saveOrganisation'])
    // ->name('settings.organisation.save');

    // Route::post('/settings/default', [SettingController::class, 'saveDefault'])
    //     ->name('settings.default.save');

    // Route::post('/settings/payment-gateway', [SettingController::class, 'savePaymentGateway'])
    //     ->name('settings.payment.save');
    // Route::post('/settings/package-inclusions', [SettingController::class, 'savePackageInclusions'])
    //     ->name('settings.package-inclusions.save');

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
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/my-profile/password', [ProfileController::class, 'passwordUpdate'])
    ->name('profile.password.update');
});

require __DIR__ . '/auth.php';
