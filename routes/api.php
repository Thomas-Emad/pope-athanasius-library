<?php

use App\Http\Controllers\Sync\SyncController;
use Illuminate\Support\Facades\Route;

Route::post('sync/get-from-extrnal', [SyncController::class, 'getFromExtrnal']);
Route::post('sync/save-in-extrnal', [SyncController::class, 'saveInExtrnal']);
Route::post('sync/feedback', [SyncController::class, 'feedback']);
