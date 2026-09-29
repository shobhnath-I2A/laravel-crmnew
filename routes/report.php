<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttandanceReportController;
use App\Http\Controllers\CollectReportController;
use App\Http\Controllers\LedgerReportController;
use App\Http\Controllers\MisReportController;
use App\Http\Controllers\NoteReportController;
use App\Http\Controllers\ProfitLossReportController;
use App\Http\Controllers\TaskFollowupReportController;
use App\Http\Controllers\TourReportController;

Route::get('profit-loss-report', [ProfitLossReportController::class, 'index'])
    ->name('profit-loss');

Route::get('attandance-report', [AttandanceReportController::class, 'index'])
    ->name('attandance-report');

Route::get('note-report', [NoteReportController::class, 'index'])
    ->name('note-report');

Route::get('collect-report', [CollectReportController::class, 'index'])
    ->name('collect-report');

Route::get('tour-report', [TourReportController::class, 'index'])
    ->name('tour-report');

Route::get('task-followup-report', [TaskFollowupReportController::class, 'index'])
    ->name('task-followup-report');

Route::get('mis-report', [MisReportController::class, 'index'])
    ->name('mis-report');
Route::get('ledger-report', [LedgerReportController::class, 'index'])
    ->name('ledger-report');
