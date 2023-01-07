<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VNPAYController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function () {
    Route::prefix('/customers')->group(function () {
        Route::get('/', [CustomerController::class, 'getCustomers']);
        Route::post('/{customer}', [CustomerController::class, 'store']);
    });

//    Route::group(['prefix' => 'checkout'], function () {
//        Route::post('/', [CheckoutApiController::class, 'createOrder']);
//    });

    Route::prefix('/payment')->group(function () {
        Route::group(["prefix" => "vnpay"], function () {
            Route::get('/return', [VNPAYController::class, 'returnVnpay']);
            Route::get('/ipn', [VNPAYController::class, 'ipn']);
        });
    });


});
