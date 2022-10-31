<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#productModal" wire:click="resetFields">
                    <span wire:ignore>
                        <i data-feather="plus"></i>
                    </span>
                    Add New
                </button>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="search_product" class="form-label">Search Product</label>
        <input type="text" class="form-control" id="search_product" placeholder="Product name" wire:model.debounce.500ms="search_value">
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Stock</th>
            <th scope="col">Price</th>
            <th scope="col">Warehouse</th>
            <th scope="col">Brand</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr data-bs-toggle="modal" data-bs-target="#showProductModal" wire:click="show('{{ $product->id }}')">
                <th scope="row">{{ $product->name }}</th>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->warehouse->name }}</td>
                <td>{{ $product->brand->name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No product available.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $products->links() }}

    @include('livewire.pages.product.create')
    @include('livewire.pages.product.show')

    <script>
        window.addEventListener('close-modal', event => {
            $('#productModal').modal('hide');
            $('#showProductModal').modal('hide');
        })
    </script>
</div>
