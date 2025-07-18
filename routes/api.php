<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\Article\IndexController;
use App\Http\Controllers\Api\Article\StoreController;
use App\Http\Controllers\Api\Article\UpdateController;
use App\Http\Controllers\Api\Article\DestroyController;
use App\Http\Controllers\Api\Article\ShowController;
use App\Http\Middleware\AdminMiddleware;


Route::post('register', [AuthController::class, 'register']); // only for users
Route::post('login', [AuthController::class, 'login']);       // users or admins depending on `guard`

Route::middleware('auth:sanctum')->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('profile', [AuthController::class, 'profile']);


    Route::prefix('articles')->group(function () {

        Route::get('', IndexController::class);            // همه مقالات
        Route::get('{id}', ShowController::class);         // نمایش مقاله

        Route::middleware(AdminMiddleware::class)->group(function () {
            Route::post('', StoreController::class);         // افزودن
            Route::put('{id}', UpdateController::class);     // ویرایش
            Route::delete('{id}', DestroyController::class); // حذف
        });
    });
});
