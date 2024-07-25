<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<div class="content" style="margin: 56px 0px 0px 250px;">
    <div class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //print_r($data_get); die;
                        ?>
                        <?php $number = 1; ?>
                        <?php foreach ($data_get['result'] as $key => $value) { ?>
                            <tr>
                                <td><?php echo $number ?></td>
                                <td><?php echo $value['product']; ?></td>
                                <td><?php echo $value['category']; ?></td>
                                <td>
                                    <span class="action-btn">
                                        <a href="/admin/produk/edit-form?id=<?php echo $value['id']; ?>" style="padding: 3px 10px;" class="btn btn-primary" type="button">Edit</a>
                                        <a href="" class="btn btn-danger" style="padding: 3px 10px;" type="button">Hapus</a>
                                    </span>
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