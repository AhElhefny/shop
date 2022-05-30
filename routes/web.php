<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\MailForUpdateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ShopController;
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

Route::get('/', [IndexController::class,'index']);
Route::view('cart','cart');
Route::view('contact','contact');
Route::view('checkout','checkout');

Route::get('shop',[ShopController::class,'index']);
Route::get('product/detail/{product}',[ProductController::class,'show']);

Route::post('signUp',[RegisterUserController::class,'register']);
Route::post('login',[LoginUserController::class,'login']);
Route::post('logout',[LoginUserController::class,'destroy'])->middleware('auth');

Route::post('mailForUpdate',[MailForUpdateController::class,'storeMailForUpdate'])->name('4Update');
Route::post('sendContact',[ContactUsController::class,'contact'])->name('sendContact');
Route::post('createReview',[ContactUsController::class,'storeReview'])->name('storeReview');
