@section('main-sidebar')
    <ul class="sidebar-menu">
        <li class=@yield('dashboard-active')><a class="nav-link" href="{{ route('home') }}"><i class="far fa-home"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">Manajemen</li>
        <li class=@yield('warehouse-active')><a class="nav-link" href="{{ route('warehouse.index') }}"><i class="far fa-warehouse"></i> <span>Warehouse</span></a></li>
        <li class=@yield('warehouse-ajax-active')><a class="nav-link" href="{{ route('warehouse.ajax.index') }}"><i class="far fa-warehouse"></i> <span>Warehouse (AJAX)</span></a></li>
        <li class=@yield('brand-active')><a class="nav-link" href="{{ route('brand.index') }}"><i class="far fa-copyright"></i> <span>Brand</span></a></li>
        <li class=@yield('product-active')><a class="nav-link" href="{{ route('product.index') }}"><i class="far fa-box"></i> <span>Product</span></a></li>

        <li class="menu-header">Point of Sales</li>
        <li class=@yield('customer-active')><a class="nav-link" href="{{ route('customer.index') }}"><i class="far fa-user"></i> <span>Customer</span></a></li>
        <li class=@yield('sale-active')><a class="nav-link" href="{{ route('sales.index') }}"><i class="far fa-money-bill"></i> <span>Sales</span></a></li>
        <li class=@yield('order-active')><a class="nav-link" href="{{ route('order.index') }}"><i class="far fa-file-invoice"></i> <span>Order</span></a></li>
    </ul>
@endsection
