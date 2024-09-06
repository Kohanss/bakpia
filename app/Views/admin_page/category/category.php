<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->

<div class="content">
    <div>
        <a data-bs-toggle="modal" data-bs-target="#staticBackdropaddata" style="padding: 3px 10px;" class="btn btn-primary mb-1" type="button">Add Data</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" table-dark">
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //print_r($data_get); die;
                        ?>
                        <?php $number = 1; ?>
                        <?php foreach ($data_get['result'] as $key => $value) { ?>
                            <?php $id = $value['id'];
                            // print_r($value); die;
                            ?>
                        
                            <tr>
                                <td><?php echo $number ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo '<div class="fw-semibold text-success">Created at:&nbsp;';
                                    echo $value['created_at'], '</div>';
                                    echo '<div class="fw-semibold text-danger">Updated at:&nbsp;';
                                    echo $value['updated_at'], '</div>';  ?></td>
                                <td>
                                    <span class="action-btn d-flex flex-column">
                                        <a type="button" class="btn btn-primary mb-1" style="padding: 3px 10px;" data-bs-toggle="modal" data-bs-target="#example<?php echo $id; ?>">Edit</a>
                                        <a class="btn btn-danger" style="padding: 3px 10px;" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $id; ?>">hapus</a>
                                    </span>

                                    <!-- modal hapus -->
                                    <form action="<?= base_url('/admin/category/delete'); ?>" method="post">
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
                                                        <h5 class="text-danger"></h5>
                                                        <p class="mt-3 mt-0">anda yakin ingin menghapus Kategori <b><?php echo $value['name']; ?></b>?</p>

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
                                    <form action="<?= base_url('/admin/category/add_data'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal fade" id="staticBackdropaddata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <div class="mb-3">
                                                                    <label for="category" class="form-label fw-bold">Nama Kategori</label>
                                                                    <input type="text" class="form-control" id="category" name="category" value="" required>
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

                                    <!-- Modal edit -->
                                    <form action="<?= base_url('/admin/category/update'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                        <div class="modal fade" id="example<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        // $product = $data['product'];
                                                        ?>
                                                        <div class="container">
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <div class="mb-3">
                                                                        <label for="category" class="form-label fw-bold">Nama Kategori</label>
                                                                        <input type="text" class="form-control" id="category" name="category" value="<?php echo $value['name'] ?>" required>
                                                                    </div>
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

<?php if (!empty($success_add)) { ?>
    <?php
    // print_r($success_add['message']);
    // die;
    ?>
    <div class="modal fade" id="staticBackdropsuccessadd" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

<?php
if (!empty($success_add)) {
?>
    <script>
        $(document).ready(function() {
            $("#staticBackdropsuccessadd").modal('show')
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