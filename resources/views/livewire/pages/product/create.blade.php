<div wire:ignore.self class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetFields"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name_help" name="name" wire:model="name" required>
                        <div id="name_help" class="form-text">Required, min: 5 character</div>

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" aria-describedby="stock_help" name="stock" wire:model="stock" required>
                        <div id="stock_help" class="form-text">Required, numeric</div>

                        @error('stock')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" aria-describedby="price_help" name="price" wire:model="price" required>
                        <div id="price_help" class="form-text">Required, numeric</div>

                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Warehouse</label>
                        <select class="form-select" aria-label="Warehouse Selection" wire:model="warehouse_id" required>
                            <option value="0" disabled>Select warehouse</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                        <div id="warehouse_help" class="form-text">Required</div>

                        @error('warehouse_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Brand</label>
                        <select class="form-select" aria-label="Brand Selection" wire:model="brand_id" required>
                            <option value="0" disabled>Select brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <div id="brand_help" class="form-text">Required</div>

                        @error('brand_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="store()" wire:loading.attr="disabled" class="btn btn-primary">
                    <span wire:ignore>
                        <i data-feather="save"></i>
                    </span>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
