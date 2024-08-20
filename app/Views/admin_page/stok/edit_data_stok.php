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
        <?php //print_r($variant); die;  ?>
        <?php foreach ($data as $key => $product) { ?>
            <div class="row">
                <div class="col-md-12 overflow-hidden">
                    <h2 class="text-center">Edit Stock</h2>
                    <hr>
                    <form action="<?= base_url('/admin/stock/update'); ?>" method="post">  
                        <input type="hidden" id="id" name="id" value="<?php echo $data[0]['id']; ?>">
                        <div class="mb-3">
                            <label for="namaProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $product['name']; ?>" disabled >
                            <input type="text" class="form-control d-none" id="nama" name="nama" value="<?= $product['name']; ?>"   >
                        </div>
                        <div class="mb-3">
                            <?php //print_r($variant); die;
                               $variant_terpilih = $variant['result']['data']['variant_selected'];
                               $variant_tidak_terpilih = $variant['result']['data']['variant_not_selected'];
                            ?>
                            <label for="variant" class="form-label">variant</label>
                            <select class="form-select" id="variant" name="variant" aria-label="Default select example"  disabled>
                                <?php foreach ($variant_terpilih as $variant_selected) {  ?>
                                    <option value="<?php echo $variant_selected['variant_id']; ?>"><?php echo $variant_selected['variant_name'];?></option>
                                <?php } ?>
                                <?php foreach ($variant_tidak_terpilih as $variant_not_selected) {  ?>
                                    <option value="<?php echo $variant_not_selected['variant_id']; ?>"><?php echo $variant_not_selected['variant_name'];?></option>
                                <?php } ?>
                            </select>
                            <select class="form-select d-none" id="variant" name="variant" aria-label="Default select example" >
                                <?php foreach ($variant_terpilih as $variant_selected) {  ?>
                                    <option value="<?php echo $variant_selected['variant_id']; ?>"><?php echo $variant_selected['variant_name'];?></option>
                                <?php } ?>
                                <?php foreach ($variant_tidak_terpilih as $variant_not_selected) {  ?>
                                    <option value="<?php echo $variant_not_selected['variant_id']; ?>"><?php echo $variant_not_selected['variant_name'];?></option>
                                <?php } ?>
                            </select>
                        </div>                        
                        <div class="mb-3 d-none">
                            <?php //print_r($category); die;
                               $kategori_terpilih = $category['result']['data']['category_selected'];
                               $kategori_tidak_terpilih = $category['result']['data']['category_not_selected'];
                            ?>
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select" id="category" name="category" aria-label="Default select example">
                                <?php foreach ($kategori_terpilih as $category_selected) {  ?>
                                    <option value="<?php echo $category_selected['category_id']; ?>"><?php echo $category_selected['category_name'];?></option>
                                <?php } ?>
                                <?php foreach ($kategori_tidak_terpilih as $category_not_selected) {  ?>
                                    <option value="<?php echo $category_not_selected['category_id']; ?>"><?php echo $category_not_selected['category_name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3 d-none">
                            <?php //print_r($box); die;
                               $box_terpilih = $box['result']['data']['box_selected'];
                               $box_tidak_terpilih = $box['result']['data']['box_not_selected'];
                            ?>
                            <label for="box" class="form-label">Box</label>
                            <select class="form-select" id="box" name="box" aria-label="Default select example">
                                <?php foreach ($box_terpilih as $box_selected) {  ?>
                                    <option value="<?php echo $box_selected['box_id']; ?>"><?php echo $box_selected['box_value'];?></option>
                                <?php } ?>
                                <?php foreach ($box_tidak_terpilih as $box_not_selected) {  ?>
                                    <option value="<?php echo $box_not_selected['box_id']; ?>"><?php echo $box_not_selected['box_value'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="25" value="<?php echo $product['stock']; ?>" required>
                        </div>
                        <div class="mb-3 d-none">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" value="<?php echo $product['price']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Created at</label>
                            <p class="fs-5"><?php echo $product['created_at']; ?></p>
                        </div>
                        <div class="mb-1">
                            <label for="stock" class="form-label">Updated at</label>
                            <p class="fs-5"><?php echo $product['updated_at']; ?></p>
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
                <?php } ?>
                </div>
            </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>