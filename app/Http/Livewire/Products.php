<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

use Jantinnerezo\LivewireAlert\LivewireAlert;

class Products extends Component
{
    use LivewireAlert;

    public $products, $selected_product;
    public $p_id, $name, $stock;

    public $mode = 'creating';

    protected $listeners = [
        'destroy',
        'resetFields'
    ];

    public function resetFields()
    {
        $this->p_id = '';
        $this->name = '';
        $this->stock = '';
    }

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }

    public function store()
    {
        $this->validate([
           'name' => 'required|min:3',
           'stock' => 'required|numeric'
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->stock = $this->stock;
        $product->save();

        $this->alert('success', 'Product created!');

        $this->resetFields();
    }

    public function show($id)
    {
        $this->mode = 'showing';
        $this->selected_product = Product::find($id);
    }

    public function edit($id)
    {
        $this->mode = 'editing';

        $product = Product::find($id);
        $this->p_id = $product->id;
        $this->name = $product->name;
        $this->stock = $product->stock;

        $this->updating = true;
    }

    public function cancel()
    {
        $this->mode = 'creating';
        $this->resetFields();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'stock' => 'required|numeric'
        ]);

        $product = Product::find($this->p_id);
        $product->name = $this->name;
        $product->stock = $this->stock;
        $product->save();

        $this->updating = false;

        $this->alert('success', 'Product updated!');

        $this->mode = 'creating';
        $this->resetFields();
    }

    public function delete($id)
    {
        $this->p_id = $id;

        $this->alert('warning', 'Are you sure to delete this item?', [
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
        Product::find($this->p_id)->delete();

        $this->alert('success', 'Product deleted!');
        $this->mode = 'creating';
    }
}
