<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/leads', [LeadController::class, 'store'])->middleware('throttle:30,1');
Route::post('/leads/{lead}/assign', [LeadController::class, 'assignLead'])
    ->middleware(['auth:sanctum', 'admin.only', 'throttle:60,1']);
