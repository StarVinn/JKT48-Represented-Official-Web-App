<?php

use App\Http\Controllers\Api\SetlistController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsScraperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiveController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/setlists', [SetlistController::class, 'index']);
Route::get('/setlists/{id}', [SetlistController::class, 'show']);
Route::apiResource('members', MemberController::class);
Route::get('/news', [NewsScraperController::class, 'api']);
Route::get('/showroom', [LiveController::class, 'showroomApi']);


