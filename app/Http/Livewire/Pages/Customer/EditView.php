<?php

namespace App\Http\Livewire\Pages\Customer;

use App\Models\Customer;
use Livewire\Component;

class EditView extends Component
{
    public $customer, $customer_id;
    public $name, $address, $phone_number;

    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    public function render()
    {
        $this->customer = Customer::find($this->customer_id);

        return view('livewire.pages.customer.edit-view')
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
        $this->name = $this->customer->name;
        $this->address = $this->customer->address;
        $this->phone_number = $this->customer->phone_number;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5',
            'address' => 'required',
            'phone_number' => 'required|min:9'
        ]);

        $customer = Customer::findOrFail($this->customer_id);
        $customer->name = $this->name;
        $customer->address = $this->address;
        $customer->phone_number = $this->phone_number;
        $customer->save();

        $this->redirect_page('customer.show', $customer->id);
    }
}
