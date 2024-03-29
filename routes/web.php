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
Route::controller(SpotController::class)->prefix('admin')->name('admin.')->middleware('auth:admin')->group(function() {
    Route::get('spot/create', 'add')->name('spot.add');
    Route::post('spot/create', 'create')->name('spot.create');
    Route::get('spot/index', 'index')->name('spot.index');
    Route::get('spot/edit', 'edit')->name('spot.edit');
    Route::post('spot/edit', 'update')->name('spot.update');
    Route::get('spot/delete', 'delete')->name('spot.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/admin/login', 'admin/login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\Admin\LoginController::class,'logout']);
Route::view('/admin/register', 'admin/register');
Route::post('/admin/register', [App\Http\Controllers\Admin\RegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');

use App\Http\Controllers\Admin\UserController;
Route::controller(UserController::class)->prefix('admin')->name('admin.')->middleware('auth:admin')->group(function() {
    Route::get('user/index', 'index')->name('user.index');
    Route::get('user/edit', 'edit')->name('user.edit');
    Route::post('user/edit', 'update')->name('user.update');
    Route::get('user/delete', 'delete')->name('user.delete');
});

use App\Http\Controllers\TopController;
Route::controller(TopController::class)->group(function(){
    Route::get('spot/top', 'show')->name('spot.show'); 
    Route::get('spot/index','index')->name('spot.index');
    Route::get('spot','add')->name('spot.add');
});