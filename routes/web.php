<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ListBookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MyBookingController;

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
    return view('auth.login');
});

Route::get('/home',function(){
    return view('pages.front-end.home');
})->name('default-home');

/*Route::get('/dashboard',function(){
    return view('pages.back-end.home');
})->name('dashboard');*/

// Calendar routes
Route::get('/dashboard', [CalendarController::class, 'index'])->name('dashboard');
Route::post('/dashboard/store', [CalendarController::class, 'store'])->name('dashboard.store');
Route::get('/dashboard/view/{id}', [CalendarController::class, 'view'])->name('dashboard.view');
Route::post('/dashboard/edit/{id}', [CalendarController::class, 'edit'])->name('dashboard.edit');

//List booking data routes
Route::get('/dashboard/bookings', [ListBookingController::class, 'index'])->name('dashboard.bookings');

//List vehicle routes
Route::get('/dashboard/vehicle', [VehicleController::class, 'index'])->name('dashboard.vehicle');
Route::get('/dashboard/type', [VehicleController::class, 'getType'])->name('dashboard.type');
Route::get('/dashboard/brand', [VehicleController::class, 'getBrand'])->name('dashboard.brand');
Route::get('/dashboard/driver', [VehicleController::class, 'getDriver'])->name('dashboard.driver');

//List mybooking data routes
Route::get('/dashboard/{id}', [MyBookingController::class, 'index'])->name('dashboard.mybooking');