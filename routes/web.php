<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityRateController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\QueryTaskController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelRateController;
use App\Http\Controllers\PackageDaysItemController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/queries',[QueryController::class,'index'])->name('queries.index');
Route::get('/queries/create',[QueryController::class,'create'])->name('queries.create');
Route::post('/queries',[QueryController::class,'store'])->name('queries.store');
Route::get('/queries/{id}/edit',[QueryController::class,'edit'])->name('queries.edit');
Route::put('/queries/{id}',[QueryController::class,'update'])->name('queries.update');
Route::get('/queries/{id}', [QueryController::class, 'show'])->name('queries.show');

Route::resource('query-tasks', QueryTaskController::class);
Route::get('/check-reminders', [QueryTaskController::class, 'checkReminders']);
Route::post('/task-done/{id}', [QueryTaskController::class, 'markDone']);

Route::get('/clients/create',[ClientController::class,'create'])->name('clients.create');

Route::resource('/itineraries', ItineraryController::class);
Route::get('/itinerary/day-details', [ItineraryController::class, 'getDayDetails'])
    ->name('itinerary.day.details');
Route::get('/itinerary/acccomodation', [ItineraryController::class, 'createAccomodation'])
    ->name('itinerary.day.accomodation');
Route::post('/itinerary/store-acccomodation', [ItineraryController::class, 'storeAccomodation'])
    ->name('itinerary.storeaccomodation');


Route::resource('hotels', HotelController::class);
Route::resource('hotels-rates', HotelRateController::class);
Route::get('/get-hotels/{destination}', [HotelController::class, 'getHotels']);

Route::resource('activities', ActivityController::class);
Route::resource('activities-rates', ActivityRateController::class);

Route::resource('destinations', DestinationController::class);

Route::resource('package-days-items', PackageDaysItemController::class);

Route::get('/get-master-data', [PackageDaysItemController::class, 'getMasterData']);
