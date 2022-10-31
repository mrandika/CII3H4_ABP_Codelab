<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Brand</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#brandModal">
                    <span wire:ignore>
                        <i data-feather="plus"></i>
                    </span>
                    Add New
                </button>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="search_brand" class="form-label">Search Brand</label>
        <input type="text" class="form-control" id="search_brand" placeholder="Brand name" wire:model.debounce.500ms="search_value">
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Num. of Products</th>
        </tr>
        </thead>
        <tbody>
        @forelse($brands as $brand)
            <tr data-bs-toggle="modal" data-bs-target="#showBrandModal" wire:click="show('{{ $brand->id }}')">
                <th scope="row">{{ $brand->name }}</th>
                <td>{{ $brand->products->count() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">No brand available.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $brands->links() }}

    @include('livewire.pages.brand.create')
    @include('livewire.pages.brand.show')

    <script>
        window.addEventListener('close-modal', event => {
            $('#brandModal').modal('hide');
            $('#showBrandModal').modal('hide');
        })
    </script>
</div>
