<?php

namespace App\Http\Livewire\Pages\Customer;

use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CustomerView extends Component
{
    public $search_value = '';

    public function render()
    {
        $customers = Customer::where('name', 'like', '%'.$this->search_value.'%')->paginate(25);

        return view('livewire.pages.customer.customer-view', ['customers' => $customers])
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
