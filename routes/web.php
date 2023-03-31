<?php

use App\Http\Controllers\RouteController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Middleware\CatalogIsValid;
use App\Http\Middleware\PostIsValid;
use Illuminate\Support\Facades\Route;
use App\Services\LocalizationService;
use App\Http\Controllers\MainController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LocalizationService::locale(), 'middleware' => 'setLocale'], function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/announcement', [AnnouncementController::class, 'announcement'])->name('announcement');
    Route::get('/{slugs}/{any?}', RouteController::class)->where('slugs', '[a-z0-9\_\-\/]+')->name('indexs');
}
);
