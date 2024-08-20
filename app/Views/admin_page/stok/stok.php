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
                        <?php //print_r($data_get); die;
                        ?>
                        <?php $number = 1; ?>
                        <?php foreach ($data_get['result'] as $key => $value) { ?>
                            <?php $id = $value['id'] ?>
                            <tr>
                                <td><?php echo $number ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['variant_name']; ?></td>
                                <td><?php echo $value['stock']; echo'<br><div class="fw-semibold text-success">stock in:&nbsp;'; echo $value['in'],'</div>';echo'<div class="fw-semibold text-danger">stock out:&nbsp;'; echo $value['out'],'</div> '; ?></td>
                                <td>
                                    <span class="action-btn">
                                        <a href="/admin/stock/update?id=<?php echo $value['id']; ?>" style="padding: 3px 10px;" class="btn btn-primary" type="button">Edit</a>
                                    </span>
                                </td>
                            </tr>
                            <?php $number++; ?>
                            <?php } ?>
                            <!-- <a class="btn btn-danger" style="padding: 3px 10px;" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php //echo $value['id']; ?>">hapus</a> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>