@section('page')
    Customer
@endsection

@extends('layouts.sidebar')

@section('customer-active')
    active
@endsection

<div class="main-content" wire:init="edit">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('customer.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Customer</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('customer.index') }}">Customer</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('customer.show', $customer_id) }}">{{ $customer->name }}</a></div>
                <div class="breadcrumb-item">Update</div>
            </div>
        </div>

        <div class="section-body">
            <form wire:submit.prevent="update">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Data</h4>
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
                            <label for="name">Address</label>
                            <input type="text" id="name" class="form-control @error('address') is-invalid @enderror" aria-describedby="name-helpblock" wire:model="address" required>
                            <small id="name-helpblock" class="form-text text-muted">
                                Required
                            </small>

                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Phone Number</label>
                            <input type="number" id="name" class="form-control @error('phone_number') is-invalid @enderror" aria-describedby="name-helpblock" wire:model="phone_number" required>
                            <small id="name-helpblock" class="form-text text-muted">
                                Required, numeric, min: 8 and max: 15
                            </small>

                            @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </form>
        </div>
    </section>
</div>
