<?php

namespace App\Http\Livewire\Pages\Brand;

use App\Models\Brand;
use Livewire\Component;

class CreateView extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.pages.brand.create-view')
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
            'name' => 'required|min:5'
        ]);

        $brand = new Brand();
        $brand->name = $this->name;
        $brand->save();

        $this->redirect_page('brand.show', $brand->id);
    }
}
