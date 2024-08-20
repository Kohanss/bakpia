<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->

<div class="content">
    <div class="">
        <form action="">
            <a href="/admin/produk/add-data" style="padding: 3px 10px;" class="btn btn-primary" type="button">Add Data</a>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Time</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // print_r($data_get); die;
                        ?>
                        <?php $number = 1; ?>
                        <?php foreach ($data_get['result'] as $key => $value) { ?>
                            <?php $id = $value['id'] ?>
                            <tr>
                                <td><?php echo $number ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['variant_name']; ?></td>
                                <td><?php echo $value['category_name']; ?></td>
                                <td><?php echo $value['stock_stock']; echo'<br><div class="fw-semibold text-success">stock in:&nbsp;'; echo $value['stock_in'],'</div>';echo'<div class="fw-semibold text-danger">stock out:&nbsp;'; echo $value['stock_out'],'</div> '; ?></td>
                                <td><?php echo'<div class="fw-semibold text-success">Created at:&nbsp;'; echo $value['created_at'],'</div>';
                                echo'<div class="fw-semibold text-danger">Updated at:&nbsp;'; echo $value['updated_at'],'</div>';  ?></td>
                                <td><?php echo $value['price']; ?></td> 
                                <td>
                                    <span class="action-btn d-flex flex-column">
                                        <a href="/admin/product/update?id=<?php echo $value['id']; ?>" style="padding: 3px 10px;" class="btn btn-primary mb-1" type="button">Edit</a>
                                        <a class="btn btn-danger" style="padding: 3px 10px;" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $value['id']; ?>">hapus</a>
                                    </span>
                                    <form action="<?= base_url('/admin/product/delete'); ?>" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $value['id']; ?>">
                                        <div class="modal fade" id="staticBackdrop<?php echo $value['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <a href=""><button type="submit" class="btn btn-primary">Hapus</button></a>
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