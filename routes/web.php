<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanbakuController;
use App\Http\Controllers\BuyerSellerController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\CartController;

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

//Bahan Baku
Route::get('/bahanbaku', [BahanbakuController::class, 'index']);
Route::get('/bahanbaku/create', [BahanbakuController::class, 'create']);
Route::post('/bahanbaku', [BahanbakuController::class, 'store']);

Route::get('/buyer', [BuyerController::class, 'index']);
Route::get('/seller', [SellerController::class, 'index']);

Route::get('/resep', [ResepController::class, 'index']);
Route::get('/resep/tambah', [ResepController::class, 'create']);
Route::post('/resep/tambah', [ResepController::class, 'store']);
Route::get('/resep/hapus/{id}', [ResepController::class, 'destroy']);
Route::get('/resep/lihat/{id}', [ResepController::class, 'show']);
Route::get('/resep/edit/{resep}', [ResepController::class, 'edit']);
Route::post('/resep/edit/{resep}', [ResepController::class, 'update']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'store']);
Route::get('/cart/update', [CartController::class, 'update']);
Route::get('/cart/remove', [CartController::class, 'destroy']);
