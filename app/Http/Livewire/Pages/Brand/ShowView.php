<?php

namespace App\Http\Livewire\Pages\Brand;

use App\Models\Brand;
use Livewire\Component;

class ShowView extends Component
{
    public $brand_id;

    public function mount($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function render()
    {
        $brand = Brand::findOrFail($this->brand_id);

        return view('livewire.pages.brand.show-view', ['brand' => $brand])
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
