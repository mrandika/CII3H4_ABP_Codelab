@section('page')
    Order
@endsection

@extends('layouts.sidebar')

@section('order-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('order.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Invoice</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('order.index') }}">Order</a></div>
                <div class="breadcrumb-item">{{ $order->id }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2>
                                <div class="invoice-number">Order #{{ $order->id }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Billed To:</strong><br>
                                        {{ $order->customer->name }}<br>
                                        {{ $order->customer->address }}<br>
                                        {{ $order->customer->phone_number }}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Shipped To:</strong><br>
                                        {{ $order->customer->name }}<br>
                                        {{ $order->customer->address }}<br>
                                        {{ $order->customer->phone_number }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Payment Method:</strong><br>
                                        Visa ending **** 4242<br>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ $order->created_at }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Order Summary</div>
                            <p class="section-lead">All items here cannot be deleted.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tbody>
                                        <tr>
                                            <th data-width="40" style="width: 40px;">#</th>
                                            <th>Item</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Totals</th>
                                        </tr>
                                        @foreach($order->details as $detail)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $detail->product->name }}</td>
                                                <td class="text-center">Rp. {{ $detail->product->price }}</td>
                                                <td class="text-center">{{ $detail->quantity }}</td>
                                                <td class="text-right">Rp. {{ $detail->product->price * $detail->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title">Metode Pembayaran</div>
                                    <p class="section-lead">Kasbon</p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">Rp. {{ $order->total_payment }}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Biaya Lain</div>
                                        <div class="invoice-detail-value">Rp. 0</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">Rp. {{ $order->total_payment }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <button onclick="print()" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </section>
</div>

@section('js')
    <script>
        function print() {
            openned_window = window.open();

            openned_window.document.write($('.invoice').html());
            openned_window.print();
            openned_window.close();
        }
    </script>
@endsection
