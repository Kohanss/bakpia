<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->
<style>
    :root {
        --bs-blue: #0d6efd;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #dc3545;
        --bs-orange: #fd7e14;
        --bs-yellow: #ffc107;
        --bs-green: #198754;
        --bs-teal: #20c997;
        --bs-cyan: #0dcaf0;
        --bs-black: #000;
        --bs-white: #fff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-gray-100: #f8f9fa;
        --bs-gray-200: #e9ecef;
        --bs-gray-300: #dee2e6;
        --bs-gray-400: #ced4da;
        --bs-gray-500: #adb5bd;
        --bs-gray-600: #6c757d;
        --bs-gray-700: #495057;
        --bs-gray-800: #343a40;
        --bs-gray-900: #212529;
        --bs-primary: #0d6efd;
        --bs-secondary: #6c757d;
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-primary-rgb: 13, 110, 253;
        --bs-secondary-rgb: 108, 117, 125;
        --bs-success-rgb: 25, 135, 84;
        --bs-info-rgb: 13, 202, 240;
        --bs-warning-rgb: 255, 193, 7;
        --bs-danger-rgb: 220, 53, 69;
        --bs-light-rgb: 248, 249, 250;
        --bs-dark-rgb: 33, 37, 41;
        --bs-primary-text-emphasis: #052c65;
        --bs-secondary-text-emphasis: #2b2f32;
        --bs-success-text-emphasis: #0a3622;
        --bs-info-text-emphasis: #055160;
        --bs-warning-text-emphasis: #664d03;
        --bs-danger-text-emphasis: #58151c;
        --bs-light-text-emphasis: #495057;
        --bs-dark-text-emphasis: #495057;
        --bs-primary-bg-subtle: #cfe2ff;
        --bs-secondary-bg-subtle: #e2e3e5;
        --bs-success-bg-subtle: #d1e7dd;
        --bs-info-bg-subtle: #cff4fc;
        --bs-warning-bg-subtle: #fff3cd;
        --bs-danger-bg-subtle: #f8d7da;
        --bs-light-bg-subtle: #fcfcfd;
        --bs-dark-bg-subtle: #ced4da;
        --bs-primary-border-subtle: #9ec5fe;
        --bs-secondary-border-subtle: #c4c8cb;
        --bs-success-border-subtle: #a3cfbb;
        --bs-info-border-subtle: #9eeaf9;
        --bs-warning-border-subtle: #ffe69c;
        --bs-danger-border-subtle: #f1aeb5;
        --bs-light-border-subtle: #e9ecef;
        --bs-dark-border-subtle: #adb5bd;
        --bs-white-rgb: 255, 255, 255;
        --bs-black-rgb: 0, 0, 0;
        --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
        --bs-body-color: #212529;
        --bs-body-color-rgb: 33, 37, 41;
        --bs-body-bg: #fff;
        --bs-body-bg-rgb: 255, 255, 255;
        --bs-emphasis-color: #000;
        --bs-emphasis-color-rgb: 0, 0, 0;
        --bs-secondary-color: rgba(33, 37, 41, 0.75);
        --bs-secondary-color-rgb: 33, 37, 41;
        --bs-secondary-bg: #e9ecef;
        --bs-secondary-bg-rgb: 233, 236, 239;
        --bs-tertiary-color: rgba(33, 37, 41, 0.5);
        --bs-tertiary-color-rgb: 33, 37, 41;
        --bs-tertiary-bg: #f8f9fa;
        --bs-tertiary-bg-rgb: 248, 249, 250;
        --bs-heading-color: inherit;
        --bs-link-color: #0d6efd;
        --bs-link-color-rgb: 13, 110, 253;
        --bs-link-decoration: underline;
        --bs-link-hover-color: #0a58ca;
        --bs-link-hover-color-rgb: 10, 88, 202;
        --bs-code-color: #d63384;
        --bs-highlight-color: #212529;
        --bs-highlight-bg: #fff3cd;
        --bs-border-width: 1px;
        --bs-border-style: solid;
        --bs-border-color: #dee2e6;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
        --bs-border-radius: 0.375rem;
        --bs-border-radius-sm: 0.25rem;
        --bs-border-radius-lg: 0.5rem;
        --bs-border-radius-xl: 1rem;
        --bs-border-radius-xxl: 2rem;
        --bs-border-radius-2xl: var(--bs-border-radius-xxl);
        --bs-border-radius-pill: 50rem;
        --bs-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        --bs-box-shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        --bs-box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        --bs-box-shadow-inset: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        --bs-focus-ring-width: 0.25rem;
        --bs-focus-ring-opacity: 0.25;
        --bs-focus-ring-color: rgba(13, 110, 253, 0.25);
        --bs-form-valid-color: #198754;
        --bs-form-valid-border-color: #198754;
        --bs-form-invalid-color: #dc3545;
        --bs-form-invalid-border-color: #dc3545;
    }

    .fontbawah {
        margin-top: -15px;
        width: 100%;
        /* margin-left: 10px; */
    }
</style>
<div class="content">
    <div class="">
        <form action="">
            <a href="/transaction_history" style="padding: 3px 10px;" class="btn btn-primary" type="button">History</a>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Number</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // print_r($data_get); die;
                        ?>
                        <?php $number = 1; ?>
                        <?php foreach ($data_get['result']['data'] as $key => $data) { ?>
                            <?php
                            // print_r($data); die; 
                            $value = $data['order'];
                            ?>
                            <tr>
                                <td><?php echo $number ?></td>
                                <td><?php echo $value['customer_name']; ?></td>
                                <td><?php echo $value['price']; ?></td>
                                <td class="<?php if ($value['status'] == 'pending') {
                                                echo 'text-primary fs-5 fw-semibold';
                                            } else {
                                                echo 'text-success fs-5 fw-semibold';
                                            } ?>"><?php echo $value['status']; ?></td>
                                <td><?php echo $value['customer_no_handphone']; ?></td>
                                <td><?php echo $value['customer_address']; ?></td>
                                <td><?php echo $value['date']; ?></td>
                                <td><img style="width: 150px;" src="<?php $url = '' . BASEURL . '';
                                                                    echo '' . $url . '' . $value['proof'] . ''; ?>"></td>
                                <td>
                                    <span class="action-btn d-flex flex-column gap-2">
                                        <!-- <a href="/admin/type/update?id=<?php //echo $value['id']; 
                                                                            ?>" style="padding: 3px 10px;" class="btn btn-primary" type="button">Accept</a> -->
                                        <a class="btn btn-success" style="padding: 3px 10px;" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropaccept<?php echo $value['id']; ?>">Detail</a>
                                        <a class="btn btn-danger" style="padding: 3px 10px;" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropcancel<?php echo $value['id']; ?>">Cancel</a>
                                    </span>
                                    <form action="<?= base_url('/admin/transaction/delete'); ?>" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $value['id']; ?>">
                                        <div class="modal fade" id="staticBackdropcancel<?php echo $value['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cancel</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        tolak pembayaran ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <a href=""><button type="submit" class="btn btn-danger">Cancle</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <form action="<?= base_url('/admin/transaction/accept'); ?>" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $value['id']; ?>">
                                        <div class="modal fade" id="staticBackdropaccept<?php echo $value['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-xl">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Accept</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body d-flex">
                                                        <?php
                                                        // print_r($data);
                                                        // $product = $data['product'];
                                                        ?>
                                                        <div>
                                                            <div class="mb-3 container">
                                                                <p class="fontatas fs-4" style="font-weight: 500; ">Customer Data</p>
                                                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                            </div>
                                                            <div class="mb-3 container">
                                                                <p class="fontatas fs-5" style="font-weight: 400; ">Name</p>
                                                                <div class="bawah">
                                                                    <p class="fontbawah"><?= $value['customer_name']; ?></p>
                                                                </div>
                                                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                            </div>
                                                            <div class="mb-3 container">
                                                                <p class="fontatas fs-5" style="font-weight: 400; ">Address</p>
                                                                <div class="bawah">
                                                                    <p class="fontbawah"><?= $value['customer_address']; ?></p>
                                                                </div>
                                                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                            </div>
                                                            <div class="mb-3 container">
                                                                <p class="fontatas fs-5" style="font-weight: 400; ">Number</p>
                                                                <div class="bawah">
                                                                    <p class="fontbawah"><?= $value['customer_no_handphone']; ?></p>
                                                                </div>
                                                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                            </div>
                                                            <div class="mb-3 container">
                                                                <p class="fontatas fs-5" style="font-weight: 400; ">Status</p>
                                                                <div class="bawah">
                                                                    <p class="fontbawah"><?= $value['status']; ?></p>
                                                                </div>
                                                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                            </div>
                                                            <div class="mb-3 container">
                                                                <p class="fontatas fs-5" style="font-weight: 400; ">Price</p>
                                                                <div class="bawah">
                                                                    <p class="fontbawah"><?= $value['price']; ?></p>
                                                                </div>
                                                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                            </div>
                                                            <div class="mb-3 container">
                                                                <p class="fontatas fs-5" style="font-weight: 400; ">Date</p>
                                                                <div class="bawah">
                                                                    <p class="fontbawah"><?= $value['date']; ?></p>
                                                                </div>
                                                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                            </div>
                                                            <hr>
                                                            <hr>
                                                        </div>

                                                        <div class="mb-3 container">
                                                            <p class="fontatas fs-4" style="font-weight: 500; ">Product Order</p>
                                                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                        </div>
                                                        <?php foreach ($data['product'] as $key => $product) { ?>
                                                            <div class="d-flex flex-column">
                                                                <div class="mb-3 container">
                                                                    <p class="fontatas fs-5" style="font-weight: 400; ">Product</p>
                                                                    <div class="bawah">
                                                                        <p class="fontbawah"><?= $product['product_name']; ?></p>
                                                                    </div>
                                                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                                </div>
                                                                <div class="mb-3 container">
                                                                    <p class="fontatas fs-5" style="font-weight: 400; ">Variant</p>
                                                                    <div class="bawah">
                                                                        <p class="fontbawah"><?= $product['product_variant']; ?></p>
                                                                    </div>
                                                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                                </div>
                                                                <div class="mb-3 container">
                                                                    <p class="fontatas fs-5" style="font-weight: 400; ">Category</p>
                                                                    <div class="bawah">
                                                                        <p class="fontbawah"><?= $product['product_category']; ?></p>
                                                                    </div>
                                                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                                </div>
                                                                <div class="mb-3 container">
                                                                    <p class="fontatas fs-5" style="font-weight: 400; ">Isi Bakpia</p>
                                                                    <div class="bawah">
                                                                        <p class="fontbawah"><?= $product['product_box']; ?></p>
                                                                    </div>
                                                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                                </div>
                                                                <div class="mb-3 container">
                                                                    <p class="fontatas fs-5" style="font-weight: 400; ">Banyaknya Dus</p>
                                                                    <div class="bawah">
                                                                        <p class="fontbawah"><?= $product['quantity']; ?></p>
                                                                    </div>
                                                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                                </div>
                                                                <div class="mb-3 container">
                                                                    <p class="fontatas fs-5" style="font-weight: 400; ">Harga</p>
                                                                    <div class="bawah">
                                                                        <p class="fontbawah"><?= $product['price']; ?></p>
                                                                    </div>
                                                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Accept</button>
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

<?= $this->endSection(); ?>