<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscribeController;
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
    //This will serve as the welcome page, from here you can pick today's weather cast
    // Or subscribe with an email
    return view('welcome');
});

Route::get('todaysweather', [HomeController::class, 'show'])->name('api');
Route::post('todaysweather', [HomeController::class, 'store'])->name('subscribe');


