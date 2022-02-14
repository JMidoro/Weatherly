<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WeatherMapController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WeatherController;

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

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Route::prefix('weather')->group(function() {
    Route::get('/{country}-{zip}', [WeatherController::class, 'forecast'])->name('weather.forecast');
    Route::get('/{country}-{zip}/{day}', [WeatherController::class, 'day'])->name('weather.day');
    Route::post('/', [WeatherController::class, 'lookup'])->name('weather.lookup');
});
