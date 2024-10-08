<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.contents.dashboard');
    })->name('dashboard');
    // Route quản lý categories
    Route::controller(CategoryController::class)->prefix('categories')->as('categories.')
        ->group(function () {
            Route::get('list', 'listCategories')->name('list');
            // Route::get('add', 'addCategory')->name('add');
        });
    // Route quản lý products
    Route::controller(ProductController::class)->prefix('product')->as('product.')->group(function () {
        Route::get('addProduct', 'showFormAdd')->name('addProduct');
        Route::get('listProduct', 'listProduct')->name('list');
    });
    // Route quản lý attributes
    Route::controller(AttributeController::class)->prefix('attributes')->as('attributes.')
        ->group(function () {
            Route::get('list', 'listAttr')->name('listAttr');
            Route::get('add', 'addAttr')->name('addAttr');
        });
    // Route quản lý orders
    Route::controller(OrderController::class)->prefix('orders')->as('orders.')->group(function () {
        Route::get('listOrders', 'listOrder')->name('list');
        Route::get('orderDetail', 'orderDetail')->name('detail');
        Route::get('orderTracking', 'orderTracking')->name('tracking');
    });
    // Route quản lý users
    Route::controller(AccountController::class)->prefix('account')->as('account.')->group(function(){
        Route::get('listAcc', 'listAccounts')->name('list');
    });
});
