<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanbakuController;
use App\Http\Controllers\BuyerSellerController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

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
Route::get('/bahanbaku/hapus/{id}', [BahanbakuController::class, 'destroy']);
Route::get('/bahanbaku/lihat/{id}', [BahanbakuController::class, 'show']);
Route::get('/bahanbaku/edit/{bahanbaku}', [BahanbakuController::class, 'edit']);
Route::post('/bahanbaku/edit/{bahanbaku}', [BahanbakuController::class, 'update']);

Route::get('/buyer', [BuyerController::class, 'index']);
Route::get('/seller', [SellerController::class, 'index']);

Route::get('/resep', [ResepController::class, 'index'])->name('resep.index');
Route::get('/resep/tambah', [ResepController::class, 'create'])->name('resep.create');
Route::post('/resep/tambah', [ResepController::class, 'store'])->name('resep.store');
Route::get('/resep/hapus/{id}', [ResepController::class, 'destroy'])->name('resep.destroy');
Route::get('/resep/lihat/{id}', [ResepController::class, 'show'])->name('resep.show');
Route::get('/resep/edit/{resep}', [ResepController::class, 'edit'])->name('resep.edit');
Route::post('/resep/edit/{resep}', [ResepController::class, 'update'])->name('resep.update');

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'store']);
Route::get('/cart/update', [CartController::class, 'update']);
Route::get('/cart/remove', [CartController::class, 'destroy']);

Route::get('/user', [App\Http\Controllers\UserController::class, 'show'])->name('user');

//Mail
Route::get('/send/email', [HomeController::class, 'mail']);
Route::get('/send-mail', function() {
    Mail::to('newuser@example.com')->send(new MailtrapExample());

    return "A message has been sent to mailtrap";
});