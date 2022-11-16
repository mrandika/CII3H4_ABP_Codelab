@section('page')
    Delete Brand
@endsection

@extends('layouts.sidebar')

@section('brand-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('brand.show', $brand_id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Confirm Warehouse Deletion</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warehouse.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('brand.index') }}">Brand</a></div>
                <div class="breadcrumb-item"><a href="{{ route('brand.show', $brand_id) }}">{{ $brand->name }}</a></div>
                <div class="breadcrumb-item">Delete</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="empty-state" data-height="400">
                        <div class="empty-state-icon" style="background-color: red">
                            <i class="fas fa-exclamation"></i>
                        </div>
                        <h2>Are you sure want to delete this brand?</h2>
                        <p class="lead">
                            All data linked with this brand will be deleted. This action <b>CANT</b> be rolled back.
                        </p>
                        <a href="#" wire:click="destroy" class="btn btn-danger mt-4">Yes, delete</a>

                        <a href="{{ route('brand.show', $brand->id) }}" class="mt-4 bb">No, cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
