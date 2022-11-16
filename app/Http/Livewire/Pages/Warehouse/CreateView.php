<?php

namespace App\Http\Livewire\Pages\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;

class CreateView extends Component
{
    public $name, $address;

    public function render()
    {
        return view('livewire.pages.warehouse.create-view')
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
            'address' => 'required'
        ]);

        $warehouse = new Warehouse();
        $warehouse->name = $this->name;
        $warehouse->address = $this->address;
        $warehouse->save();

        $this->redirect_page('warehouse.show', $warehouse->id);
    }
}
