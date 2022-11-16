@section('page')
    Update Product
@endsection

@extends('layouts.sidebar')

@section('product-active')
    active
@endsection

<div class="main-content" wire:init="edit">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('product.show', $product_id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>New Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warehouse.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('product.index') }}">Product</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('product.show', $product_id) }}">{{ $product->name }}</a></div>
                <div class="breadcrumb-item">Update</div>
            </div>
        </div>

        <div class="section-body">
            <form wire:submit.prevent="update">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Data</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="name-helpblock" wire:model="name" required>
                            <small id="name-helpblock" class="form-text text-muted">
                                Required, min: 5 character
                            </small>

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" id="stock" class="form-control @error('stock') is-invalid @enderror" aria-describedby="stock-helpblock" wire:model="stock" required>
                            <small id="stock-helpblock" class="form-text text-muted">
                                Required, numeric
                            </small>

                            @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" aria-describedby="price-helpblock" wire:model="price" required>
                            <small id="price-helpblock" class="form-text text-muted">
                                Required, numeric
                            </small>

                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Warehouse Location</label>
                            <select class="form-control" wire:model="warehouse_id" required>
                                <option value="0" disabled>Select warehouse</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>

                            @error('warehouse_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Brand Information</label>

                            <span class="text-danger">You cannot change the product's brand.</span>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </form>
        </div>
    </section>
</div>
