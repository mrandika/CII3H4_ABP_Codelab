<?php

namespace App\Http\Livewire\Pages\Customer;

use App\Models\Customer;
use Livewire\Component;

class DestroyView extends Component
{
    public $customer_id;

    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    public function render()
    {
        $customer = Customer::findOrFail($this->customer_id);

        return view('livewire.pages.customer.destroy-view', ['customer' => $customer])
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

    public function flash_message(string $key, string $value)
    {
        session()->flash($key, $value);
    }

    public function destroy()
    {
        $customer = Customer::findOrFail($this->customer_id);
        $customer->delete();

        $this->flash_message('info', "Customer named `$customer->name` is deleted.");
        $this->redirect_page('customer.index');
    }
}
