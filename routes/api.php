<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('addProduct',[ProductController::class,'addProduct']);
Route::get('list',[ProductController::class,'list']);
Route::delete('delete/{id}',[ProductController::class,'delete']);
Route::get('product/{id}',[ProductController::class,'getProduct']);
Route::put('updateproduct/{id}',[ProductController::class,'updateproduct']);
Route::get('search/{key}',[ProductController::class,'search']);