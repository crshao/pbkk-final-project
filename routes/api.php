<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\BahanbakuController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ResepController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

//Melindungi destroy, hanya untuk user yang ter authentikasi
Route::resource('user', UserController::class)->except(['destroy']);

Route::middleware('auth:sanctum')->group( function() {
    Route::resource('user', UserController::class)->only(['destroy']);
});


//Melindungi destroy, hanya untuk user yang ter authentikasi
Route::resource('resep', ResepController::class)->except(['destroy']);

Route::middleware('auth:sanctum')->group( function() {
    Route::resource('resep', ResepController::class)->only(['destroy']);
});

Route::get('resep/harga/{id}', [ResepController::class, 'getPriceById']);

Route::middleware('auth:sanctum')->group( function() {
    Route::resource('bahanbaku', BahanbakuController::class);    
});