<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
   return 'Hello World';
});

Route::controller(ProductController::class)->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('', 'index')->name('products.index');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
    });
});
