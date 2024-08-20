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
            <button type="button" class="float-end btn btn-danger m-1 "><a href="/type" class="text-light pt-1" style="text-decoration: none;">&#128473;</a></button>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Tambah Variant</h2>
                <form action="/admin/type/add_data" method="post">
                    <div class="mb-3">
                        <label for="type" class="form-label">Nama Variant</label>
                        <input type="text" class="form-control" id="type" name="type" value="" required>
                    </div>
                    <?php if (!empty($type['message'])) {
                        echo '<div class="mb-3">
                         <p class="fs-5 text-success">' . $type['message'] . '</p>
                    </div>';
                    } ?>
                    <div class="footer" style="height: 70px;">
                        <footer class="footer py-3 bg-light" style="position: fixed; left: 0;bottom: 0;width: 100%; ">
                            <div class="container text-center">
                                <button type="submit" class="btn btn-primary px-5 ">Simpan</button>
                                <button type="button" class="btn btn-danger px-5 "><a href="/type" class="text-light" style="text-decoration: none;">Kembali</a></button>
                            </div>
                        </footer>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>