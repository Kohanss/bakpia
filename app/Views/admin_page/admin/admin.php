<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->

<div class="content">
    <div class="" >
        <form action="">
            <a href="/admin/produk/add-data" style="padding: 3px 10px;" class="btn btn-primary" type="button">Add Data</a>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class=" table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
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
                                <td><?php echo $value['price']; ?></td>
                                <td>
                                    <span class="action-btn">
                                        <a href="/admin/product/update?id=<?php echo $value['id']; ?>" style="padding: 3px 10px;" class="btn btn-primary" type="button">Edit</a>
                                        <a href="/admin/product/delete?id=<?php echo $value['id']; ?>" class="btn btn-danger" style="padding: 3px 10px;" type="button">Hapus</a>
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