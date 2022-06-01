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

Route::get('/', [IndexController::class,'index'])->name('home');
Route::view('cart','cart');
Route::view('contact','contact');
Route::view('checkout','checkout');

Route::controller(ProductController::class)->group(function (){
    Route::get('shop','index')->name('shop');
    Route::get('product/detail/{product}','show');
    Route::get('addFav','storeFav')->name('add2Fav');
});


Route::post('signUp',[RegisterUserController::class,'register']);

Route::controller(LoginUserController::class)->group(function (){
    Route::post('login','login');
    Route::post('logout','destroy')->middleware('auth');
});

Route::controller(ContactUsController::class)->group(function (){
    Route::post('sendContact','contact')->name('sendContact');
    Route::post('createReview','storeReview')->name('storeReview');
});
Route::post('mailForUpdate',[MailForUpdateController::class,'storeMailForUpdate'])->name('4Update');


