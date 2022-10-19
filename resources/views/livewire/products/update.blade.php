<div>
    <h3>Update Product</h3>

    <form class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="p_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="p_name" aria-describedby="p_name_help" name="name" wire:model="name" required>
            <div id="p_name_help" class="form-text">Required, min: 3 character</div>

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="p_stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="p_stock" aria-describedby="p_stock_help" name="stock" wire:model="stock">
            <div id="p_stock_help" class="form-text">Required, number</div>

            @error('stock')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
        <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    </form>
</div>
