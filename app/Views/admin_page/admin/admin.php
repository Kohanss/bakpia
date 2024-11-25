<?= $this->extend('layouts/admin_template'); ?>

<?= $this->section('content_admin'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>/css/admin-css/produk-admin.css?v1.<?php echo time(); ?>" />

<div class="content">
    <div class="topper d-flex justify-content-between mb-1">
        <div class="select d-flex align-items-center">
            <button data-bs-toggle="modal" data-bs-target="#addData" class="btn btn-primary btn_add" type="button">
                <i class="fa-solid fa-circle-plus fs-4 mt-1"></i><i class=""></i>
            </button>
            <h6 class="ms-3">Show</h6>
            <select class="form-select select-limit ms-1" id="limitSelect">
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
            </select>
        </div>
        <div class="search">
            <form id="search_product" class="d-flex align-items-center">
                <input type="text" class="form-control form-search" id="searchInput" placeholder="Search">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped overflow-auto">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Name</th>
                        <th>Variant</th>
                        <th>Category</th>
                        <th>Time</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tabel">
                </tbody>
            </table>
        </div>
    </div>
    <nav class="d-flex">
        <ul class="pagination" id="pagination">
        </ul>
    </nav>

</div>


<!-- modal success -->
<div class="modal fade" id="staticBackdropsuccess" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content text-center">
            <div class="modal-header bg-success text-white d-flex justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i class="fa-solid fa-circle-check fa-4x text-success"></i>
                <p class="mt-3"></p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah -->
<form method="post" id="addForm" enctype="multipart/form-data">
    <div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div data-mdb-input-init class="form-outline mb-3">
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="customFile">Gambar</label>
                                <input type="file" class="form-control" id="customFile" name="image" accept="image/png, image/gif, image/jpeg, image/jpg" onchange="document.getElementById('foto_tambah').src = window.URL.createObjectURL(this.files[0])" />
                                <img class="mt-3" id="foto_tambah" alt="your image" width="430px" src="/img/400x400.png" />
                            </div>
                            <div class="mb-3">
                                <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                                <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="variant" class="form-label fw-bold">variant</label>
                                <select class="form-select" id="variant" name="variant" aria-label="Default select example">
                                    <?php
                                    foreach ($variant['data'] as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label fw-bold">category</label>
                                <select class="form-select" id="category" name="category" aria-label="Default select example">
                                    <?php
                                    foreach ($category['data'] as $key => $value) { ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label fw-bold">stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" autocomplete="off" placeholder="25" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label fw-bold">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" placeholder="1.000.000" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label fw-bold">Deskripsi Produk</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
</form>

<script>
    function showSuccessModal(message, delay = 500) {
        $('#staticBackdropsuccess').find('.modal-body p').text(message);

        setTimeout(function() {
            $('#staticBackdropsuccess').modal('show');
        }, delay);
    }


    // preview img
    function previewImage(event, id) {
        const file = event.target.files[0];
        const preview = document.getElementById(`imagePreview${id}`);
        console.log(preview)
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = 'img/400x400.png';
        }
    }

    // Render data in table
    function renderTable(data, category, variant) {
        $("#tabel").empty();
        // Check if data exists
        if (data && data.length > 0) {
            $.each(data, function(index, value) {
                let categoryOptions = '';
                $.each(category, function(i, category) {
                    const selected = category.name === value.category_name ? 'selected' : '';
                    categoryOptions += `<option value="${category.id}" ${selected}>${category.name}</option>`;
                });

                let variantOptions = '';
                $.each(variant, function(i, variant) {
                    const selected = variant.name === value.variant_name ? 'selected' : '';
                    variantOptions += `<option value="${variant.id}" ${selected}>${variant.name}</option>`;
                });
                $("#tabel").append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td><img class="mt-3" width="50px" src="<?php echo BASEURL; ?>${value.photo}" /></td>
                        <td><div style="width: 100px";>${value.name}</div></td>
                        <td>${value.variant_name}</td>
                        <td>${value.category_name}</td>
                        <td>
                            <div class="fw-semibold text-success" style="width: 230px;">Created at:&nbsp; ${value.created_at}</div> 
                            <div class="fw-semibold text-danger">Updated at:&nbsp; ${value.updated_at}</div>
                        </td>
                        <td>${value.price}</td>
                        <td><div style="width:300px; max-height:200px; overflow:auto">${value.description}</div></td>
                        <td>
                            <span class="action-btn d-flex justify-content-around">
                                <!-- Edit button -->
                                <a type="button" data-bs-toggle="modal" data-bs-target="#editModal${value.id}">
                                    <i style="font-size: 18px; color: #0d6efd; margin-right: 10px" class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <!-- Delete button triggers delete modal -->
                                <a type="button" data-bs-toggle="modal" data-bs-target="#deleteModal${value.id}">
                                    <span style="font-size: 24px; color: #dc3545;" class="material-symbols-outlined">delete</span>
                                </a>
                            </span>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal${value.id}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel${value.id}" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content text-center">
                                        <div class="modal-header bg-danger text-white d-flex justify-content-center">
                                            <h5 class="modal-title" id="deleteModalLabel${value.id}">Are you sure?</h5>
                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <i class="fas fa-times fa-3x text-danger"></i>
                                            <p class="mt-3">Are you sure you want to delete this product?</p>
                                            <!-- Hidden input with unique ID for each product -->
                                            <input type="hidden" id="deleteProductId${value.id}" value="${value.id}">
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                            <button type="button" class="btn btn-outline-danger confirmDeleteBtn" data-id="${value.id}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- Edit Modal -->
                        <form id="updateForm${value.id}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="${value.id}">
                            <div class="modal fade" id="editModal${value.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div data-mdb-input-init class="form-outline mb-3">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold" for="customFile${value.id}">Gambar Saat ini</label>
                                                        <input type="file" class="form-control" id="customFile${value.id}" name="image" accept="image/png, image/gif, image/jpeg, image/jpg" onchange="previewImage(event, ${value.id})" />
                                                        <img class="mt-3" width="430px" id="imagePreview${value.id}" src="<?php echo BASEURL; ?>${value.photo}" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="namaProduk" class="form-label fw-bold">Nama Produk</label>
                                                        <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="${value.name}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="variant" class="form-label fw-bold">Variant</label>
                                                        <select class="form-select" id="variant" name="variant" aria-label="Default select example">
                                                            ${variantOptions}
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="category" class="form-label fw-bold">Kategori</label>
                                                        <select class="form-select" id="category" name="category" aria-label="Default select example">
                                                            ${categoryOptions}
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harga" class="form-label fw-bold">Harga</label>
                                                        <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" placeholder="1.000.000" value="${value.price}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Deskripsi Produk</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">${value.description}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary confirmEditBtn">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </td>
                    </tr>
                `);
            });
        } else {
            $("#tabel").append('<tr><td colspan="10">No data available</td></tr>');
        }
    }

    // Render pagination
    function renderPagination(pagination, currentPage) {
        $("#pagination").empty();

        if (!pagination || pagination.total_page <= 1) return;

        $("#pagination").append(`
        <li class="page-item ${pagination.prev === null ? "disabled" : ""}">
            <a class="page-link" href="#" data-page="${pagination.prev || 1}">Previous</a>
        </li>
    `);

        pagination.detail.forEach(page => {
            $("#pagination").append(`
            <li class="page-item ${page == currentPage ? "active" : ""}">
                <a class="page-link" href="#" data-page="${page}">${page}</a>
            </li>
        `);
        });

        $("#pagination").append(`
        <li class="page-item ${pagination.next === null ? "disabled" : ""}">
            <a class="page-link" href="#" data-page="${pagination.next || pagination.total_page}">Next</a>
        </li>
    `);
    }



    function fetchData(page = 1) {
        const query = $("#searchInput").val();
        const limit = $("#limitSelect").val();

        $.ajax({
            url: "<?php echo base_url('/admin_get') ?>",
            method: "GET",
            dataType: "json",
            data: {
                search: query,
                page: page,
                limit: limit
            },
            success: function(response) {
                console.log(response)
                renderTable(response.data, response.category, response.variant);
                renderPagination(response.pagination, page);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error fetching data: ", textStatus, errorThrown);
            }
        });
    }


    $(document).ready(function() {
        fetchData();

        $("#search_product").on("submit", function(e) {
            e.preventDefault();
            fetchData();
        });

        $("#limitSelect").on("change", function() {
            fetchData();
        });

        $(document).on("click", "#pagination .page-link", function(e) {
            e.preventDefault();
            const page = $(this).data("page");
            if (page) {
                fetchData(page);
            }
        });
    });

    // DELETE MODAL
    $(document).on('click', '.confirmDeleteBtn', function() {
        const productId = $(this).data('id');
        $.ajax({
            url: "<?php echo base_url('/admin/product/delete'); ?>",
            method: "POST",
            data: {
                id: productId
            },
            dataType: "json",
            success: function(response) {
                if (!response.error) {
                    $(`#deleteModal${productId}`).modal('hide');
                    fetchData();
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.error("AJAX Error:", error);
                alert("Failed to delete the product.");
            }
        });
    });

    // EDIT MODAL
    $(document).on('submit', 'form[id^="updateForm"]', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const productId = formData.get('id');

        $.ajax({
            url: "<?php echo base_url('/admin/product/update'); ?>",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if (response.error) {
                    alert("Error: " + response.message);
                } else {
                    $('#editModal' + productId).modal('hide');
                    showSuccessModal(response.message || "Product updated successfully", 500);
                    fetchData();
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.error("AJAX Error:", error);
                alert("Failed to update the product.");
            }
        });
    });

    // ADD MODAL
    $(document).on('submit', '#addForm', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: "<?php echo base_url('/admin/produk/add-data'); ?>",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if (response.error) {
                    alert("Error: " + response.message);
                } else {
                    $('#addData').modal('hide');
                    $('#addForm')[0].reset();
                    $('#foto_tambah').attr('src', '/img/400x400.png');
                    showSuccessModal(response.message || "Product added successfully", 500);
                    fetchData();
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.error("AJAX Error:", error);
                alert("Failed to add the product.");
            }
        });
    });
</script>

<?= $this->endSection(); ?>