<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->

<div class="content">
    <div class="">
        <!-- <form action="">
            <a href="/admin/produk/add-data" style="padding: 3px 10px;" class="btn btn-primary" type="button">Add Data</a>
        </form> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Variant</th>
                            <th>stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //print_r($data_get); die;
                        ?>
                        <?php $number = 1; ?>
                        <?php foreach ($data_get['result'] as $key => $value) { ?>
                            <?php
                            $id = $value['id'];
                            // print_r($value); die;
                            ?>
                            <tr>
                                <td><?php echo $number ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['variant_name']; ?></td>
                                <td><?php echo $value['stock_stock'];
                                    echo '<br><div class="fw-semibold text-success">stock in:&nbsp;';
                                    echo $value['stock_in'], '</div>';
                                    echo '<div class="fw-semibold text-danger">stock out:&nbsp;';
                                    echo $value['stock_out'], '</div> '; ?></td>
                                <td>
                                    <span class="action-btn">
                                        <a type="button" class="btn btn-primary mb-1" style="padding: 3px 10px;" data-bs-toggle="modal" data-bs-target="#example<?php echo $id; ?>">Edit</a>
                                    </span>

                                    <!-- Modal edit -->
                                    <form action="<?= base_url('/admin/stock/update'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                        <div class="modal fade" id="example<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <div class="mb-3">
                                                                    <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                                                                    <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="<?php echo $value['name']; ?>" disabled>
                                                                    <input type="hidden" class="form-control" id="Variant" name="variant" value="<?php echo $value['variant_name']; ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="Variant" class="form-label fw-bold">Variant</label>
                                                                    <input type="text" class="form-control" id="Variant" name="variant" value="<?php echo $value['variant_name']; ?>" disabled>
                                                                    <input type="hidden" class="form-control" id="Variant" name="variant" value="<?php echo $value['variant_name']; ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="stock" class="form-label fw-bold">stock</label>
                                                                    <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="25" value="<?php echo $value['stock_stock']; ?>" required>
                                                                </div>
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
                                    <?php if (!empty($messege)) { ?>
                                        <?php
                                        //  print_r($messege);
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
                                                        <p class="mt-3"><?php echo $messege ?></p>
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
if (!empty($messege)) {
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