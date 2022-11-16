<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Warehouse;
use Livewire\Component;

class CreateView extends Component
{
    public $name, $stock, $price, $warehouse_id, $brand_id;

    public function render()
    {
        $warehouses = Warehouse::all();
        $brands = Brand::all();

        return view('livewire.pages.product.create-view', ['warehouses' => $warehouses, 'brands' => $brands])
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

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'warehouse_id' => 'required',
            'brand_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->stock = $this->stock;
        $product->price = $this->price;
        $product->warehouse_id = $this->warehouse_id;
        $product->brand_id = $this->brand_id;
        $product->save();

        $this->redirect_page('product.show', $product->id);
    }
}
