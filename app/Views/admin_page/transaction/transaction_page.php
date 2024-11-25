<?= $this->extend('layouts/admin_template'); ?>

<?= $this->section('content_admin'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/css/admin-css/transaksi_page.css?v1.<?php echo time(); ?>" />

<div class="content">
    <div class="topper d-flex justify-content-between mb-1">
        <div class="select d-flex align-items-center">
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
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Proof</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tabel">
                    <tr>
                        <td colspan="9" class="text-center">No Data</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <nav class="d-flex">
        <ul class="pagination" id="pagination"></ul>
    </nav>
</div>

<div class="modal fade" id="staticBackdropaccept" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Transaksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fs-4">Pesanan Produk</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Varian</th>
                            <th>Kategori</th>
                            <th>Harga (per dus)</th>
                            <th>Jumlah Dus</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data produk akan dirender di sini -->
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <p class="fs-4">Total Harga:</p>
                    <p class="fs-5 total-price">Rp0</p>
                </div>
            </div>
            <div class="modal-footer">
                <button id="rejectTransactionBtn" type="button" class="btn btn-danger">Tolak</button>
                <button id="acceptTransactionBtn" type="button" class="btn btn-success">Terima</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function formatRupiah(angka) {
        if (!angka) return "Rp0";
        return parseInt(angka).toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR",
        });
    }

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
    }

    function renderTable(data) {
        const $tableBody = $("#tabel");
        $tableBody.empty();

        if (data && data.length > 0) {
            data.forEach((item, index) => {
                const proofImage = `<img src="<?= BASEURL ?>/${item.proof}" alt="Proof" width="50px">`;
                const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.customer_name}</td>
                    <td>${formatRupiah(item.price)}</td>
                    <td class="${item.status.toLowerCase()}">${capitalize(item.status)}</td>
                    <td>${item.customer_no_handphone}</td>
                    <td>${item.customer_address}</td>
                    <td>${item.date}</td>
                    <td>${proofImage}</td>
                    <td>
                        <button class="btn view-details-btn" 
                            data-id="${item.id}" 
                            data-bs-toggle="modal" 
                            data-bs-target="#staticBackdropaccept">
                             <i style="font-size: 18px; color: #0d6efd; margin-right: 10px" class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                </tr>
            `;
                $tableBody.append(row);
            });
        } else {
            $tableBody.append(`
            <tr>
                <td colspan="9" class="text-center">No data available</td>
            </tr>
        `);
        }
    }

    function fetchTransactionDetails(transactionId) {
        const $modal = $("#staticBackdropaccept");
        const $tableBody = $modal.find("tbody");
        const $totalPriceElement = $modal.find(".total-price");

        $tableBody.empty();
        $totalPriceElement.text("Rp0");

        $.ajax({
            url: "<?= base_url('/transaction-detil') ?>",
            method: "GET",
            data: {
                id: transactionId
            },
            success: function(response) {
                if (!response.error) {
                    const orderData = response.result.data;
                    let totalPrice = 0;

                    orderData.forEach((item, index) => {
                        const total = item.quantity * item.price;
                        totalPrice += total;

                        const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.product_name}</td>
                            <td>${item.product_variant}</td>
                            <td>${item.product_category}</td>
                            <td>${formatRupiah(item.price)}</td>
                            <td>${item.quantity}</td>
                            <td>${formatRupiah(total)}</td>
                        </tr>
                    `;
                        $tableBody.append(row);
                    });

                    $totalPriceElement.text(formatRupiah(totalPrice));

                    $("#acceptTransactionBtn").data("id", transactionId);
                    $("#rejectTransactionBtn").data("id", transactionId);
                } else {
                    alert(response.message || "Failed to fetch order details.");
                }
            },
            error: function(xhr) {
                console.error("Fetch details error:", xhr.responseText);
                alert("Failed to fetch order details.");
            },
        });
    }

    function fetchData(page = 1) {
        const query = $("#searchInput").val();
        const limit = $("#limitSelect").val();

        $.ajax({
            url: "<?= base_url('/transaction-get') ?>",
            method: "GET",
            data: {
                page,
                limit,
                search: query
            },
            dataType: "json",
            success: function(response) {
                
                if (!response.error) {
                    renderTable(response.result.data);
                    renderPagination(response.result.pagination, page);
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                console.error("Fetch data error:", xhr.responseText);
                alert("Failed to fetch data.");
            },
        });
    }

    function renderPagination(pagination, currentPage) {
        const $pagination = $("#pagination");
        $pagination.empty();

        if (!pagination || pagination.total_page <= 1) return;

        $pagination.append(`
        <li class="page-item ${!pagination.prev ? "disabled" : ""}">
            <a class="page-link" href="#" data-page="${pagination.prev || 1}">Previous</a>
        </li>
    `);

        pagination.detail.forEach((page) => {
            $pagination.append(`
            <li class="page-item ${page === currentPage ? "active" : ""}">
                <a class="page-link" href="#" data-page="${page}">${page}</a>
            </li>
        `);
        });

        $pagination.append(`
        <li class="page-item ${!pagination.next ? "disabled" : ""}">
            <a class="page-link" href="#" data-page="${pagination.next || pagination.total_page}">Next</a>
        </li>
    `);
    }

    $(document).on("click", "#acceptTransactionBtn", function() {
        const transactionId = $(this).data("id");

        $.ajax({
            url: "<?= base_url('/admin/transaction/accept') ?>",
            method: "POST",
            data: {
                id: transactionId
            },
            success: function(response) {
                console.log(response)
                if (!response.error) {
                    alert("Order accepted successfully.");
                    $("#staticBackdropaccept").modal("hide");
                    fetchData();
                } else {
                    alert(response.message || "Failed to accept order.");
                }
            },
            error: function(xhr) {
                console.error("Accept error:", xhr.responseText);
                alert("Failed to accept order.");
            },
        });
    });

    $(document).on("click", "#rejectTransactionBtn", function() {
        const transactionId = $(this).data("id");

        $.ajax({
            url: "<?= base_url('/admin/transaction/delete') ?>",
            method: "POST",
            data: {
                id: transactionId
            },
            success: function(response) {
                if (!response.error) {
                    alert("Order rejected successfully.");
                    $("#staticBackdropaccept").modal("hide");
                    fetchData();
                } else {
                    alert(response.message || "Failed to reject order.");
                }
            },
            error: function(xhr) {
                console.error("Reject error:", xhr.responseText);
                alert("Failed to reject order.");
            },
        });
    });

    $(document).on("click", ".view-details-btn", function() {
        const transactionId = $(this).data("id");
        fetchTransactionDetails(transactionId);
    });

    $(document).ready(function() {
        fetchData();

        $(document).on("click", "#pagination .page-link", function(e) {
            e.preventDefault();
            const page = $(this).data("page");
            if (page) fetchData(page);
        });

        $("#search_product").on("submit", function(e) {
            e.preventDefault();
            fetchData();
        });

        $("#limitSelect").on("change", function() {
            fetchData();
        });
    });
</script>

<?= $this->endSection(); ?>