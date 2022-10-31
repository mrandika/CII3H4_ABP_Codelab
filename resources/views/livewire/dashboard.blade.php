<div>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">BarangSiapa</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
{{--        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">--}}
{{--        <div class="navbar-nav">--}}
{{--            <div class="nav-item text-nowrap">--}}
{{--                <a class="nav-link px-3" href="#">Sign out</a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link @if($page == 'Warehouse') active @endif" wire:click="change_page('warehouse')" href="#">
                                <span wire:ignore class="align-text-bottom">
                                    <i data-feather="home"></i>
                                </span>
                                Warehouse
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($page == 'Brand') active @endif" wire:click="change_page('brand')" href="#">
                                <span wire:ignore class="align-text-bottom">
                                    <i data-feather="book"></i>
                                </span>
                                Brand
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($page == 'Product') active @endif" wire:click="change_page('product')" href="#">
                                <span wire:ignore class="align-text-bottom">
                                    <i data-feather="package"></i>
                                </span>
                                Product
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Point of Sale</span>
                        <a class="link-secondary" href="#" wire:click="change_page('order-sales')" aria-label="Sale Tab">
                            <span wire:ignore class="align-text-bottom">
                                    <i data-feather="plus-circle"></i>
                            </span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link @if($page == 'Orders' || $page == 'Order-Sale') active @endif" wire:click="change_page('order')" href="#">
                                <span wire:ignore class="align-text-bottom">
                                    <i data-feather="file-text"></i>
                                </span>
                                Order
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($page == 'Customers') active @endif" wire:click="change_page('customers')" href="#">
                                <span wire:ignore class="align-text-bottom">
                                    <i data-feather="users"></i>
                                </span>
                                Customer
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @switch($page)
                    @case('Warehouse')
                        @livewire('pages.warehouse.warehouse-view')
                        @break
                    @case('Brand')
                        @livewire('pages.brand.brand-view')
                        @break
                    @case('Product')
                        @livewire('pages.product.product-view')
                        @break
                    @case('Orders')
                        @livewire('pages.order.order-view')
                        @break
                    @case('Order-Sale')
                        @livewire('pages.order.sales-view')
                        @break
                    @case('Customers')
                        @livewire('pages.customer.customer-view')
                        @break
                @endswitch
            </main>
        </div>
    </div>
</div>
