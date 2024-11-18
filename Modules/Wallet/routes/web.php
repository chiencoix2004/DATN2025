<?php

use Illuminate\Support\Facades\Route;
use Modules\Wallet\App\Http\Controllers\EkycController;
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
->middleware(["user","userwallet"])
->name("wallet.")
->prefix("wallet")
->group(function(){
    Route::get("/", [WalletController::class,"index"])->name("index");
    Route::get("topup", [WalletController::class,"topup"])->name("topup");
    Route::post("charge", [WalletController::class,"charge"])->name("charge");
});

Route::controller(EkycController::class)
->middleware(["user"])
->name("ekyc.")
->prefix("wallet/ekyc")
->group(function(){
    Route::get("/", [EkycController::class,"index"])->name("index");
    Route::get("step1", [EkycController::class,"verifyadress"])->name("verifyadress");
    Route::post("step1update", [EkycController::class,"uploadadress"])->name("uploadadress");
    Route::get("step2", [EkycController::class,"verifykyc"])->name("verifykyc");
    Route::post("step2update", [EkycController::class,"uploadkyc"])->name("uploadkyc");
    Route::post("step2skip", [EkycController::class,"step2skip"])->name("step2skip");
    Route::get("step3", [EkycController::class,"verifytos"])->name("verifytos");
    Route::post("submit", [EkycController::class,"registerwallet"])->name("registerwallet");

});
