<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/queries',[QueryController::class,'index'])->name('queries.index');
Route::get('/queries/create',[QueryController::class,'create'])->name('queries.create');
Route::post('/queries',[QueryController::class,'store'])->name('queries.store');
Route::get('/queries/{id}/edit',[QueryController::class,'edit'])->name('queries.edit');
Route::put('/queries/{id}',[QueryController::class,'update'])->name('queries.update');
Route::get('/queries/{id}', [QueryController::class, 'show'])->name('queries.show');

Route::get('/clients/create',[ClientController::class,'create'])->name('clients.create');

Route::get('/itineraries/create',[ItineraryController::class,'create'])->name('itineraries.create');
