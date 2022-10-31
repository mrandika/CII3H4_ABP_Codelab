<?php

namespace App\Http\Livewire\Pages\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class WarehouseView extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search_value = '';
    public $selected_warehouse;
    public $name, $address;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'destroy',
        'resetFields'
    ];

    public function render()
    {
        $warehouses = Warehouse::where('name', 'like', '%'.$this->search_value.'%')->paginate(25);

        return view('livewire.pages.warehouse.warehouse-view', [
            'warehouses' => $warehouses
        ]);
    }

    public function resetFields()
    {
        $this->name = '';
        $this->address = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'address' => 'required'
        ]);

        $warehouse = new Warehouse();
        $warehouse->name = $this->name;
        $warehouse->address = $this->address;
        $warehouse->save();

        $this->alert('success', 'Warehouse created!');

        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function show($id)
    {
        $this->selected_warehouse = Warehouse::findOrFail($id);
        $this->name = $this->selected_warehouse->name;
        $this->address = $this->selected_warehouse->address;

        $this->selected_warehouse->refresh();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5',
            'address' => 'required'
        ]);

        $warehouse = Warehouse::findOrFail($this->selected_warehouse->id);
        $warehouse->name = $this->name;
        $warehouse->address = $this->address;
        $warehouse->save();

        $this->alert('success', 'Warehouse updated!');

        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete()
    {
        $this->alert('warning', 'Are you sure to delete this warehouse?', [
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
        Warehouse::findOrFail($this->selected_warehouse->id)->delete();

        $this->selected_warehouse = null;
        $this->alert('success', 'Warehouse deleted!');
        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }
}
