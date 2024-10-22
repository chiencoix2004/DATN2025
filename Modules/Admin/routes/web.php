<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AccountController;
use Modules\Admin\App\Http\Controllers\AttributeController;
use Modules\Admin\App\Http\Controllers\BannerController;
use Modules\Admin\App\Http\Controllers\CategoryController;
use Modules\Admin\App\Http\Controllers\InvoiceController;
use Modules\Admin\App\Http\Controllers\OrderController;
use Modules\Admin\App\Http\Controllers\PostController;
use Modules\Admin\App\Http\Controllers\ProductController;
use Modules\Admin\App\Http\Controllers\CouponController;
use Modules\Admin\App\Http\Controllers\AdminController;
use Modules\Admin\App\Http\Controllers\UserController;

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


// Route::group([], function () {
//     Route::resource('admin', AdminController::class)->names('admin');
// });

Route::controller(BannerController::class)
    ->name('admin.banner.')
    ->prefix('admin/banner')
    ->group(function () {
        Route::get('list', 'index')->name('list');
        route::put('update', 'update')->name('update');
        route::get('delete/{id}', 'delete')->name('delete');
        route::post('add', 'add')->name('add');
    });


Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin::contents.dashboard');
    })->name('dashboard');
    // Route quản lý categories
    Route::controller(CategoryController::class)->prefix('categories')->as('categories.')
        ->group(function () {
            Route::get('list', 'listCategories')->name('list');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/{id}/show', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('{id}update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
    // Route quản lý products
    Route::controller(ProductController::class)->prefix('product')->as('product.')->group(function () {
        Route::get('addProduct', 'showFormAdd')->name('addProduct');
        Route::get('listProduct', 'listProduct')->name('list');
        Route::post('createProduct', 'createProduct')->name('create');
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
        Route::get('{order}/orderDetail', 'orderDetail')->name('detail');
        Route::put('{order}/update', 'orderUpdate')->name('update');
    });
    // Route quản lý in hóa đơn
    Route::controller(InvoiceController::class)->prefix('invoice')->as('invoice.')->group(function () {
        Route::get('{order}/savePDF', 'savePDF')->name('save');
        Route::get('list', 'listPDF')->name('list');
        Route::post('bulkActions', 'bulkActions')->name('bulkActions');
    });
    // Route quản lý users
    // Route::controller(AccountController::class)->prefix('account')->as('account.')->group(function(){
    //     Route::get('listAcc', 'listAccounts')->name('list');
    // });
    Route::controller(CouponController::class)
        ->prefix('coupons')
        ->as('coupons.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/{id}/show', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('{id}/update', 'update')->name('update');
            // Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });


    Route::controller(AccountController::class)
        ->prefix('accounts')
        ->as('accounts.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/{id}/show', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('{id}/update', 'update')->name('update');
            // Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
    Route::controller(UserController::class)
        ->prefix('users')
        ->as('users.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            // Route::get('create', 'create')->name('create');
            // Route::post('store', 'store')->name('store');
            Route::get('/{id}/show', 'show')->name('show');
            Route::put('{id}/updateStatus', 'updateStatus')->name('updateStatus');
            // Route::get('/{id}/edit', 'edit')->name('edit');
            // Route::put('{id}/update', 'update')->name('update');
            // Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });

    Route::controller(PostController::class)->prefix('posts')->as('posts.')
        ->group(function () {
            Route::get('list', 'listPost')->name('list');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/{id}/show', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('{id}update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
});
