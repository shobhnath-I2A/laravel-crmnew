<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QueryTaskController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelRateController;

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

Route::resource('hotels', HotelController::class);
Route::resource('hotels-rates', HotelRateController::class);
