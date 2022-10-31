<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Warehouse;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ProductView extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $search_value = '';
    public $selected_product;
    public $warehouses, $brands;
    public $name, $stock, $price, $warehouse_id = '0', $brand_id = '0';

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
        $products = Product::where('name', 'like', '%'.$this->search_value.'%')->paginate(25);

        $this->warehouses = Warehouse::all();
        $this->brands = Brand::all();
        return view('livewire.pages.product.product-view', [
            'products' => $products
        ]);
    }


    public function resetFields()
    {
        $this->name = '';
        $this->stock = '';
        $this->price = '';
        $this->warehouse_id = '0';
        $this->brand_id = '0';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'warehouse_id' => 'required',
            'brand_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->stock = $this->stock;
        $product->price = $this->price;
        $product->warehouse_id = $this->warehouse_id;
        $product->brand_id = $this->brand_id;
        $product->save();

        $this->alert('success', 'Product created!');

        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function show($id)
    {
        $this->selected_product = Product::findOrFail($id);
        $this->name = $this->selected_product->name;
        $this->stock = $this->selected_product->stock;
        $this->price = $this->selected_product->price;
        $this->warehouse_id = $this->selected_product->warehouse_id;
        $this->brand_id = $this->selected_product->brand_id;

        $this->selected_product->refresh();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:5',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'warehouse_id' => 'required',
            'brand_id' => 'required',
        ]);

        $product = Product::findOrFail($this->selected_product->id);
        $product->name = $this->name;
        $product->stock = $this->stock;
        $product->price = $this->price;
        $product->warehouse_id = $this->warehouse_id;
        $product->brand_id = $this->brand_id;
        $product->save();

        $this->alert('success', 'Brand updated!');

        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete()
    {
        $this->alert('warning', 'Are you sure to delete this product?', [
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
        Product::findOrFail($this->selected_product->id)->delete();

        $this->selected_product = null;
        $this->alert('success', 'Product deleted!');
        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
    }
}
