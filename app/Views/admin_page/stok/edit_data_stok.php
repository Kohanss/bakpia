<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container d-flex flex-column">
        <div class="">
            <button type="button" class="float-end btn btn-danger m-1 "><a href="/stock" class="text-light pt-1" style="text-decoration: none;">&#128473;</a></button>
        </div>
        <?php $data = $product_detail['result']['data']; ?>
        <?php
        // print_r($data);  
        // die;
        // [category_id] => 1
        // [category_name] => Basah
        // [variant_id] => 1
        // [variant_name] => Kacang Hijau
        // [stock_stock] => 100
        // [stock_in] => 5
        // [stock_out] => 5
        ?>
        <h2 class="text-center">Edit Stock</h2>
        <hr>
        <?php foreach ($data as $key => $product) { ?>
            <div class="row">
                <div class="col-md-12 overflow-hidden">
                    <div class="mb-3">
                        <label for="namaProduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $product['name']; ?>" disabled>
                    </div>
                    <form action="<?= base_url('/admin/stock/update'); ?>" method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo $data[0]['id']; ?>">
                        <div class="mb-3">
                            <label for="harga" class="form-label">stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="25" value="<?php echo $product['stock_stock']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label"></label>
                            <p class="fs-5 text-success"><?php echo $message; ?></p>
                        </div>
                        <div class="footer" style="height: 70px;">
                            <footer class="footer py-3 bg-light" style="position: fixed; left: 0;bottom: 0;width: 100%; ">
                                <div class="container text-center">
                                    <button type="submit" class="btn btn-primary px-5 ">Simpan</button>
                                    <button type="button" class="btn btn-danger px-5 "><a href="/stock" class="text-light" style="text-decoration: none;">Kembali</a></button>
                                </div>
                            </footer>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>