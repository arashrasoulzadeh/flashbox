<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SellerMiddleware;
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


Route::prefix("auth")->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('profile', [AuthController::class, 'profile']);
});

Route::middleware(["auth:api"])->group(function () {

    Route::prefix("admin")->middleware([AdminMiddleware::class])->group(function () {
        Route::prefix("seller")->group(function () {
            Route::post('create', [UserController::class, 'createSeller']);
        });
    });

    Route::prefix("seller")->middleware([SellerMiddleware::class])->group(function () {
        Route::prefix("stores")->group(function () {
            Route::get('list', [StoreController::class, 'listStores']);
        });
    });
});
