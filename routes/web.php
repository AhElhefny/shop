<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\MailForUpdateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserCartController;
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

Route::get('/', [IndexController::class,'index'])->name('home');

Route::controller(ProductController::class)->group(function (){
    Route::get('shop','index')->name('shop');
    Route::get('product/detail/{product}','show');
    Route::post('addFav','storeFav')->name('add2Fav')->middleware('auth');

});

Route::controller(LoginUserController::class)->group(function (){
    Route::post('login','login');
    Route::post('logout','destroy')->middleware('auth');
});

Route::controller(ContactUsController::class)->group(function (){
    Route::get('contact','index');
    Route::post('sendContact','contact')->name('sendContact');
    Route::post('createReview','storeReview')->name('storeReview')->middleware('auth');
});

Route::post('mailForUpdate',[MailForUpdateController::class,'storeMailForUpdate'])->name('4Update');

Route::post('signUp',[RegisterUserController::class,'register']);

Route::view('cart','cart')->middleware('auth');
Route::post('add2Cart',[UserCartController::class,'addToCart'])->name('add2Cart')->middleware('auth');
Route::delete('deleteCart',[UserCartController::class,'destroy'])->name('deleteCart')->middleware('auth');
Route::get('getColors',[UserCartController::class,'getColors'])->name('getColors')->middleware('auth');

Route::view('checkout','checkout')->middleware('auth');
