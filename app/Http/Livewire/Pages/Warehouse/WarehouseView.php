<?php

namespace App\Http\Livewire\Pages\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class WarehouseView extends Component
{
    use WithPagination;

    public $search_value = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $warehouses = Warehouse::where('name', 'like', '%'.$this->search_value.'%')->paginate(25);

        return view('livewire.pages.warehouse.warehouse-view', [
            'warehouses' => $warehouses
        ])
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
