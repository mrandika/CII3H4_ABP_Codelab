@section('page')
    Sales
@endsection

@extends('layouts.sidebar')

@section('sale-active')
    active
@endsection

<div class="main-content" wire:init="create_order">
    <section class="section">
        <div class="section-header">
            <h1>Sales</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Sales</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Customers</h4>
                            <div class="card-header-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" wire:model.debounce.500ms="search_customer">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-unstyled list-unstyled-border pr-4 pl-4">
                                @forelse($customers as $customer)
                                    <li class="media" wire:click="get_customer('{{ $customer->id }}')">
                                        <img class="mr-3 rounded" width="55" src="{{ asset('image/customer.png') }}" alt="{{ $customer->name }}">
                                        <div class="media-body">
                                            <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">{{ $customer->address }}</div>
                                            </div>
                                            <div class="media-title">{{ $customer->name }}</div>
                                            <div class="media-subtitle">{{ $customer->phone_number }}</div>
                                        </div>
                                    </li>
                                @empty
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>No user found.</h2>
                                        <p class="lead">
                                            No user name with `{{ $search_customer }}` found in storage.
                                        </p>
                                        <a href="{{ route('product.create') }}" class="btn btn-primary mt-4">Create New</a>
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Items</h4>
                            <div class="card-header-form">
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Search" wire:model.debounce.500ms="search_item">--}}
{{--                                    <div class="input-group-btn">--}}
{{--                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="form-group pr-4 pl-4">
                                <label>Warehouse Location</label>
                                <select class="form-control" wire:model="warehouse_id" wire:change="get_warehouse" required>
                                    <option value="0" disabled>Select warehouse</option>
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>

                                @error('warehouse_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <ul class="list-unstyled list-unstyled-border pr-4 pl-4">
                                @forelse($products as $product)
                                    <li class="media" wire:click="add_to_lists({{ $product }})">
                                        <img class="mr-3 rounded" width="55" src="{{ asset('image/package.png') }}" alt="{{ $product->name }}">
                                        <div class="media-body">
                                            <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">Rp. {{ $product->price }}</div>
                                            </div>
                                            <div class="media-title">{{ $product->name }}</div>
                                            <div class="media-subtitle">Stock: {{ $product->stock }}</div>
                                        </div>
                                    </li>
                                @empty
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>No product found.</h2>
                                        <p class="lead">
                                            No product name with `{{ $search_item }}` found in storage.
                                        </p>
                                        <a href="{{ route('product.create') }}" class="btn btn-primary mt-4">Create New</a>
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Summary</h4>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-unstyled list-unstyled-border pr-4 pl-4">
                                @if ($selected_warehouse)
                                    <li class="media">
                                        <img class="mr-3 rounded" width="55" src="{{ asset('image/warehouse.png') }}" alt="{{ $selected_warehouse->name }}">
                                        <div class="media-body">
                                            <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">{{ $selected_warehouse->payment_date }}</div>
                                            </div>
                                            <div class="media-title">{{ $selected_warehouse->name }}</div>
                                            <div class="media-subtitle">{{ $selected_warehouse->address }}</div>
                                        </div>
                                    </li>
                                @endif

                                @if ($selected_customer)
                                    <li class="media">
                                        <img class="mr-3 rounded" width="55" src="{{ asset('image/customer.png') }}" alt="{{ $selected_customer->name }}">
                                        <div class="media-body">
                                            <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">{{ $selected_customer->payment_date }}</div>
                                            </div>
                                            <div class="media-title">{{ $selected_customer->name }}</div>
                                            <div class="media-subtitle">{{ $selected_customer->phone_number }}</div>
                                        </div>
                                    </li>
                                @endif
                            </ul>

                            <ul class="list-unstyled list-unstyled-border pr-4 pl-4 mt-5">
                                @forelse($items as $item)
                                    <li class="media">
                                        <img class="mr-3 rounded" width="55" src="{{ asset('image/package.png') }}" alt="{{ $item['name'] }}">
                                        <div class="media-body">
                                            <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">{{ $item['qty'] }} x Rp. {{ $item['price'] }}: Rp. {{ $item['price']*$item['qty'] }}</div>
                                            </div>
                                            <div class="media-title">{{ $item['name'] }}</div>
                                            <div class="media-subtitle">
                                                <a wire:click="qty('add', '{{ $item['id'] }}', '{{ $item['stock'] }}')" class="mt-4 bb">+ Add</a>
                                                <a wire:click="qty('remove', '{{ $item['id'] }}', '{{ $item['stock'] }}')" class="mt-4 bb mr-5">- Remove</a>

                                                <a wire:click="remove_from_list('{{ $item['id'] }}')" class="mt-4 text-danger text-right">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>No items in cart.</h2>
                                    </div>
                                @endforelse
                            </ul>
                        </div>

                        <div class="card-footer">
                            <div class="text-right">
                                @if ($selected_warehouse && $selected_customer && $items != [])
                                    <h4>Rp. {{ $total }}</h4>
                                    <button wire:click="checkout" class="btn btn-primary">Checkout</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
