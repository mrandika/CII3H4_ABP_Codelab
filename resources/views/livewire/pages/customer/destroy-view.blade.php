@section('page')
    Delete Customer
@endsection

@extends('layouts.sidebar')

@section('customer-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('customer.show', $customer_id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Confirm Customer Deletion</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></div>
                <div class="breadcrumb-item"><a href="{{ route('customer.show', $customer_id) }}">{{ $customer->name }}</a></div>
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
                        <h2>Are you sure want to delete this customer?</h2>
                        <p class="lead">
                            All data linked with this customer will be deleted. This action <b>CANT</b> be rolled back.
                        </p>
                        <a href="#" wire:click="destroy" class="btn btn-danger mt-4">Yes, delete</a>

                        <a href="{{ route('customer.show', $customer->id) }}" class="mt-4 bb">No, cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
