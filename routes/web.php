<?php

use App\Facades\LocalizationService;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Api\FilterController;


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
    Route::get('/{category}', CategoryController::class)->where('category', '[a-z0-9\_\-\/]+')->name('initCategory');
    Route::get('/{category}/{any?}', CategoryController::class)->where('category', '[a-z0-9\_\-\/]+')->name('initCategoryAny');



    Route::post('/filter/init-filter', [FilterController::class, 'initFilter'])->name('filter.initFilterUrl');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
