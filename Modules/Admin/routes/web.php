<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AccountController;
use Modules\Admin\App\Http\Controllers\AttributeController;
use Modules\Admin\App\Http\Controllers\CategoryController;
use Modules\Admin\App\Http\Controllers\OrderController;
use Modules\Admin\App\Http\Controllers\ProductController;
use Modules\Admin\App\Http\Controllers\CouponController;
use Modules\Admin\App\Http\Controllers\AdminController;
use Modules\Admin\App\Http\Controllers\StatisticalController;

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

Route::controller(AccountController::class)
->name('admin.account.')
->prefix('admin/account')
->group(function () {
   Route::get('list', 'index')->name('list');
});


Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin::contents.dashboard');
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
        Route::put('{id}update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
    //thống kê
    Route::controller(StatisticalController::class)->prefix('statistical')->as('statistical.')->group(function () {
        Route::get('listStatistical', 'index')->name('listStatistical');
        Route::get('statisticalOrder', 'order')->name('statisticalOrder');
        Route::get('saticticalRevenue', 'revenue')->name('saticticalRevenue');
        Route::get('saticticalSuccess', 'success')->name('saticticalSuccess');
        Route::get('export', 'export')->name('export');
    });
    //xuất danh excel
    //Route::get('/admin/report/export', [ReportController::class, 'export'])->name('admin.report.export');
});
