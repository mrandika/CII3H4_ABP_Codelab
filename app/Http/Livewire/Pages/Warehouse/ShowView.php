<?php

namespace App\Http\Livewire\Pages\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;

class ShowView extends Component
{
    public $warehouse_id;

    public function mount($warehouse_id)
    {
        $this->warehouse_id = $warehouse_id;
    }

    public function render()
    {
        $warehouse = Warehouse::findOrFail($this->warehouse_id);

        return view('livewire.pages.warehouse.show-view', ['warehouse' => $warehouse])
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
