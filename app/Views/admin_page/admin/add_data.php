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
            <button type="button" class="float-end btn btn-danger m-1 "><a href="/admin" class="text-light pt-1" style="text-decoration: none;">&#128473;</a></button>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Tambah Produk</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="namaProduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="" required>
                    </div>
                    <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select" id="category" name="category" aria-label="Default select example">
                                <?php foreach ($category['result'] as $category) {  ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label>
                            <select class="form-select" id="type" name="type" aria-label="Default select example">
                                <?php foreach ($type['result'] as $type) {  ?>
                                    <option value="<?php echo $type['id']; ?>"><?php echo $type['type']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="value" class="form-label">Box</label>
                            <select class="form-select" id="value" name="value" aria-label="Default select example">
                                <?php foreach ($value['result'] as $value) {  ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['value']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" placeholder="1.000.000" required>
                    </div>

                    <div class="mb-3 text-center ">
                        <button type="submit" class="btn btn-primary px-5 ">Simpan</button>
                        <button type="button" class="btn btn-danger px-5"><a href="/admin" class="text-light" style="text-decoration: none;">Kembali</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>