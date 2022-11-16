<?php

namespace App\Http\Livewire\Pages\Brand;

use App\Models\Brand;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class BrandView extends Component
{
    use WithPagination;

    public $search_value = '';
    public $name;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $brands = Brand::where('name', 'like', '%'.$this->search_value.'%')->paginate(25);

        return view('livewire.pages.brand.brand-view', [
            'brands' => $brands
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
