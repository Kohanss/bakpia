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
            <button type="button" class="float-end btn btn-danger m-1 "><a href="/category" class="text-light pt-1" style="text-decoration: none;">&#128473;</a></button>
        </div>
        <?php $data = $data['result']['data']; ?>
        <?php //print_r($data); die; 
        ?>
        <?php foreach ($data as $key => $product) { ?>
            <div class="row">
                <div class="col-md-12 overflow-hidden">
                    <h2 class="text-center">Edit Kategori</h2>
                    <hr>
                    <form action="<?= base_url('/admin/category/update'); ?>" method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo $data[0]['id']; ?>">
                        <div class="mb-3">
                            <label for="namaProduk" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="category" name="category" value="<?= $product['name']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Created at</label>
                            <p class="fs-5"><?php echo $product['created_at']; ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <label for="stock" class="form-label">Updated at</label>
                            <p class="fs-5"><?php echo $product['updated_at']; ?></p>
                        </div>
                        <div class="footer" style="height: 70px;">
                            <footer class="footer py-3 bg-light" style="position: fixed; left: 0;bottom: 0;width: 100%; ">
                                <div class="container text-center">
                                    <button type="submit" class="btn btn-primary px-5 ">Simpan</button>
                                    <button type="button" class="btn btn-danger px-5 "><a href="/category" class="text-light" style="text-decoration: none;">Kembali</a></button>
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