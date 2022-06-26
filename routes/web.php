<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

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
Route::patch('dashboard/edit/{id}', [CalendarController::class, 'edit'])->name('dashboard.edit');
//Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
