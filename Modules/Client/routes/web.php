<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\App\Http\Controllers\AuthController;
use Modules\Client\App\Http\Controllers\CartController;
use Modules\Client\App\Http\Controllers\ClientController;
use Modules\Client\App\Http\Controllers\ShopController;
use Artesaos\SEOTools\Contracts\SEOTools;

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

Route::controller(ClientController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('search', 'search')->name('search');
    Route::post('shortingseach', 'shortingseach')->name('shortingseach');
    Route::post('searchprice', 'searchprice')->name('searchprice');
    route::get('seach/category/{id}/{keywd}','seachcategory')->name('seachcategory');
    route::get(('search/{keywd}'), 'searchget')->name('searchget');
   // Route::get('querybuilder')
});
Route::controller(ShopController::class)->prefix('shop')->as('shop.')->group(function () {
    Route::get('/', 'index')->name('shopIndex');
    Route::get('productDetail', 'show')->name('productDetail');
});
Route::controller(CartController::class)->prefix('cart')->as('cart.')->group(function () {
    Route::get('listCart', 'index')->name('list');
    Route::get('checkout', 'checkout')->name('checkout');
});
Route::prefix('other')->as('other.')->group(function () {
    Route::get('contact', function () {
        return view('client::contents.other-pages.contact-us');
    })->name('contactUs');
    Route::get('aboutUs', function () {
        return view('client::contents.other-pages.about-us');
    })->name('aboutUs');
});
Route::controller(AuthController::class)->prefix('auth')->as('auth.')->group(function () {
    Route::get('log-reg', 'form')->name('log-reg');
    Route::get('myAccount', 'myAccount')->name('myAcc');
});
