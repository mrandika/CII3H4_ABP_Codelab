<?php

namespace App\Http\Livewire\Pages\Brand;

use App\Models\Brand;
use Livewire\Component;

class EditView extends Component
{
    public $brand;
    public $name;
    public $brand_id;

    public function mount($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function render()
    {
        $this->brand = Brand::findOrFail($this->brand_id);

        return view('livewire.pages.brand.edit-view', ['brand' => $this->brand])
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
        $this->name = $this->brand->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5'
        ]);

        $brand = Brand::findOrFail($this->brand_id);
        $brand->name = $this->name;
        $brand->save();

        $this->redirect_page('brand.show', $brand->id);
    }
}
