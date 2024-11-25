<?= $this->extend('layouts/admin_template'); ?>

<?= $this->section('content_admin'); ?>

<style>
    .btn_add {
        padding: 3px 10px;
    }
</style>

<div class="content">
    <div class="topper d-flex justify-content-between mb-1">
        <div class="select d-flex align-items-center">
            <button data-bs-toggle="modal" data-bs-target="#addDataModal" class="btn btn-primary btn_add" type="button">
                <i class="fa-solid fa-circle-plus fs-4 mt-1"></i>
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped overflow-auto">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <td colspan="5" class="text-center">No Data Available</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="staticBackdropsuccess" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content text-center">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Success</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i class="fa-solid fa-circle-check fa-4x text-success"></i>
                <p class="mt-3"></p>
            </div>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<form id="addCategoryForm">
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Edit Category Modal -->
<form id="editCategoryForm">
    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editCategoryId" name="id">
                    <div class="mb-3">
                        <label for="editCategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="editCategoryName" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category?</p>
                <input type="hidden" id="deleteCategoryId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirmDeleteCategory">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showSuccessModal(message) {
        const $modal = $('#staticBackdropsuccess');
        $modal.find('.modal-body p').text(message);
        $modal.modal('show');
        setTimeout(() => $modal.modal('hide'), 3000);
    }

    function renderTable(data) {
        const $tableBody = $("#tableBody");
        $tableBody.empty();

        if (data.length > 0) {
            data.forEach((item, index) => {
                $tableBody.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.name}</td>
                        <td>${item.created_at || '-'}</td>
                        <td>${item.updated_at || '-'}</td>
                        <td>
                            <button class="btn btn-sm editCategory" 
                                data-id="${item.id}" 
                                data-name="${item.name}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editDataModal">
                                <i style="font-size: 18px; color: #0d6efd; margin-right: 10px" class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-sm deleteCategory" 
                                data-id="${item.id}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal">
                                <span style="font-size: 24px; color: #dc3545;" class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                `);
            });
        } else {
            $tableBody.append(`<tr><td colspan="5" class="text-center">No Data Available</td></tr>`);
        }
    }

    function fetchData() {
        $.ajax({
            url: "<?= base_url('/category-get') ?>",
            method: "GET",
            success: function(response) {
                renderTable(response.data);
            },
            error: function(xhr) {
                console.error("Fetch data error: ", xhr.responseText);
            }
        });
    }

    $(document).ready(function() {
        fetchData();

        // Add Category Form Submission
        $("#addCategoryForm").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: "<?= base_url('/admin/category/add_data') ?>",
                method: "POST",
                data: formData,
                success: function(response) {
                    if (!response.error) {
                        $("#addDataModal").modal("hide");
                        fetchData();
                        showSuccessModal(response.message || "Category added successfully!");
                        $("#addCategoryForm")[0].reset();
                    } else {
                        console.error(response.message || "Failed to add category.");
                    }
                },
                error: function(xhr) {
                    console.error("Add category error: ", xhr.responseText);
                }
            });
        });

        // Open Edit Modal and Populate Data
        $(document).on("click", ".editCategory", function() {
            const id = $(this).data("id");
            const name = $(this).data("name");

            $("#editCategoryId").val(id);
            $("#editCategoryName").val(name);
        });

        // Edit Category Form Submission
        $("#editCategoryForm").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: "<?= base_url('/admin/category/update') ?>",
                method: "POST",
                data: formData,
                success: function(response) {
                    if (!response.error) {
                        $("#editDataModal").modal("hide");
                        fetchData();
                        showSuccessModal(response.message || "Category updated successfully!");
                    } else {
                        console.error(response.message || "Failed to update category.");
                    }
                },
                error: function(xhr) {
                    console.error("Edit category error: ", xhr.responseText);
                }
            });
        });

        // Open Delete Modal
        $(document).on("click", ".deleteCategory", function() {
            const id = $(this).data("id");
            $("#deleteCategoryId").val(id);
        });

        // Delete Category
        $(document).on("click", ".confirmDeleteCategory", function() {
            const id = $("#deleteCategoryId").val();

            $.ajax({
                url: "<?= base_url('/admin/category/delete') ?>",
                method: "POST",
                data: {
                    id
                },
                success: function(response) {
                    if (!response.error) {
                        $("#deleteModal").modal("hide");
                        fetchData();
                        showSuccessModal(response.message || "Category deleted successfully!");
                    } else {
                        console.error(response.message || "Failed to delete category.");
                    }
                },
                error: function(xhr) {
                    console.error("Delete category error: ", xhr.responseText);
                }
            });
        });
    });
</script>


<?= $this->endSection(); ?>