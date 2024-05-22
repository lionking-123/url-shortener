<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;

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

Route::get('/', [UrlShortenerController::class, 'index'])->name('urlShortener');
Route::post('/', [UrlShortenerController::class, 'store'])->name('generateShortUrl');
Route::get('/{hash}', [UrlShortenerController::class, 'redirectToUrl'])->name('redirectToUrl');