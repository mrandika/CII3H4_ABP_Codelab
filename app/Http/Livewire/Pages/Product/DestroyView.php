<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Product;
use Livewire\Component;

class DestroyView extends Component
{
    public $product_id;

    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }

    public function render()
    {
        $product = Product::findOrFail($this->product_id);

        return view('livewire.pages.product.destroy-view', ['product' => $product])
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

    public function flash_message(string $key, string $value)
    {
        session()->flash($key, $value);
    }

    public function destroy()
    {
        $product = Product::findOrFail($this->product_id);
        $product->delete();

        $this->flash_message('info', "Product named `$product->name` is deleted.");
        $this->redirect_page('product.index');
    }
}
