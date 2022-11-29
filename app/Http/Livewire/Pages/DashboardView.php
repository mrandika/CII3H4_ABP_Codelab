<?php

namespace App\Http\Livewire\Pages;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Warehouse;
use Livewire\Component;

class DashboardView extends Component
{
    public function render()
    {
        return view('livewire.pages.dashboard-view', [
            'warehouse_count' => Warehouse::count(),
            'brand_count' => Brand::count(),
            'product_count' => Product::count(),
            'order_count' => Order::count()
        ])
            ->extends('layouts.dashboard')
            ->section('main');
    }
}
