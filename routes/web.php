<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::post('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::prefix('/dashboard')
    ->middleware('auth')
    ->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::resource('/category', \App\Http\Controllers\VehicleCategoryController::class);
    Route::resource('/vehicles', \App\Http\Controllers\VehicleController::class);
    Route::get('/vehicles/create/{id}', [\App\Http\Controllers\VehicleUseController::class, 'createWithId'])->name('create-vehicle-use');
    Route::resource('/vehicleUse', \App\Http\Controllers\VehicleUseController::class);
    Route::resource('/user', \App\Http\Controllers\UserController::class)->middleware('admin');
});
