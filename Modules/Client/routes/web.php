<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\App\Http\Controllers\AuthController;
//use Modules\Client\App\Http\Controllers\AuthController;
use Modules\Client\App\Http\Controllers\CartController;
use Modules\Client\App\Http\Controllers\ShopController;
use Modules\Client\App\Http\Controllers\LoginController;
use Modules\Client\App\Http\Controllers\ClientController;
use Modules\Client\App\Http\Controllers\RegisterController;
use Modules\Client\App\Http\Controllers\VerificationController;
use Modules\Client\App\Http\Controllers\ResetPasswordController;
use Modules\Client\App\Http\Controllers\ForgotPasswordController;

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
    Route::get('contact', function () {
        return view('client::contents.other-pages.contact-us');
    })->name('contactUs');
    Route::get('aboutUs', function () {
        return view('client::contents.other-pages.about-us');
    })->name('aboutUs');
});
Route::controller(RegisterController::class)->prefix('auth')->as('auth.')->group(function () {
    Route::post('log-reg', 'register')->name('log-reg');
    Route::get('myAccount', 'myAccount')->name('myAcc');
});
Route::get('/showform', [AuthController::class, 'form'])->name('showForm');
Route::get('/email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route cho trang yêu cầu đặt lại mật khẩu
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email-password');

// Route cho trang đặt lại mật khẩu
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');