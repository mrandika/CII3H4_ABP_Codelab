<div wire:ignore.self class="modal fade" id="showOrderModal" tabindex="-1" aria-labelledby="orderModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Data Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="resetFields"></button>
            </div>
            <div class="modal-body">
                @isset($selected_order)
                    <table class="table table-bordered">
                        <tr>
                            <th scope="col">Customer</th>
                            <td>{{ $selected_order->customer->name }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Customer Details</th>
                            <td>
                                {{ $selected_order->customer->phone_number }}
                                <br>
                                {{ $selected_order->customer->address }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Order Date</th>
                            <td>{{ $selected_order->date }}</td>
                        </tr>
                        <tr>
                            <th scope="col">Payment Date</th>
                            <td>
                                @if(isset($order->payment_date))
                                    <span class="text-success">Paid</span>, at {{ $order->payment_date }}
                                @else
                                    <span class="text-danger">Unpaid</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Num. of Items</th>
                            <td>{{ $order->details->count() }} item(s)</td>
                        </tr>
                    </table>

                    <h5>Order Details</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Warehouse</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($selected_order->details as $detail)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $detail->product->warehouse->name }}</td>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->product->price }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->quantity * $detail->product->price }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No product ordered in this order.</td>
                            </tr>
                        @endforelse
                            <tr>
                                <td colspan="5">Grand Total</td>
                                <td>{{ $selected_order->total_payment }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endisset
            </div>
        </div>
    </div>
</div>
