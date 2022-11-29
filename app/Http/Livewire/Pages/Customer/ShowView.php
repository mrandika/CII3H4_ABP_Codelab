<?php

namespace App\Http\Livewire\Pages\Customer;

use App\Models\Customer;
use Livewire\Component;

class ShowView extends Component
{
    public $customer_id;

    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    public function render()
    {
        $customer = Customer::findOrFail($this->customer_id);

        return view('livewire.pages.customer.show-view', ['customer' => $customer])
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
