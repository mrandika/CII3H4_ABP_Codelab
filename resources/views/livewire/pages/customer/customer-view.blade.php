@section('page')
    Customer
@endsection

@extends('layouts.sidebar')

@section('customer-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customer</h1>
            <div class="section-header-button">
                <button class="btn btn-primary" wire:click="redirect_page('customer.create')">New</button>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Customer</div>
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
                    <h4>Registered Customers</h4>
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
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                            @forelse($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $customer->name }}</th>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->phone_number }}</td>
                                    <td><a href="{{ route('customer.show', $customer->id) }}" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No customer available.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer text-right">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
