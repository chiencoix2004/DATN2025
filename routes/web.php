<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('client/index');
})->name('/');
Route::get('about', function () {
    return view('client/other/about_us');
})->name('about');
Route::get('contact', function () {
    return view('client/other/contact_us');
})->name('contact');
Route::get('blog', function () {
    return view('client/other/blog');
})->name('blog');
Route::get('show_cart', function () {
    return view('client/carts/show_cart');
})->name('show_cart');
Route::get('checkout', function () {
    return view('client/carts/checkout');
})->name('checkout');

Route::get('product_list', function () {
    return view('client/products/list_Product');
})->name('product_list');
Route::get('detail_product', function () {
    return view('client/products/detail_product');
})->name('detail_product');

Route::get('login_register', function () {
    return view('client/authentic/login_register');
})->name('login_register');

Route::get('my_account', function () {
    return view('client/authentic/my_account');
})->name('my_account');
