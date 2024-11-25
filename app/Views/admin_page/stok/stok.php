<?= $this->extend('layouts/admin_template'); ?>


<?= $this->section('content_admin'); ?>
<!-- table -->

<div class="content">
    <div class="topper d-flex justify-content-between mb-1">
        <div class="select d-flex align-items-center">
            <h6 class="me-2">Show</h6>
            <select class="form-select select-limit" id="limitSelect">
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
            </select>
        </div>
        <div class="search">
            <form id="searchStockForm" class="d-flex align-items-center">
                <input type="text" class="form-control form-search me-2" id="searchInput" placeholder="Search">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Variant</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="stockTable">
                    <tr>
                        <td colspan="5" class="text-center">No data available</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <nav>
        <ul class="pagination" id="pagination"></ul>
    </nav>
</div>


<!-- Add Stock Modal -->
<div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalLabel">Add Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addStockForm">
                    <input type="hidden" id="addStockId" name="id">
                    <div class="mb-3">
                        <label for="addStockValue" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="addStockValue" name="value" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reduce Stock Modal -->
<div class="modal fade" id="reduceStockModal" tabindex="-1" aria-labelledby="reduceStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reduceStockModalLabel">Reduce Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reduceStockForm">
                    <input type="hidden" id="reduceStockId" name="id">
                    <div class="mb-3">
                        <label for="reduceStockValue" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="reduceStockValue" name="value" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Stock Modal -->
<div class="modal fade" id="updateStockModal" tabindex="-1" aria-labelledby="updateStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStockModalLabel">Update Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateStockForm">
                    <input type="hidden" id="updateStockId" name="id">
                    <div class="mb-3">
                        <label for="updateStockValue" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="updateStockValue" name="stock" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function fetchStockData(page = 1) {
        const limit = $("#limitSelect").val();
        const search = $("#searchInput").val();

        $.ajax({
            url: "<?= base_url('/stock-get') ?>",
            method: "GET",
            data: {
                page: page,
                limit: limit,
                search: search
            },
            success: function(response) {
                console.log(response)
                renderTable(response.result.data);
                renderPagination(response.result.pagination, page);
            },
            error: function(xhr) {
                console.error("Error fetching stock data:", xhr.responseText);
            }
        });
    }

    function renderTable(data) {
        const tableBody = $("#stockTable");
        tableBody.empty();

        if (data.length > 0) {
            data.forEach((item, index) => {
                tableBody.append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.variant_name}</td>
                    <td>
                        ${item.stock_stock}
                        <div class="fw-semibold text-success">In: ${item.stock_in}</div>
                        <div class="fw-semibold text-danger">Out: ${item.stock_out}</div>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm add-stock" 
                            data-id="${item.id}" 
                            data-bs-toggle="modal" 
                            data-bs-target="#addStockModal">
                            Add Stock
                        </button>
                        <button class="btn btn-danger btn-sm reduce-stock" 
                            data-id="${item.id}" 
                            data-bs-toggle="modal" 
                            data-bs-target="#reduceStockModal">
                            Reduce Stock
                        </button>
                        <button class="btn btn-warning btn-sm update-stock" 
                            data-id="${item.id}" 
                            data-stock="${item.stock_stock}" 
                            data-bs-toggle="modal" 
                            data-bs-target="#updateStockModal">
                            Update Stock
                        </button>
                    </td>
                </tr>
            `);
            });
        } else {
            tableBody.append('<tr><td colspan="5" class="text-center">No data available</td></tr>');
        }
    }

    function renderPagination(pagination, currentPage) {
        const paginationElement = $("#pagination");
        paginationElement.empty();

        if (pagination.total_page > 1) {
            paginationElement.append(`
            <li class="page-item ${!pagination.prev ? "disabled" : ""}">
                <a class="page-link" href="#" data-page="${pagination.prev || 1}">Previous</a>
            </li>
        `);

            pagination.detail.forEach(page => {
                paginationElement.append(`
                <li class="page-item ${page === currentPage ? "active" : ""}">
                    <a class="page-link" href="#" data-page="${page}">${page}</a>
                </li>
            `);
            });

            paginationElement.append(`
            <li class="page-item ${!pagination.next ? "disabled" : ""}">
                <a class="page-link" href="#" data-page="${pagination.next || pagination.total_page}">Next</a>
            </li>
        `);
        }
    }

    $(document).ready(function() {
        fetchStockData();

        $("#searchStockForm").on("submit", function(e) {
            e.preventDefault();
            fetchStockData();
        });

        $("#limitSelect").on("change", function() {
            fetchStockData();
        });

        $(document).on("click", "#pagination .page-link", function(e) {
            e.preventDefault();
            const page = $(this).data("page");
            if (page) fetchStockData(page);
        });

        // Add Stock
        $("#addStockForm").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: "<?= base_url('/admin/stock/add') ?>",
                method: "POST",
                data: formData,
                success: function(response) {
                    if (!response.error) {
                        $("#addStockModal").modal("hide");
                        fetchStockData();
                    }
                },
                error: function(xhr) {
                    console.error("Add stock error:", xhr.responseText);
                }
            });
        });

        // Reduce Stock
        $("#reduceStockForm").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: "<?= base_url('/admin/stock/reduce') ?>",
                method: "POST",
                data: formData,
                success: function(response) {
                    if (!response.error) {
                        $("#reduceStockModal").modal("hide");
                        fetchStockData();
                    }
                },
                error: function(xhr) {
                    console.error("Reduce stock error:", xhr.responseText);
                }
            });
        });

        // Update Stock
        $("#updateStockForm").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: "<?= base_url('/admin/stock/update') ?>",
                method: "POST",
                data: formData,
                success: function(response) {
                    if (!response.error) {
                        $("#updateStockModal").modal("hide");
                        fetchStockData();
                    }
                },
                error: function(xhr) {
                    console.error("Update stock error:", xhr.responseText);
                }
            });
        });

        // Modal Trigger Setups
        $(document).on("click", ".add-stock", function() {
            const id = $(this).data("id");
            $("#addStockId").val(id);
        });

        $(document).on("click", ".reduce-stock", function() {
            const id = $(this).data("id");
            $("#reduceStockId").val(id);
        });

        $(document).on("click", ".update-stock", function() {
            const id = $(this).data("id");
            const stock = $(this).data("stock");
            $("#updateStockId").val(id);
            $("#updateStockValue").val(stock);
        });
    });
</script>
<?= $this->endSection(); ?>