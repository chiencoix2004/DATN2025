<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\AccountController;
use Modules\Admin\App\Http\Controllers\AttributeController;
use Modules\Admin\App\Http\Controllers\BannerController;
use Modules\Admin\App\Http\Controllers\CategoryController;
use Modules\Admin\App\Http\Controllers\InvoiceController;
use Modules\Admin\App\Http\Controllers\NotificationController;
use Modules\Admin\App\Http\Controllers\OrderController;
use Modules\Admin\App\Http\Controllers\PostController;
use Modules\Admin\App\Http\Controllers\ProductController;
use Modules\Admin\App\Http\Controllers\CouponController;
use Modules\Admin\App\Http\Controllers\AdminController;
use Modules\Admin\App\Http\Controllers\AuthenticateController;
use Modules\Admin\App\Http\Controllers\StatisticalController;
use Modules\Admin\App\Http\Controllers\SupportController;
use Modules\Admin\App\Http\Controllers\TagController;
use Modules\Admin\App\Http\Controllers\CommentController;
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
        Route::put('update', 'update')->name('update'); // Corrected Route::
        Route::get('delete/{id}', 'delete')->name('delete');
        Route::post('add', 'add')->name('add');
    });



Route::get('login', [AuthenticateController::class, 'showLoginForm'])->name('login');
Route::post('post-login', [AuthenticateController::class, 'PostLogin'])->name('loginAccount');
Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');


Route::prefix('admin')
    ->as('admin.')
    ->middleware('CheckAdmin')
    ->group(function () {
        Route::get('/', function () {
            return view('admin::contents.dashboard');
        })->name('dashboard');

    // Route quản lý categories
    Route::controller(CategoryController::class)->prefix('categories')->as('categories.')->group(function () {
        Route::get('list', 'listCategories')->name('list');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('/{id}/show', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('{id}/update', 'update')->name('update'); // Corrected Route::
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    // Route quản lý products
    Route::controller(ProductController::class)->prefix('product')->as('product.')->group(function () {
        Route::get('listProduct', 'listProduct')->name('list');
        Route::get('addProduct', 'showFormAdd')->name('addProduct');
        Route::post('createProduct', 'createProduct')->name('create');
        Route::get('edit/{slug}', 'showFormEdit')->name('edit');
        Route::put('update/{product}', 'updatePrd')->name('update');
        Route::get('{id}/delTag', 'delTag')->name('delTag');
        Route::get('{id}/delImg', 'delImg')->name('delImg');
        Route::delete('{product}/delete', 'destroy')->name('delP');
        Route::get('detail/{slug}', 'detail')->name('detailP');
        Route::get('{id}/delVariant', 'delete')->name('deleteVariant');
        // sản phẩm xóa mềm
        Route::get('listTrashed', 'trashed')->name('listTrashed');
        Route::get('restore-all', 'restoreAll')->name('restoreAll');
    });


        // Route quản lý comment
        Route::controller(CommentController::class)->prefix('comment')->as('comment.')->group(function () {
            Route::get('listComment', 'listComment')->name('listComment');
            Route::get('/{id}/editComment', 'editComment')->name('editComment');
            Route::put('{id}updateComment', 'updateComment')->name('updateComment');
            Route::post('bulk-action', 'bulkAction')->name('bulkAction');
        });


        // Route quản lý attributes
        Route::controller(AttributeController::class)->prefix('attributes')->as('attributes.')->group(function () {
            Route::get('list', 'listAttr')->name('listAttr');
            Route::post('add', 'addAttr')->name('addAttr');
            Route::get('{id}/delValueC', 'delValueC')->name('delValueC');
            Route::get('{id}/delValueS', 'delValueS')->name('delValueS');
            Route::get('{atrr}/edit', 'showFormEdit')->name('edit');
            Route::put('{atrr}/update', 'update')->name('update');
        });

        // Route quản lý tags
        Route::controller(TagController::class)->prefix('tags')->as('tags.')->group(function () {
            Route::get('listTags', 'index')->name('list');
            Route::post('createTag', 'store')->name('create');
            Route::get('delTag/{slug}', 'destroy')->name('delete');
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

        // Route quản lý coupons
        Route::controller(CouponController::class)->prefix('coupons')->as('coupons.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('/{id}/show', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('{id}/update', 'update')->name('update');
        });

        // thống kê
        Route::controller(StatisticalController::class)->prefix('statistical')->as('statistical.')->group(function () {
            Route::get('listStatistical', 'index')->name('listStatistical');
            Route::get('statisticalOrder', 'order')->name('statisticalOrder');
            Route::get('staticticalRevenue', 'revenue')->name('staticticalRevenue');
            Route::get('staticticalSuccess', 'success')->name('staticticalSuccess');
            Route::get('export', 'export')->name('export');
        });

  
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
        Route::controller(SupportController::class)
            ->prefix('tickets')
            ->as('ticket.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('/{id}/{user_id}/show', 'show')->name('show');
                Route::get('/{id}/spam', 'setSpam')->name('setSpam');
                Route::get('/{id}/close', 'setComplete')->name('setComplete');
                Route::post('reply', 'updatemessage')->name('updatemessage');
                Route::get('open', 'showOpen')->name('open');
                Route::get('close', 'showClose')->name('close');
                Route::get('spam', 'showSpam')->name('spam');
                Route::post('search', 'search')->name('search');
            });
           Route::controller(NotificationController::class)
        ->prefix('notifications')
        ->as('notifications.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/read', 'read')->name('read');
        });
    });
