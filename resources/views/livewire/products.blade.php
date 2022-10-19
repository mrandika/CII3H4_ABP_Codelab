<div class="mt-5">
    <h1>My Products</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Last Update</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->formatDate($product->updated_at) }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="show({{ $product->id }})">Show</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="col-md-4 sticky-top">
            @switch($mode)
                @case('showing')
                    @include('livewire.products.show')
                    @break
                @case('editing')
                    @include('livewire.products.update')
                    @break
                @case('creating')
                    @include('livewire.products.create')
                    @break
                @default

            @endswitch
        </div>
    </div>
</div>
