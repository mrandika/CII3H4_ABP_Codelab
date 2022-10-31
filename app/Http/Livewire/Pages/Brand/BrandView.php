<?php

namespace App\Http\Livewire\Pages\Brand;

use App\Models\Brand;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class BrandView extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search_value = '';
    public $selected_brand;
    public $name;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'destroy',
        'resetFields'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $brands = Brand::where('name', 'like', '%'.$this->search_value.'%')->paginate(25);
        return view('livewire.pages.brand.brand-view', [
            'brands' => $brands
        ]);
    }

    public function resetFields()
    {
        $this->name = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5'
        ]);

        $brand = new Brand();
        $brand->name = $this->name;
        $brand->save();

        $this->alert('success', 'Brand created!');

        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function show($id)
    {
        $this->selected_brand = Brand::findOrFail($id);
        $this->name = $this->selected_brand->name;

        $this->selected_brand->refresh();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5'
        ]);

        $brand = Brand::findOrFail($this->selected_brand->id);
        $brand->name = $this->name;
        $brand->save();

        $this->alert('success', 'Brand updated!');

        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete()
    {
        $this->alert('warning', 'Are you sure to delete this brand?', [
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
        Brand::findOrFail($this->selected_brand->id)->delete();

        $this->selected_brand = null;
        $this->alert('success', 'Brand deleted!');
        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }
}
