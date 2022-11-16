@section('page')
    {{ $warehouse->name }}
@endsection

@extends('layouts.sidebar')

@section('warehouse-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('warehouse.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Warehouse Information</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warehouse.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('warehouse.index') }}">Warehouse</a></div>
                <div class="breadcrumb-item">{{ $warehouse->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ asset('image/warehouse.png') }}" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Products</div>
                                    <div class="profile-widget-item-value">{{ $warehouse->products->count() }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $warehouse->name }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>
                                    -
                                </div>
                            </div>

                            {{ $warehouse->address }}

                            <div class="text-right mt-4">
                                <button class="btn btn-danger" wire:click="redirect_page('warehouse.destroy', '{{ $warehouse->id }}')">Delete</button>
                                <button class="btn btn-light" wire:click="redirect_page('warehouse.edit', '{{ $warehouse->id }}')">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Products List</h4>
                        </div>

                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @forelse($warehouse->products as $item)
                                    <li class="media" wire:click="redirect_page('product.show', '{{ $item->id }}')">
                                        <img class="mr-3 rounded" width="55" src="{{ asset('image/package.png') }}" alt="{{ $item->name }}">
                                        <div class="media-body">
                                            <div class="float-right">
                                                <div class="font-weight-600 text-muted text-small">
                                                    Stock: {{ $item->stock }}

                                                    @if ($item->stock >= 100)
                                                        <i class="fas fa-circle" style="color: green"></i>
                                                    @elseif($item->stock > 25 && $item->stock <= 50)
                                                        <i class="fas fa-circle" style="color: orange"></i>
                                                    @elseif($item->stock <= 25)
                                                        <i class="fas fa-circle" style="color: red"></i>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="media-title">{{ $item->name }}</div>
                                            <div class="media-subtitle">Rp. {{ $item->price }}</div>
                                        </div>
                                    </li>
                                @empty
                                    <div class="empty-state">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>No products in this warehouse.</h2>
                                        <p class="lead">
                                            This warehouse currently have no products. Use button below to create a new products.
                                        </p>
{{--                                        <a href="{{ route('item.create') }}" class="btn btn-primary mt-4">'Buat Baru'</a>--}}
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
