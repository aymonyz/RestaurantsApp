<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\ItemController;

// لتعريف مسار POST لـ 'product-details'
Route::post('/product-details', [ItemController::class, 'methodName']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/cart', 'App\Http\Controllers\CartController@index');
Route::put('/product/{id}', 'App\Http\Controllers\ItemController@update')->name('update-product');
