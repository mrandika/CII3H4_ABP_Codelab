<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guest'], function() {
    Route::get('login', \App\Http\Livewire\Auth\LoginView::class)->name('auth.login');
    Route::get('register', \App\Http\Livewire\Auth\RegisterView::class)->name('auth.register');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('', \App\Http\Livewire\Pages\DashboardView::class)->name('home');
    Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

    Route::group(['prefix' => 'warehouse'], function() {
        Route::get('', \App\Http\Livewire\Pages\Warehouse\WarehouseView::class)->name('warehouse.index');
        Route::get('new', \App\Http\Livewire\Pages\Warehouse\CreateView::class)->name('warehouse.create');
        Route::get('show/{warehouse_id}', \App\Http\Livewire\Pages\Warehouse\ShowView::class)->name('warehouse.show');
        Route::get('edit/{warehouse_id}', \App\Http\Livewire\Pages\Warehouse\EditView::class)->name('warehouse.edit');
        Route::get('destroy/{warehouse_id}', \App\Http\Livewire\Pages\Warehouse\DestroyView::class)->name('warehouse.destroy');

        Route::get('ajax', function () {
            return view('warehouse');
        })->name('warehouse.ajax.index');
    });

    Route::group(['prefix' => 'brand'], function() {
        Route::get('', \App\Http\Livewire\Pages\Brand\BrandView::class)->name('brand.index');
        Route::get('new', \App\Http\Livewire\Pages\Brand\CreateView::class)->name('brand.create');
        Route::get('show/{brand_id}', \App\Http\Livewire\Pages\Brand\ShowView::class)->name('brand.show');
        Route::get('edit/{brand_id}', \App\Http\Livewire\Pages\Brand\EditView::class)->name('brand.edit');
        Route::get('destroy/{brand_id}', \App\Http\Livewire\Pages\Brand\DestroyView::class)->name('brand.destroy');
    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('', \App\Http\Livewire\Pages\Product\ProductView::class)->name('product.index');
        Route::get('new', \App\Http\Livewire\Pages\Product\CreateView::class)->name('product.create');
        Route::get('show/{product_id}', \App\Http\Livewire\Pages\Product\ShowView::class)->name('product.show');
        Route::get('edit/{product_id}', \App\Http\Livewire\Pages\Product\EditView::class)->name('product.edit');
        Route::get('destroy/{product_id}', \App\Http\Livewire\Pages\Product\DestroyView::class)->name('product.destroy');
    });

    Route::group(['prefix' => 'customer'], function() {
        Route::get('', \App\Http\Livewire\Pages\Customer\CustomerView::class)->name('customer.index');
        Route::get('new', \App\Http\Livewire\Pages\Customer\CreateView::class)->name('customer.create');
        Route::get('show/{customer_id}', \App\Http\Livewire\Pages\Customer\ShowView::class)->name('customer.show');
        Route::get('edit/{customer_id}', \App\Http\Livewire\Pages\Customer\EditView::class)->name('customer.edit');
        Route::get('destroy/{customer_id}', \App\Http\Livewire\Pages\Customer\DestroyView::class)->name('customer.destroy');
    });

    Route::get('sales', \App\Http\Livewire\Pages\Order\SalesView::class)->name('sales.index');

    Route::group(['prefix' => 'order'], function() {
        Route::get('order', \App\Http\Livewire\Pages\Order\OrderView::class)->name('order.index');
        Route::get('show/{order_id}', \App\Http\Livewire\Pages\Order\ShowView::class)->name('order.show');
    });
});
