@extends('layouts.dashboard')

@section('page')
    Warehouse (AJAX)
@endsection

@extends('layouts.sidebar')

@section('warehouse-ajax-active')
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
                <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
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
                            <input type="text" class="form-control" placeholder="Search" id="search_value">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Num. of Products</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="warehouse_list">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('js')
    <script>
        let warehouse_row = function (name, address, products_count, show_url) {
            return `
            <tr>
                <th scope="row">${name}</th>
                <td>${address}</td>
                <td>${products_count}</td>
                <td><a href="${show_url}" class="btn btn-secondary">Detail</a></td>
            </tr>
            `
        }

        let get_warehouse = function (key = '') {
            let wh_list = $('#warehouse_list');
            wh_list.empty();

            $.ajax({
                url: key !== '' ? "{{ route('api.warehouse.index') }}" + `?key=${key}` : "{{ route('api.warehouse.index') }}",
                headers: {
                    'Authorization':'Bearer 2|gDoZskbLgEMmiJyZbkxhLz2T5gHX0YcgGVHlIYYW',
                },
                method: "GET",
                success: function (result) {
                    result["data"].forEach(function (warehouse) {
                        wh_list.append(warehouse_row(warehouse.name, warehouse.address, warehouse.products.length, `show/${warehouse.id}`))
                    })
                },
                error: function (data) {
                    console.error(data);
                }
            })
        }

        $(document).on('turbolinks:load', function () {
            get_warehouse()

            let search_value = $('#search_value');

            $(search_value).on('change', function () {
                get_warehouse(search_value.val())
            });
        });
    </script>
@endsection
