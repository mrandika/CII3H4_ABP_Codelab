<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sales</h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="warehouse" class="form-label">Warehouse</label>
                        <select class="form-select" aria-label="Warehouse Selection" wire:model="warehouse_id" wire:change="get_warehouse" required>
                            <option value="0" disabled>Select warehouse</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                        <div id="warehouse_help" class="form-text">Required</div>

                        @error('warehouse_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="customer" class="form-label">Customer</label>
                        <select class="form-select" aria-label="Warehouse Selection" wire:model="customer_id" wire:change="get_customer" required>
                            <option value="0" disabled>Select customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        <div id="customer_help" class="form-text">Required</div>

                        @error('warehouse_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            @if(isset($selected_warehouse) && isset($selected_customer))
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price</th>
                        <th scope="col">Warehouse</th>
                        <th scope="col">Brand</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($selected_warehouse->products as $product)
                        <tr wire:click="add_to_lists({{ $product }})">
                            <th scope="row">{{ $product->name }}</th>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->warehouse->name }}</td>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No product available.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            @else
                <p>Please select warehouse and customer first.</p>
            @endif
        </div>
        <div class="col-md-4">
            <h3 class="m-4">Order Preview</h3>

            @isset($items)
                @forelse($items as $item)
                    <div class="card m-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="row justify-content-between">
                                    <div class="col-8">
                                        {{ $item['name'] }}
                                    </div>
                                    <div class="col-4">
                                        Rp. {{ $item['qty'] * $item['price'] }}
                                    </div>
                                </div>
                            </h5>

                            <h6 class="card-subtitle mb-2 text-muted">{{ $item['qty'] }} x (Rp. {{ $item['price'] }})</h6>

                            <div class="row">
                                <div class="col-md-9">
                                    <a wire:click="qty('remove', '{{ $item['id'] }}', {{ $item['stock'] }})" class="btn btn-secondary btn-sm">
                                        <p class="m-1">-</p>
                                    </a>
                                    <a wire:click="qty('add', '{{ $item['id'] }}', {{ $item['stock'] }})" class="btn btn-success btn-sm">
                                        <p class="m-1">+</p>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a wire:click="remove_from_list('{{ $item['id'] }}')" class="btn btn-danger btn-sm">
                                        <p class="m-1">Remove</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info m-3" role="alert">
                        No items in bag.
                    </div>
                @endforelse

                @if(!empty($items))
                    <div class="d-grid m-3">
                        <a class="btn btn-dark" wire:click="checkout">Checkout</a>
                    </div>
                @endif
            @endisset
        </div>
    </div>
</div>
