<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\App\Http\Controllers\AuthController;
use Modules\Client\App\Http\Controllers\CartController;
use Modules\Client\App\Http\Controllers\ClientController;
<<<<<<< Updated upstream
use Modules\Client\App\Http\Controllers\ShopController;
=======
use Modules\Client\App\Http\Controllers\RegisterController;
use Modules\Client\App\Http\Controllers\MyAccountController;
use Artesaos\SEOTools\Contracts\SEOTools;
use Modules\Client\App\Http\Controllers\AboutController;
use Modules\Client\App\Http\Controllers\ConstactController;
use Modules\Client\App\Http\Controllers\ContactController;
use Modules\Client\App\Http\Controllers\VerificationController;
use Modules\Client\App\Http\Controllers\ResetPasswordController;
use Modules\Client\App\Http\Controllers\ForgotPasswordController;
use Modules\Client\App\Http\Controllers\ReviewController;


>>>>>>> Stashed changes

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
    return view('client::index');
})->name('home');
Route::controller(ShopController::class)->prefix('shop')->as('shop.')->group(function () {
    Route::get('/', 'index')->name('shopIndex');
    Route::get('productDetail', 'show')->name('productDetail');
});
Route::controller(CartController::class)->prefix('cart')->as('cart.')->group(function () {
    Route::get('listCart', 'index')->name('list');
    Route::get('checkout', 'checkout')->name('checkout');
});
Route::prefix('other')->as('other.')->group(function () {
<<<<<<< Updated upstream
    Route::get('contact', function () {
        return view('client::contents.other-pages.contact-us');
    })->name('contactUs');
    Route::get('aboutUs', function () {
        return view('client::contents.other-pages.about-us');
    })->name('aboutUs');
=======
    Route::get('contact', [ContactController::class, 'contact'])->name('contactUs');
    Route::post('contact', [ContactController::class, 'store'])->name('contactUs.store');
    Route::get('aboutUs', [AboutController::class, 'index'])->name('aboutUs');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/postDetail/{slug}', [PostController::class, 'show'])->name('postDetail');
    Route::post('search', [PostController::class, 'search'])->name('posts.search');
>>>>>>> Stashed changes
});
Route::controller(AuthController::class)->prefix('auth')->as('auth.')->group(function () {
    Route::get('log-reg', 'form')->name('log-reg');
    Route::get('myAccount', 'myAccount')->name('myAcc');
});