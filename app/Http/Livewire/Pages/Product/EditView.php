<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Product;
use App\Models\Warehouse;
use Livewire\Component;

class EditView extends Component
{
    public $product;
    public $product_id;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function render()
    {
        $warehouses = Warehouse::all();
        $this->product = Product::findOrFail($this->product_id);

        return view('livewire.pages.product.edit-view',  ['product' => $this->product, 'warehouses' => $warehouses])
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

    public function edit()
    {
        $this->name = $this->product->name;
        $this->stock = $this->product->stock;
        $this->price = $this->product->price;
        $this->warehouse_id = $this->product->warehouse_id;
        $this->brand_id = $this->product->brand_id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'warehouse_id' => 'required',
            'brand_id' => 'required',
        ]);

        $product = Product::findOrFail($this->product_id);
        $product->name = $this->name;
        $product->stock = $this->stock;
        $product->price = $this->price;
        $product->warehouse_id = $this->warehouse_id;
        $product->brand_id = $this->brand_id;
        $product->save();

        $this->redirect_page('product.show', $product->id);
    }
}
