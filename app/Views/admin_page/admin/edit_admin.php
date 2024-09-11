<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->

<div class="content">
    <div>
        <form>
            <a href="/admin/produk/add-data" style="padding: 3px 10px;" class="btn btn-primary mb-1" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropaddata">Add Data</a>
        </form>
        <?php
        // print_r($data_get);
        // die; 
        ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Role</th>
                            <!-- <th>Date</th> -->
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
                            // print_r($data); die;
                            ?>
                            <tr>
                                <td><?php echo $number ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['no_handphone']; ?></td>
                                <!-- <td class="<?php //if ($data['status'] == 'pending') {
                                                //echo 'text-primary fs-5 fw-semibold';
                                                //  } else {
                                                // echo 'text-success fs-5 fw-semibold';
                                                // } 
                                                ?>"><?php //echo $data['status']; 
                                                    ?></td> -->
                                <td><?php echo $data['role']; ?></td>
                                <td>
                                    <span class="action-btn d-flex flex-column gap-2">
                                        <!-- <a href="/admin/type/update?id=<?php //echo $value['id']; 
                                                                            ?>" style="padding: 3px 10px;" class="btn btn-primary" type="button">Accept</a> -->
                                        <a class="btn btn-primary" style="padding: 3px 10px;" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropedit<?php echo $data['id']; ?>">Edit</a>
                                        <a class="btn btn-danger" style="padding: 3px 10px;" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropcancel<?php echo $data['id']; ?>">Delete</a>
                                    </span>
                                    <form action="<?= base_url('/admin/account/delete'); ?>" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                                        <div class="modal fade" id="staticBackdropcancel<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        hapus akun ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <a href=""><button type="submit" class="btn btn-danger">Hapus</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/admin/account/update2'); ?>" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
                                        <div class="modal fade" id="staticBackdropedit<?php echo $data['id']; ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        // print_r($data); die;
                                                        // $product = $data['product'];
                                                        ?>
                                                    </div>
                                                    <div class="container">
                                                        <?php //print_r($id); die; 
                                                        ?>
                                                        <?php
                                                        // print_r($error_update);
                                                        // die; 
                                                        ?>
                                                        <?php if (!empty($error_update) && ($id == $data['id'])) { ?>
                                                            <?php // if ($id == $data['id']) { 
                                                            ?>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <div class="d-flex flex-column">
                                                                    <label class="form-label" for="email">Nama</label>
                                                                    <?php if (!empty($error_update['name'])) { ?>
                                                                        <label class="text-danger" style="margin-top: -10px;"> <?php echo $error_update['name'] ?> *</label>
                                                                    <?php } ?>
                                                                </div>
                                                                <input type="text" name="fullname" id="nama" class="form-control" value="<?= $data['name']; ?>" />
                                                            </div>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <div class="d-flex flex-column">
                                                                    <label class="form-label" for="email">Email</label>
                                                                    <?php if (!empty($error_update['email'])) { ?>
                                                                        <label class="text-danger" style="margin-top: -10px;"> <?php echo $error_update['email'] ?> *</label>
                                                                    <?php } ?>
                                                                </div>
                                                                <input type="text" name="email" id="email" class="form-control" value="<?= $data['email']; ?>" />
                                                            </div>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <div class="d-flex flex-column">
                                                                    <label class="form-label" for="Nomer">Nomer</label>
                                                                    <?php if (!empty($error_update['no_handphone'])) { ?>
                                                                        <label class="text-danger" style="margin-top: -10px;"> <?php echo $error_update['no_handphone'] ?> *</label>
                                                                    <?php } ?>
                                                                </div>
                                                                <input type="number" name="phoneNumber" id="Nomer" class="form-control" value="<?= $data['no_handphone']; ?>" />
                                                            </div>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <div class="d-flex flex-column">
                                                                    <label class="form-label" for="username">Username</label>
                                                                    <?php if (!empty($error_update['username'])) { ?>
                                                                        <label class="text-danger" style="margin-top: -10px;"> <?php echo $error_update['username'] ?> *</label>
                                                                    <?php } ?>
                                                                </div>
                                                                <input type="username" name="username" id="username" class="form-control" value="<?= $data['username']; ?>" />
                                                            </div>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <div class="d-flex flex-column">
                                                                    <label class="form-label" for="password">Password</label>
                                                                    <?php if (!empty($error_update['password'])) { ?>
                                                                        <label class="text-danger" style="margin-top: -10px;"> <?php echo $error_update['password'] ?> *</label>
                                                                    <?php } ?>
                                                                </div>
                                                                <input type="text" name="password" id="password" class="form-control" value="<?= $data['password']; ?>" />
                                                            </div>
                                                            <?php // } 
                                                            ?>
                                                        <?php } else { ?>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <label class="form-label" for="nama">Nama</label>
                                                                <input type="text" name="fullname" id="nama" class="form-control" value="<?= $data['name']; ?>" />
                                                            </div>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <label class="form-label" for="email">Email</label>
                                                                <input type="text" name="email" id="email" class="form-control" value="<?= $data['email']; ?>" />
                                                            </div>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <label class="form-label" for="Nomer">Nomer</label>
                                                                <input type="number" name="phoneNumber" id="Nomer" class="form-control" value="<?= $data['no_handphone']; ?>" />
                                                            </div>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <label class="form-label" for="username">Username</label>
                                                                <input type="username" name="username" id="username" class="form-control" value="<?= $data['username']; ?>" />
                                                            </div>
                                                            <div data-mdb-input-init class="form-outline mb-3">
                                                                <label class="form-label" for="password">Password</label>
                                                                <input type="text" name="password" id="password" class="form-control" value="<?= $data['password']; ?>" />
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="modal-footer position-relative">
                                                        <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                    <form action="<?= base_url('/admin/account/regist'); ?>" method="post">
                                        <input type="hidden" name="id" id="id" value="">
                                        <div class="modal fade" id="staticBackdropaddata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit</h1>
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
                                                                    <div class="d-flex flex-column">
                                                                        <label class="form-label" for="email">Nama</label>
                                                                        <?php if (!empty($error['name'])) { ?>
                                                                            <label class="text-danger" style="margin-top: -10px;"> <?php echo $error['name'] ?> *</label>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <input type="text" name="fullname" id="nama" class="form-control" value="" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <div class="d-flex flex-column">
                                                                        <label class="form-label" for="email">Email</label>
                                                                        <?php if (!empty($error['email'])) { ?>
                                                                            <label class="text-danger" style="margin-top: -10px;"> <?php echo $error['email'] ?> *</label>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <input type="text" name="email" id="email" class="form-control" value="" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <div class="d-flex flex-column">
                                                                        <label class="form-label" for="Nomer">Nomer</label>
                                                                        <?php if (!empty($error['no_handphone'])) { ?>
                                                                            <label class="text-danger" style="margin-top: -10px;"> <?php echo $error['no_handphone'] ?> *</label>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <input type="number" name="phoneNumber" id="Nomer" class="form-control" value="" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <div class="d-flex flex-column">
                                                                        <label class="form-label" for="username">Username</label>
                                                                        <?php if (!empty($error['username'])) { ?>
                                                                            <label class="text-danger" style="margin-top: -10px;"> <?php echo $error['username'] ?> *</label>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <input type="username" name="username" id="username" class="form-control" value="" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <div class="d-flex flex-column">
                                                                        <label class="form-label" for="password">Password</label>
                                                                        <?php if (!empty($error['password'])) { ?>
                                                                            <label class="text-danger" style="margin-top: -10px;"> <?php echo $error['password'] ?> *</label>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <input type="text" name="password" id="password" class="form-control" value="" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <div class="d-flex flex-column">
                                                                        <label class="form-label" for="confirm">confirm</label>
                                                                        <?php if (!empty($error['confirm'])) { ?>
                                                                            <label class="text-danger" style="margin-top: -10px;"> <?php echo $error['confirm'] ?> *</label>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <input type="text" name="confirm" id="confirm" class="form-control" value="" />
                                                                </div>
                                                            <?php } else { ?>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <label class="form-label" for="nama">Nama</label>
                                                                    <input type="text" name="fullname" id="nama" class="form-control" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <label class="form-label" for="email">Email</label>
                                                                    <input type="text" name="email" id="email" class="form-control" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <label class="form-label" for="Nomer">Nomer</label>
                                                                    <input type="number" name="phoneNumber" id="Nomer" class="form-control" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <label class="form-label" for="username">Username</label>
                                                                    <input type="username" name="username" id="username" class="form-control" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <label class="form-label" for="password">Password</label>
                                                                    <input type="text" name="password" id="password" class="form-control" />
                                                                </div>
                                                                <div data-mdb-input-init class="form-outline mb-3">
                                                                    <label class="form-label" for="confirm">Confirm</label>
                                                                    <input type="text" name="confirm" id="confirm" class="form-control" />
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

                                    <?php if (!empty($message_regist)) { ?>
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
                                                        <p class="mt-3"><?php echo $message_regist ?></p>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <a href=""><button type="submit" class="btn btn-outline-danger">Hapus</button></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($message_update)) { ?>
                                        <?php
                                        // print_r($success_add['message']);
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
                                                        <p class="mt-3"><?php echo $message_update ?></p>
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
if (!empty($id)) {
    // print_r($id);
    // die;
?>
    <script>
        $(document).ready(function() {
            $("#staticBackdropedit<?php echo $id ?>").modal('show')
        })
    </script>
<?php
}
?>
<?php
if (!empty($error)) {
?>
    <script>
        $(document).ready(function() {
            $("#staticBackdropaddata").modal('show')
        })
    </script>
<?php
}
?>
<?php
if (!empty($message_regist)) {
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
if (!empty($message_update)) {
?>
    <script>
        $(document).ready(function() {
            $("#staticBackdropsuccessupdate").modal('show')
        })
    </script>
<?php
}
?>

<script>
    var form = new FormData();
    var settings = {
        "url": "http://10.10.0.9/e-commerce/public/listpublic/product",
        "method": "GET",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function(response) {
        console.log(response);
    });
</script>

<?= $this->endSection(); ?>