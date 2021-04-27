<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerSellerController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;

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
Route::get('/beranda', [BuyerSellerController::class, 'index']);
Route::get('/buyer', [BuyerController::class, 'index']);
Route::get('/seller', [SellerController::class, 'index']);

