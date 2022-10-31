<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Warehouse</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#warehouseModal">
                    <span wire:ignore>
                        <i data-feather="plus"></i>
                    </span>
                    Add New
                </button>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="search_warehouse" class="form-label">Search Warehouse</label>
        <input type="text" class="form-control" id="search_warehouse" placeholder="Warehouse name" wire:model.debounce.500ms="search_value">
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Num. of Products</th>
        </tr>
        </thead>
        <tbody>
        @forelse($warehouses as $warehouse)
            <tr data-bs-toggle="modal" data-bs-target="#showWarehouseModal" wire:click="show('{{ $warehouse->id }}')">
                <th scope="row">{{ $warehouse->name }}</th>
                <td>{{ $warehouse->address }}</td>
                <td>{{ $warehouse->products->count() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No warehouse available.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $warehouses->links() }}

    @include('livewire.pages.warehouse.create')
    @include('livewire.pages.warehouse.show')

    <script>
        window.addEventListener('close-modal', event => {
            $('#warehouseModal').modal('hide');
            $('#showWarehouseModal').modal('hide');
        })
    </script>
</div>
