@section('page')
    {{ $product->name }}
@endsection

@extends('layouts.sidebar')

@section('product-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('brand.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Product Information</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warehouse.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></div>
                <div class="breadcrumb-item">{{ $product->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ asset('image/package.png') }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Warehouse</div>
                            <div class="profile-widget-item-value">{{ $product->warehouse->name }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Brand</div>
                            <div class="profile-widget-item-value">{{ $product->brand->name }}</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ $product->name }}
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>
                            Rp. {{ $product->price }}
                        </div>
                    </div>

                    Remaining: {{ $product->stock }}

                    <div class="text-right mt-4">
                        <button class="btn btn-danger" wire:click="redirect_page('product.destroy', '{{ $product->id }}')">Delete</button>
                        <button class="btn btn-light" wire:click="redirect_page('product.edit', '{{ $product->id }}')">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
