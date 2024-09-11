<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->

<div class="content">
    <div class="">
        <a data-bs-toggle="modal" data-bs-target="#staticBackdropaddata" style="padding: 3px 10px;" class="btn btn-primary mb-1" type="button">Add Data</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Name</th>
                            <th>Variant</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Time</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // print_r($data_get); die;
                        ?>
                        <?php $number = 1; ?>
                        <?php foreach ($data_get['result'] as $key => $data) { ?>
                            <?php
                            // print_r($data);
                            // die;
                            $value = $data['product'];
                            ?>
                            <tr>
                                <td><?php echo $number ?></td>
                                <td>
                                    <img class=" mt-3" width="100px" src="<?php echo '' . BASEURL . '' . $data['product']['photo'] . ''; ?>" />
                                </td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['variant_name']; ?></td>
                                <td><?php echo $value['category_name']; ?></td>
                                <td><?php echo $value['stock_stock'];
                                    echo '<br><div class="fw-semibold text-success" style=" font-size: 13px;" >stock in:&nbsp;';
                                    echo $value['stock_in'], '</div>';
                                    echo '<div class="fw-semibold text-danger" style=" font-size: 13px;">stock out:&nbsp;';
                                    echo $value['stock_out'], '</div> '; ?></td>
                                <td><?php echo '<div class="fw-semibold text-success">Created at:&nbsp;';
                                    echo $value['created_at'], '</div>';
                                    echo '<div class="fw-semibold text-danger">Updated at:&nbsp;';
                                    echo $value['updated_at'], '</div>';  ?></td>
                                <td><?php echo $value['price']; ?></td>
                                <td>
                                    <div style="width:300px; max-height:200px; overflow:auto"><?php echo $value['description']; ?></div>
                                </td>
                                <td>
                                    <span class="action-btn d-flex flex-column">
                                        <a type="button" class="btn btn-primary mb-1" style="padding: 3px 10px;" data-bs-toggle="modal" data-bs-target="#example<?php echo $value['id']; ?>">Edit</a>
                                        <a class="btn btn-danger" style="padding: 3px 10px;" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $value['id']; ?>">hapus</a>
                                    </span>

                                    <!-- modal hapus -->
                                    <form action="<?= base_url('/admin/product/delete'); ?>" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $value['id']; ?>">
                                        <div class="modal fade" id="staticBackdrop<?php echo $value['id']; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content text-center">
                                                    <div class="modal-header bg-danger text-white d-flex justify-content-center">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <i class="fas fa-times fa-3x text-danger"></i>
                                                        <p class="mt-3">anda yakin ingin menghapus produk ini?</p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <a href=""><button type="submit" class="btn btn-outline-danger">Hapus</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Modal tambah -->
                                    <form action="<?= base_url('/admin/produk/add-data'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal fade" id="staticBackdropaddata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        // $product = $data['product'];
                                                        ?>
                                                        <div class="container">
                                                            <?php if (!empty($error)) { ?>
                                                                <?php
                                                                // print_r($error);
                                                                // die;
                                                                ?>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold" for="customFile">Gambar</label>
                                                                        <?php if (!empty($error['upload'])) { ?>
                                                                            <label class="text-danger" style="margin-top: -10px;"> <?php echo $error['upload'] ?> </label>
                                                                        <?php } ?>
                                                                        <input type="file" class="form-control" id="customFile" name="image" accept="image/png, image/gif, image/jpeg, image/jpg" onchange="document.getElementById('foto').src = window.URL.createObjectURL(this.files[0])" />
                                                                        <img class=" mt-3" id="foto" alt="your image" width="400px" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                                                                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Variant" class="form-label fw-bold">Variant</label>
                                                                        <input type="text" class="form-control" id="Variant" name="variant" value="" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="category" class="form-label fw-bold">Kategori</label>
                                                                        <select class="form-select" id="category" name="category" aria-label="Default select example">
                                                                            <?php foreach ($category['result'] as $key => $value) {  ?>
                                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="stock" class="form-label fw-bold">stock</label>
                                                                        <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="25" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="harga" class="form-label fw-bold">Harga</label>
                                                                        <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" placeholder="1.000.000" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Deskripsi Produk</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold" for="customFile">Gambar</label>
                                                                        <input type="file" class="form-control" id="customFile" name="image" accept="image/png, image/gif, image/jpeg" onchange="document.getElementById('foto').src = window.URL.createObjectURL(this.files[0])" />
                                                                        <img class=" mt-3" id="foto" alt="your image" width="400px" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                                                                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Variant" class="form-label fw-bold">Variant</label>
                                                                        <input type="text" class="form-control" id="Variant" name="variant" value="" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="category" class="form-label fw-bold">Kategori</label>
                                                                        <select class="form-select" id="category" name="category" aria-label="Default select example">
                                                                            <?php foreach ($category['result'] as $key => $value) {  ?>
                                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="stock" class="form-label fw-bold">stock</label>
                                                                        <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="25" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="harga" class="form-label fw-bold">Harga</label>
                                                                        <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" placeholder="1.000.000" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Deskripsi Produk</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                                                                    </div>
                                                                <?php } ?>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer position-relative">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>

                                    <!-- Modal edit -->
                                    <form action="<?= base_url('/admin/product/update'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id" value="<?php echo $data['product']['id']; ?>">
                                        <div class="modal fade" id="example<?php echo $data['product']['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        // $product = $data['product'];
                                                        ?>
                                                        <div class="container">
                                                            <?php if (!empty($error_update)) { ?>
                                                                <?php
                                                                // print_r($error_update);
                                                                // die;
                                                                ?>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold" for="customFile">Gambar Saat ini</label>
                                                                        <?php //print_r($data['product']['photo']); die; 
                                                                        ?>
                                                                        <?php if (($data['product']['photo']) == 'upload/product/') { ?>
                                                                            <img class=" mt-3" width="400px" src="img/400x400.png" />
                                                                        <?php } else { ?>
                                                                            <img class=" mt-3" width="400px" src="<?php echo '' . BASEURL . '' . $data['product']['photo'] . ''; ?>" />
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold" for="customFile">Gambar</label>
                                                                        <?php if (!empty($error_update['upload'])) { ?>
                                                                            <label class="text-danger" style="margin-top: -10px;"> <?php echo $error['upload'] ?> </label>
                                                                        <?php } ?>
                                                                        <input type="file" class="form-control" id="customFile" name="image" accept="image/png, image/gif, image/jpeg, image/jpg" onchange="document.getElementById('foto<?php echo $data['product']['id']; ?>').src = window.URL.createObjectURL(this.files[0])" />
                                                                        <img class=" mt-3" id="foto<?php echo $data['product']['id']; ?>" alt="your image" width="400px" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                                                                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="<?php echo $data['product']['name']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Variant" class="form-label fw-bold">Variant</label>
                                                                        <input type="text" class="form-control" id="Variant" name="variant" value="<?php echo $data['product']['variant_name']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <?php
                                                                        // print_r($value); die;
                                                                        ?>
                                                                        <label for="category" class="form-label fw-bold">Kategori</label>
                                                                        <select class="form-select" id="category" name="category" aria-label="Default select example">
                                                                            <?php foreach ($data['category_list'] as $category_list) {  ?>
                                                                                <option value="<?php echo $category_list['category_id']; ?>"><?php echo $category_list['category_name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="stock" class="form-label fw-bold">stock</label>
                                                                        <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="25" value="<?php echo $data['product']['stock_stock']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="harga" class="form-label fw-bold">Harga</label>
                                                                        <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" placeholder="1.000.000" value="<?php echo $data['product']['Price']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Deskripsi Produk</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?php echo $data['product']['description']; ?></textarea>
                                                                    </div>

                                                                <?php } else { ?>
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold" for="customFile">Gambar</label>
                                                                        <input type="file" class="form-control" id="customFile" name="image" accept="image/png, image/gif, image/jpeg" onchange="document.getElementById('foto<?php echo $data['product']['id']; ?>').src = window.URL.createObjectURL(this.files[0])" />
                                                                        <img class=" mt-3" id="foto<?php echo $data['product']['id']; ?>" alt="your image" width="400px" />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold" for="customFile">Gambar Saat ini</label>
                                                                        <?php //print_r($data['product']['photo']); die; 
                                                                        ?>
                                                                        <?php if (($data['product']['photo']) == 'upload/product/') { ?>
                                                                            <img class=" mt-3" width="400px" src="img/400x400.png" />
                                                                        <?php } else { ?>
                                                                            <img class=" mt-3" width="400px" src="<?php echo '' . BASEURL . '' . $data['product']['photo'] . ''; ?>" />
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                                                                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="<?php echo  $data['product']['name']; ?>" required>

                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Variant" class="form-label fw-bold">Variant</label>
                                                                        <input type="text" class="form-control" id="Variant" name="variant" value="<?php echo $data['product']['variant_name']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <?php
                                                                        // print_r($value); die;
                                                                        ?>
                                                                        <label for="category" class="form-label fw-bold">Kategori</label>
                                                                        <select class="form-select" id="category" name="category" aria-label="Default select example">
                                                                            <?php foreach ($data['category_list'] as $category_list) {  ?>
                                                                                <option value="<?php echo $category_list['category_id']; ?>"><?php echo $category_list['category_name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="stock" class="form-label fw-bold">stock</label>
                                                                        <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="25" value="<?php echo $data['product']['stock_stock']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="harga" class="form-label fw-bold">Harga</label>
                                                                        <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" placeholder="1.000.000" value="<?php echo $data['product']['price']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Deskripsi Produk</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?php echo $data['product']['description']; ?></textarea>
                                                                    </div>

                                                                <?php } ?>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer position-relative">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                    <?php if (!empty($success_add)) { ?>
                                        <?php
                                        // print_r($success_add['message']);
                                        // die;
                                        ?>
                                        <div class="modal fade" id="staticBackdropsuccess" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content text-center">
                                                    <div class="modal-header bg-success text-white d-flex justify-content-center">
                                                        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <i class="fa-solid fa-circle-check fa-4x text-success"></i>
                                                        <p class="mt-3"><?php echo $success_add['message'] ?></p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <a href=""><button type="submit" class="btn btn-outline-danger">Hapus</button></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($success_update)) { ?>
                                        <?php
                                        // print_r($success_update['message']);
                                        // die;
                                        ?>
                                        <div class="modal fade" id="staticBackdropsuccessupdate" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content text-center">
                                                    <div class="modal-header bg-success text-white d-flex justify-content-center">
                                                        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <i class="fa-solid fa-circle-check fa-4x text-success"></i>
                                                        <p class="mt-3"><?php echo $success_update['message'] ?></p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <a href=""><button type="submit" class="btn btn-outline-danger">Hapus</button></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>


                                </td>
                            </tr>
                            <?php $number++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
if (!empty($success_add)) {
?>
    <script>
        $(document).ready(function() {
            $("#staticBackdropsuccess").modal('show')
        })
    </script>
<?php
}
?>

<?php
if (!empty($success_update)) {
?>
    <script>
        $(document).ready(function() {
            $("#staticBackdropsuccessupdate").modal('show')
        })
    </script>
<?php
}
?>

<?= $this->endSection(); ?>