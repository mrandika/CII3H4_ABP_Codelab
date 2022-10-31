<div wire:ignore.self class="modal fade" id="showWarehouseModal" tabindex="-1" aria-labelledby="warehouseModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showWarehouseModalLabel">Data Warehouse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetFields"></button>
            </div>
            <div class="modal-body">
                @isset($selected_warehouse)
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
                            <th scope="col">Address</th>
                            <td>
                                <textarea class="form-control" id="address" rows="3" wire:model="address" required></textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Num. Of Products</th>
                            <td>{{ $selected_warehouse->products->count() }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Created at</th>
                            <td>{{ $selected_warehouse->created_at }}</td>
                        </tr>

                        <tr>
                            <th scope="col">Last updated at</th>
                            <td>{{ $selected_warehouse->updated_at }}</td>
                        </tr>
                    </table>

                    <h5>Products</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Brand</th>
                            <th scope="col">Name</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($selected_warehouse->products as $product)
                            <tr>
                                <th scope="row">{{ $product->brand->name }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No product available in this warehouse.</td>
                            </tr>
                        @endforelse
                        </tbody>
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
