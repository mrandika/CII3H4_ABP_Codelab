<div wire:ignore.self class="modal fade" id="showProductModal" tabindex="-1" aria-labelledby="showProductModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProductModalLabel">Data Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetFields"></button>
            </div>
            <div class="modal-body">
                @isset($selected_product)
                    <table class="table table-bordered">
                        <tr>
                            <th scope="col">Name</th>
                            <td>
                                <input class="form-control" type="text" wire:model="name" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Stock</th>
                            <td>
                                <input class="form-control" type="number" wire:model="stock" required>
                                @error('stock')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Price</th>
                            <td>
                                <input class="form-control" type="number" wire:model="price" required>
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Warehouse</th>
                            <td>
                                <select class="form-select" aria-label="Warehouse Selection" wire:model="warehouse_id" required>
                                    <option value="0" disabled>Select warehouse</option>
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                                @error('warehouse_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>

                        <tr>
                            <th scope="col">Brand</th>
                            <td>
                                <div>
                                    {{ $selected_product->brand->name }}
                                    <br>
                                    <span class="text-danger">You cannot change the product's brand.</span>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th scope="col">Created at</th>
                            <td>{{ $selected_product->created_at }}</td>
                        </tr>

                        <tr>
                            <th scope="col">Last updated at</th>
                            <td>{{ $selected_product->updated_at }}</td>
                        </tr>
                    </table>
                @endisset
            </div>

            <div class="modal-footer">
                <button wire:click.prevent="delete()" wire:loading.attr="disabled" class="btn btn-danger">
                    <span wire:ignore>
                        <i data-feather="trash"></i>
                    </span>
                    Delete
                </button>

                <button wire:click.prevent="update()" wire:loading.attr="disabled" class="btn btn-dark">
                    <span wire:ignore>
                        <i data-feather="save"></i>
                    </span>
                    Update
                </button>
            </div>
        </div>
    </div>
</div>
