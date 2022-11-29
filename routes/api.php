<?php

use App\Http\Controllers\Api\WarehouseController;
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

Route::group(['prefix' => 'v1'], function() {
    Route::post('login', [\App\Http\Controllers\Api\Auth\LoginController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('user', [\App\Http\Controllers\Api\Auth\AccountController::class, 'account']);

        Route::group(['prefix' => 'warehouse'], function() {
            Route::controller(WarehouseController::class)->group(function () {
                Route::get('', 'index')->name('api.warehouse.index');
                Route::post('store', 'store')->name('api.warehouse.store');
                Route::get('{id}', 'show')->name('api.warehouse.show');
                Route::put('update/{id}', 'update')->name('api.warehouse.update');
                Route::delete('destroy/{id}', 'destroy')->name('api.warehouse.destroy');
            });
        });
    });
});
