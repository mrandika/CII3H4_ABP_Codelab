<div wire:ignore.self class="modal fade" id="showBrandModal" tabindex="-1" aria-labelledby="showBrandModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showBrandModalLabel">Data Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetFields"></button>
            </div>
            <div class="modal-body">
                @isset($selected_brand)
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
                            <th scope="col">Num. Of Spreaded Warehouse</th>
                            <td>{{ $selected_brand->warehouses->count() }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Num. Of Products</th>
                            <td>{{ $selected_brand->products->count() }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Created at</th>
                            <td>{{ $selected_brand->created_at }}</td>
                        </tr>

                        <tr>
                            <th scope="col">Last updated at</th>
                            <td>{{ $selected_brand->updated_at }}</td>
                        </tr>
                    </table>

                    <h5>Products</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Brand</th>
                            <th scope="col">Warehouse</th>
                            <th scope="col">Name</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($selected_brand->products as $product)
                            <tr>
                                <th scope="row">{{ $product->brand->name }}</th>
                                <td>{{ $product->warehouse->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No product available in this brand.</td>
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
