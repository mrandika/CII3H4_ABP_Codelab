<?php

namespace App\Http\Livewire\Pages\Customer;

use App\Models\Customer;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CustomerView extends Component
{
    use LivewireAlert;

    public $customers, $selected_customer;
    public $name, $address, $phone_number;

    protected $listeners = [
        'destroy',
        'resetFields'
    ];

    public function render()
    {
        $this->customers = Customer::all();
        return view('livewire.pages.customer.customer-view');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->address = '';
        $this->phone_number = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'address' => 'required',
            'phone_number' => 'required|min:9'
        ]);

        $customer = new Customer();
        $customer->name = $this->name;
        $customer->address = $this->address;
        $customer->phone_number = $this->phone_number;
        $customer->save();

        $this->alert('success', 'Customer created!');

        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function show($id)
    {
        $this->selected_customer = Customer::findOrFail($id);
        $this->name = $this->selected_customer->name;
        $this->address = $this->selected_customer->address;
        $this->phone_number = $this->selected_customer->phone_number;

        $this->selected_customer->refresh();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5',
            'address' => 'required',
            'phone_number' => 'required|min:9'
        ]);

        $customer = Customer::findOrFail($this->selected_customer->id);
        $customer->name = $this->name;
        $customer->address = $this->address;
        $customer->phone_number = $this->phone_number;
        $customer->save();

        $this->alert('success', 'Customer updated!');

        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete()
    {
        $this->alert('warning', 'Are you sure to delete this customer?', [
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'onConfirmed' => 'destroy',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'onDenied' => 'resetFields',
            'timer' => null
        ]);
    }

    public function destroy()
    {
        Customer::findOrFail($this->selected_customer->id)->delete();

        $this->selected_customer = null;
        $this->alert('success', 'Customer deleted!');
        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }
}
