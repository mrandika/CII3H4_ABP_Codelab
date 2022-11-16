@section('page')
    Warehouse
@endsection

@extends('layouts.sidebar')

@section('warehouse-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Warehouse</h1>
            <div class="section-header-button">
                <button class="btn btn-primary" wire:click="redirect_page('warehouse.create')">New</button>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warehouse.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Warehouse</div>
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
                    <h4>Registered Warehouses</h4>
                    <div class="card-header-form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" wire:model.debounce.500ms="search_value">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Num. of Products</th>
                                <th>Action</th>
                            </tr>
                            @forelse($warehouses as $warehouse)
                                <tr>
                                    <th scope="row">{{ $warehouse->name }}</th>
                                    <td>{{ $warehouse->address }}</td>
                                    <td>{{ $warehouse->products->count() }}</td>
                                    <td><a href="{{ route('warehouse.show', $warehouse->id) }}" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No warehouse available.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer text-right">
                    {{ $warehouses->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
