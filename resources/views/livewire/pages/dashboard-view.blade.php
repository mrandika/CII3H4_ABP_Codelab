@section('page')
    Dashboard
@endsection

@extends('layouts.sidebar')

@section('dashboard-active')
    active
@endsection

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-warehouse"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Warehouse</h4>
                        </div>
                        <div class="card-body">
                            {{ $warehouse_count }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-copyright"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Brand</h4>
                        </div>
                        <div class="card-body">
                            {{ $brand_count }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-box"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Product</h4>
                        </div>
                        <div class="card-body">
                            {{ $product_count }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Orders</h4>
                        </div>
                        <div class="card-body">
                            {{ $order_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
