<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf

       <label>Nama Produk</label>
        <input type="text" name="nama_produk" />

        <label>Stok Produk</label>
        <input type="number" name="stok_produk" />

        <button type="submit">Submit</button>
    </form>
</body>
</html>
