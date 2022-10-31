<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order</h1>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Customer Name</th>
            <th scope="col">Date</th>
            <th scope="col">Total Payment</th>
            <th scope="col">Payment Date</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr data-bs-toggle="modal" data-bs-target="#showOrderModal" wire:click="show('{{ $order->id }}')">
                <th scope="row">{{ $order->customer->name }}</th>
                <td>{{ $order->date }}</td>
                <td>{{ $order->total_payment }}</td>
                <td>
                    @if(isset($order->payment_date))
                        <span class="text-success">Paid</span>, at {{ $order->payment_date }}
                    @else
                        <span class="text-danger">Unpaid</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No order available.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $orders->links() }}

    @include('livewire.pages.order.show')

    <script>
        window.addEventListener('close-modal', event => {
            $('#orderModal').modal('hide');
            $('#showCustomerModal').modal('hide');
        })
    </script>
</div>
