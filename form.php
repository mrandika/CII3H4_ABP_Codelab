<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>Form Tambah Produk</legend>
            <p>
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" value="">
            </p>
            <p>
                <label for="harga_produk">Harga Produk</label>
                <input type="number" name="harga_produk" value="">
            </p>
            
            <p>
                <button type="submit">
                    Save
                </button>
            </p>
        </fieldset>
    </form>
</body>
<?php
    if (isset($_POST['nama_produk'])) {
        echo $_POST['nama_produk'];
    }
?>
</html>