@section('page')
    Update Brand
@endsection

@extends('layouts.sidebar')

@section('brand-active')
    active
@endsection

<div class="main-content" wire:init="edit">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('brand.show', $brand->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Brand</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('brand.index') }}">Brand</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('brand.show', $brand->id) }}">{{ $brand->name }}</a></div>
                <div class="breadcrumb-item">Update</div>
            </div>
        </div>

        <div class="section-body">
            <form wire:submit.prevent="update">
                <div class="card">
                    <div class="card-header">
                        <h4>Brand Data</h4>
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

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
            </form>
        </div>
    </section>
</div>
