@section('page')
    Delete Warehouse
@endsection

@extends('layouts.sidebar')

@section('warehouse-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('warehouse.show', $warehouse_id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Confirm Warehouse Deletion</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warehouse.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('warehouse.index') }}">Warehouse</a></div>
                <div class="breadcrumb-item"><a href="{{ route('warehouse.show', $warehouse_id) }}">{{ $warehouse->name }}</a></div>
                <div class="breadcrumb-item">Delete</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="empty-state" data-height="400">
                        @if ($count == 1)
                            <div class="empty-state-icon" style="background-color: orange">
                                <i class="fas fa-exclamation"></i>
                            </div>
                            <h2>Can't delete this warehouse.</h2>
                            <p class="lead">
                                This warehouse can't be deleted because this warehouse is your last warehouse.
                            </p>
                            <a href="{{ route('warehouse.show', $warehouse->id) }}" class="mt-4 bb">Kembali</a>
                        @else
                            <div class="empty-state-icon" style="background-color: red">
                                <i class="fas fa-exclamation"></i>
                            </div>
                            <h2>Are you sure want to delete this warehouse?</h2>
                            <p class="lead">
                                All data linked with this warehouse will be deleted. This action <b>CANT</b> be rolled back.
                            </p>
                            <a href="#" wire:click="destroy" class="btn btn-danger mt-4">Yes, delete</a>

                            <a href="{{ route('warehouse.show', $warehouse->id) }}" class="mt-4 bb">No, cancel</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
