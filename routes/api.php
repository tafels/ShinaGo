<?php

use App\Facades\LocalizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/filter-main', [\App\Http\Controllers\Api\FilterController::class, 'filterMain']);
Route::get('/filter-rims', [\App\Http\Controllers\Api\FilterController::class, 'filterRims']);
Route::get('/filter-tires', [\App\Http\Controllers\Api\FilterController::class, 'filterTires']);

Route::get('/filter/value', [\App\Http\Controllers\Api\FilterController::class, 'getFilterValue']);
Route::get('/filter/group-value', [\App\Http\Controllers\Api\FilterController::class, 'getFilterGroupValue']);
Route::get('/filter/type-value', [\App\Http\Controllers\Api\FilterController::class, 'getFilterTypeValue']);



