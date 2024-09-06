<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->

<div class="content">
    <div>
        <?php
        // print_r($data_get);
        // die; 
        if (empty($data_get['error'])) {
            $data = $data_get['result']['data'][0];
        } //else { 
        ?>
        <!-- <p>eror</p> -->
        <?php //die; 
        ?>
        <?php //} 
        ?>


        <div class="card mb-6">
            <!-- Account -->
            <div class="card-body pt-0" data-select2-id="12">
                <p class="fs-3" style="margin: 20px 0px -30px; font-weight:500">Account Setting</p>
                <form action="<?= base_url('/admin/account/update'); ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>">
                    <div class="row mt-1 g-5" data-select2-id="11">
                        <div class="col-md-6 fv-plugins-icon-container">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="text" id="fullname" name="fullname" value="<?php echo $data['name'] ?>">
                                <label>Full Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="text" id="email" name="email" value="<?php echo $data['email'] ?>">
                                <label for="email">E-mail</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="<?php echo $data['no_handphone'] ?>">
                                    <label for="phoneNumber">Phone Number</label>
                                </div>
                                <span class="input-group-text">ID (+62)</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" value="<?php echo $data['role'] ?>" disabled>
                                <label for="role">Role</label>
                            </div>
                        </div>
                        <div class="mt-6">
                            <hr>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-floating form-floating-outline">
                                <input class="form-control" type="text" name="username" id="username" value="<?php echo $data['username'] ?>">
                                <label>Username</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $data['password'] ?>">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Save changes</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>