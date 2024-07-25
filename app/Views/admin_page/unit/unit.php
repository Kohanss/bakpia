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



<!-- <div class="" id="responsive_table_active">
    <div class="container responsive_table">
        <h2>Unit</h2>
        <hr />
        <div class="table_select">
            <div class="select_data">
                <h3>Show</h3>
                <select name="data_show" id="data_show">
                    <option value="volvo">15</option>
                    <option value="saab">25</option>
                    <option value="opel">30</option>
                    <option value="audi">40</option>
                </select>
                <button id="button_tambah"><a href="">Add Data</a></button>
            </div>
            <div class="search">
                <h3>search:</h3>
                <input type="text" />
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php //$number = 1; 
                ?>
                <?php //foreach ($data_get['result'] as  $value) { 
                ?>
                    <tr>
                        <td><?php //echo $number 
                            ?></td>
                        <td><?php //echo $value['unit']; 
                            ?></td>
                        <td>
                            <span class="action-btn">
                                <a href="" id="edit_btn" class="edit_button">Edit</a>
                                <a href="" id="hapus" class="hapus_button">Hapus</a>
                            </span>
                        </td>
                    </tr>
                    <?php //$number++; 
                    ?>
                <?php //} 
                ?>
            </tbody>
        </table>
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a class="pagination_active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">&raquo;</a>
        </div>
    </div>
</div> -->







<!-- <div class="modal_hapus" id="modal_hapus">
    <div class="sub_modal_hapus">
        <h3>Apakah anda yakin ingin <i style="font-weight: 700">menghapus</i></h3>
        <a href="#" class="btn btn-danger">Ya</a>
        <a href="#" class="btn btn-primary">Tidak</a>
    </div>
</div> -->

<!-- <div class="modal_edit" id="modal_edit">
    <div class="sub_modal_edit" id="edit-content" style="height: 300px;">
        <a href="" class="silang">&times;</a>
        <h2>Edit Produk</h2>
        <div class="field_input">
            <label for="">Edit Unit</label>
            <div class="input">
                <input type="text" />
            </div>
        </div>
        <div class="btn_edit">
            <button>input</button>
        </div>
    </div>
</div> -->

<!-- <div class="modal_tambah" id="modal_tambah">
    <div class="sub_modal_tambah" id="tambah-content" style="height: 300px;">
        <a href="" class="silang">&times;</a>
        <h2>Tambah Produk</h2>
        <div class="field_input">
            <label for="">New Unit</label>
            <div class="input">
                <input type="text" />
            </div>
        </div>
        <div class="btn_tambah">
            <button>input</button>
        </div>
    </div>
</div> -->



<?= $this->endSection(); ?>