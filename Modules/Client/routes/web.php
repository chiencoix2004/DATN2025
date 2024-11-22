<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\App\Http\Controllers\AuthController;
use Modules\Client\App\Http\Controllers\CartController;
use Modules\Client\App\Http\Controllers\PostController;
use Modules\Client\App\Http\Controllers\ShopController;
use Modules\Client\App\Http\Controllers\LoginController;
use Modules\Admin\App\Http\Controllers\InvoiceController;
use Modules\Client\App\Http\Controllers\ClientController;
use Modules\Client\App\Http\Controllers\RegisterController;
use Modules\Client\App\Http\Controllers\MyAccountController;
use Artesaos\SEOTools\Contracts\SEOTools;
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
    Route::get('product-detail/{slug}', 'show')->name('productDetail');
    Route::post('rend-variant', 'rendAjax')->name('rend_variant');
    Route::post('rend-product-variant', 'rendPrdV')->name('rendPrdV');
});
Route::controller(CartController::class)->prefix('cart')->as('cart.')->group(function () {
    Route::get('checkout', 'checkout')->name('checkout');
});
Route::prefix('other')->as('other.')->group(function () {
    Route::get('contact', function () {
        return view('client::contents.other-pages.contact-us');
    })->name('contactUs');
    Route::get('aboutUs', function () {
        return view('client::contents.other-pages.about-us');
    })->name('aboutUs');
  //Bài viết
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');      
    Route::get('/postDetail/{slug}', [PostController::class, 'show'])->name('postDetail');
    Route::post('search', [PostController::class, 'search'])->name('posts.search');
});    

Route::controller(RegisterController::class)->prefix('auth')->as('auth.')->group(function () {
    Route::post('log-reg', 'register')->name('log-reg');
    Route::get('myAccount', 'myAccount')->name('myAcc');
});
// route hiển thịn form đăng nhập, đăng ký
Route::get('/showform', [AuthController::class, 'form'])->name('showForm');
Route::get('/form-reg', [AuthController::class, 'form_reg'])->name('formReg');
Route::get('/email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/my-account', [MyAccountController::class, 'index'])->name(name: 'my-account');
Route::get('/get-orders', [MyAccountController::class, 'getOrders'])->name('orders.get.list');
Route::get('/get-order-details/{id}', [MyAccountController::class, 'getOrderDetails'])->name('order.details');
Route::get('/orders/{id}/download-pdf', [MyAccountController::class, 'downloadPDF'])->name('orders.downloadPDF');
Route::post('/orders/{id}/cancel', [MyAccountController::class, 'cancelOrder'])->name('orders.cancel');
Route::post('/orders/{id}/reset', [MyAccountController::class, 'resetOrder'])->name('orders.reset');
Route::post('/orders/{id}/received', [MyAccountController::class, 'markAsReceived'])->name('orders.received');
Route::post('/update-password', [MyAccountController::class, 'changePassword'])->name('change.password');

// Route cho trang yêu cầu đặt lại mật khẩu
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email-password');

// Route cho trang đặt lại mật khẩu
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// đăng nhập với google
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

//giỏ hàng
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/list', [CartController::class, 'list'])->name('cart.list');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
Route::get('/cart/checkout', [CartController::class, 'order'])->name('cart.checkout');
Route::post('/cart/remove-discount-code', [CartController::class, 'removeDiscountCode'])->name('cart.removeDiscountCode');

