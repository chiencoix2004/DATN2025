<?php

use Illuminate\Support\Facades\Route;
use Modules\User\App\Http\Controllers\UserController;

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
    return view('user::index');
})->name('/');
Route::get('about', function () {
    return view('user::other.about_us');
})->name('about');
Route::get('contact', function () {
    return view('user::other.contact_us');
})->name('contact');
Route::get('blog', function () {
    return view('user::other.blog');
})->name('blog');
Route::get('show_cart', function () {
    return view('user::carts.show_cart');
})->name('show_cart');
Route::get('checkout', function () {
    return view('user::carts.checkout');
})->name('checkout');

Route::get('product_list', function () {
    return view('user::products.list_Product');
})->name('product_list');
Route::get('detail_product', function () {
    return view('user::products.detail_product');
})->name('detail_product');

Route::get('login_register', function () {
    return view('user::authentic.login_register');
})->name('login_register');

Route::get('my_account', function () {
    return view('user::authentic.my_account');
})->name('my_account');
