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
            <h1>Order</h1>
            <div class="section-header-button">
                <button class="btn btn-primary" wire:click="redirect_page('sales.index')">New</button>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Order</div>
            </div>
        </div>

        <div class="section-body">
            @if (session('info'))
                <div class="alert alert-info alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('info') }}
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Orders</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Total Payment</th>
                                <th>Payment Date</th>
                                <th>Action</th>
                            </tr>
                            @forelse($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->customer->name }}</th>
                                    <td>{{ $order->date }}</td>
                                    <td>Rp. {{ $order->total_payment }}</td>
                                    <td>
                                        @if(isset($order->payment_date))
                                            <span class="text-success">Paid</span>, at {{ $order->payment_date }}
                                        @else
                                            <span class="text-danger">Unpaid</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('order.show', $order->id) }}" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No order available.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer text-right">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
