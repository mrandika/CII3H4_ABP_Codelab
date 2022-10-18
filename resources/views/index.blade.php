<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <link id="app">
        <h1>Daftar Barang</h1>
        <a href="{{ route('products.create') }}">Add Barang</a>

        <ul>
            @foreach($products as $product)
                <li>{{ $product->name }}, stock: {{ $product->stock }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
