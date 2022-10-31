<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customer</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#customerModal">
                    <span wire:ignore>
                        <i data-feather="plus"></i>
                    </span>
                    Add New
                </button>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
        </tr>
        </thead>
        <tbody>
        @forelse($customers as $customer)
            <tr data-bs-toggle="modal" data-bs-target="#showCustomerModal" wire:click="show('{{ $customer->id }}')">
                <th scope="row">{{ $customer->name }}</th>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->phone_number }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No customer available.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @include('livewire.pages.customer.create')
    @include('livewire.pages.customer.show')

    <script>
        window.addEventListener('close-modal', event => {
            $('#customerModal').modal('hide');
            $('#showCustomerModal').modal('hide');
        })
    </script>
</div>
