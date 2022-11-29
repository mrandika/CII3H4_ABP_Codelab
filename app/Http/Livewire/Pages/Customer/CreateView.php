<?php

namespace App\Http\Livewire\Pages\Customer;

use App\Models\Customer;
use Livewire\Component;

class CreateView extends Component
{
    public $name, $address, $phone_number;

    public function render()
    {
        return view('livewire.pages.customer.create-view')
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
            'address' => 'required',
            'phone_number' => 'required|min:8|max:15'
        ]);

        $customer = new Customer();
        $customer->name = $this->name;
        $customer->address = $this->address;
        $customer->phone_number = $this->phone_number;
        $customer->save();

        $this->redirect_page('customer.show', $customer->id);
    }
}
