<?php

namespace App\Http\Livewire\Pages\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;

class EditView extends Component
{
    public $warehouse;
    public $warehouse_id;
    public $name, $address;

    public function mount($warehouse_id)
    {
        $this->warehouse_id = $warehouse_id;
    }

    public function render()
    {
        $this->warehouse = Warehouse::findOrFail($this->warehouse_id);

        return view('livewire.pages.warehouse.edit-view', ['warehouse' => $this->warehouse])
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
        $this->name = $this->warehouse->name;
        $this->address = $this->warehouse->address;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5',
            'address' => 'required'
        ]);

        $warehouse = Warehouse::findOrFail($this->warehouse_id);
        $warehouse->name = $this->name;
        $warehouse->address = $this->address;
        $warehouse->save();

        $this->redirect_page('warehouse.show', $warehouse->id);
    }
}
