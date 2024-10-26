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
use Modules\Admin\App\Http\Controllers\AuthenticateController;
use Modules\Admin\App\Http\Controllers\CommentController;
use Modules\Admin\App\Http\Controllers\UserController;



Route::controller(BannerController::class)
    ->name('admin.banner.')
    ->prefix('admin/banner')
    ->group(function () {
        Route::get('list', 'index')->name('list');
        route::put('update', 'update')->name('update');
        route::get('delete/{id}', 'delete')->name('delete');
        route::post('add', 'add')->name('add');
    });


    Route::get('login', [AuthenticateController::class, 'showLoginForm'])->name('login');
    Route::post('post-login', [AuthenticateController::class, 'PostLogin'])->name('loginAccount');

    // Route::post('PostLogin', [AuthenticateController::class, 'PostLogin'])->name('PostLogin');
    // Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');
    

Route::prefix('admin')
->as('admin.')
// ->middleware('checkAdmin')
->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin::contents.dashboard');
    // });
    // dashboard
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

    // Route quản lý comment
    Route::controller(CommentController::class)->prefix('comment')->as('comment.')->group(function () {
        Route::get('listComment', 'listComment')->name('listComment');
        Route::get('/{id}/editComment', 'editComment')->name('editComment');
        Route::put('{id}updateComment', 'updateComment')->name('updateComment');
        Route::post('bulk-action', 'bulkAction')->name('bulkAction');
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

    // Route quản lý coupons
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

    // Route quản lý tài khoản
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

    // Route quản lý tài khoản khách hàng
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

        // Route quản lý posts
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
