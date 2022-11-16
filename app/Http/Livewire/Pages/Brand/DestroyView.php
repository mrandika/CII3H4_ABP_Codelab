<?php

namespace App\Http\Livewire\Pages\Brand;

use App\Models\Brand;
use Livewire\Component;

class DestroyView extends Component
{
    public $brand_id;

    public function mount($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function render()
    {
        $brand = Brand::findOrFail($this->brand_id);

        return view('livewire.pages.brand.destroy-view', ['brand' => $brand])
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
        $brand = Brand::findOrFail($this->brand_id);
        $brand->delete();

        $this->flash_message('info', "Brand named `$brand->name` is deleted.");
        $this->redirect_page('brand.index');
    }
}
