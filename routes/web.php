<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\SpotController;
Route::controller(SpotController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('spot/create', 'add')->name('spot.add');
    Route::post('spot/create', 'create')->name('spot.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
