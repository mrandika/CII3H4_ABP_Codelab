<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Warehouse;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ProductView extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search_value = '';
    public $selected_product;
    public $warehouses, $brands;
    public $name, $stock, $price, $warehouse_id = '0', $brand_id = '0';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%'.$this->search_value.'%')->paginate(25);

        $this->warehouses = Warehouse::all();
        $this->brands = Brand::all();
        return view('livewire.pages.product.product-view', [
            'products' => $products
        ])
            ->extends('layouts.dashboard')
            ->section('main');
    }

    public function redirect_page(string $route_name, $param = null)
    {
        if (isset($param)) {
            return redirect()->route($route_name, $param);
        } else {
            return redirect()->route($route_name);
        }
    }

}
