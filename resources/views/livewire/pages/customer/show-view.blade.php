@section('page')
    {{ $customer->name }}
@endsection

@extends('layouts.sidebar')

@section('customer-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('customer.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Customer Information</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></div>
                <div class="breadcrumb-item">{{ $customer->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ asset('image/customer.png') }}" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Orders</div>
                                    <div class="profile-widget-item-value">{{ $customer->orders->count() }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $customer->name }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>
                                    {{ $customer->phone_number }}
                                </div>
                            </div>

                            {{ $customer->address }}

                            <div class="text-right mt-4">
                                <button class="btn btn-danger" wire:click="redirect_page('customer.destroy', '{{ $customer->id }}')">Delete</button>
                                <button class="btn btn-light" wire:click="redirect_page('customer.edit', '{{ $customer->id }}')">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order List</h4>
                        </div>

                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @forelse($customer->orders as $order)
                                    <li class="media" wire:click="redirect_page('order.show', '{{ $order->id }}')">
                                        <img class="mr-3 rounded" width="55" src="{{ asset('image/order.png') }}" alt="{{ $order->name }}">
                                        <div class="media-body">
                                            <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">{{ $order->payment_date }}</div>
                                            </div>
                                            <div class="media-title">{{ $order->details->count() }} item</div>
                                            <div class="media-subtitle">Rp. {{ $order->total_payment }}</div>
                                        </div>
                                    </li>
                                @empty
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>No orders for this user.</h2>
                                        <p class="lead">
                                            This user currently haven't made an order. Use button below to create a new order.
                                        </p>
                                        <a href="{{ route('product.create') }}" class="btn btn-primary mt-4">Create New</a>
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
