<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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


Route::get('/',[TestController::class,'welcome'])->name('index.home');

Route::post('/store',[TestController::class,'store'])->name('store_info');
Route::post('/search_cat',[TestController::class,'search_cat'])->name('search_cat');
Route::post('/validasi',[TestController::class,'validasi'])->name('validasi');
