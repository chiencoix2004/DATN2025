<?php

use Illuminate\Support\Facades\Route;
use Modules\Wallet\App\Http\Controllers\WalletController;

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

Route::controller(WalletController::class)
->middleware("user")
->name("wallet.")
->prefix("wallet")
->group(function(){
    Route::get("/", [WalletController::class,"index"])->name("index");
    Route::get("topup", [WalletController::class,"topup"])->name("topup");
    Route::post("charge", [WalletController::class,"charge"])->name("charge");
});
