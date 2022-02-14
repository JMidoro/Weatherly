<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WeatherMapController;
use App\Http\Controllers\HomeController;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('weather')->group(function() {
    Route::get('/{country}-{zip}', [HomeController::class, 'forecast'])->name('weather.forecast');
    Route::get('/{country}-{zip}/{day}', [HomeController::class, 'day'])->name('weather.day');
    Route::post('/', [HomeController::class, 'lookup'])->name('weather.lookup');
});
