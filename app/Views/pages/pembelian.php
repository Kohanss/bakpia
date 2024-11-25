<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/pembelian.css">

<div class="container pembungkus">
    <div class="left-section">
        <h1 class="title">Keranjang</h1>
        <div class="checkbox_semua">
            <input type="checkbox" id="selectAll">
            <h2>Semua</h2>
        </div>
        <div id="productContainer">
        </div>
    </div>
    <div class="right-section">
        <div class="summary-card">
            <h1>Ringkasan Belanja</h1>
            <div class="totol_belanja_barang">
                <p>Total belanja:</p><span id="totalItems">0 barang</span>
            </div>
            <hr>
            <div class="totol_harga_barang">
                <p>Total Harga:</p><span id="totalPrice">Rp. 0</span>
            </div>
            <button class="checkout-button" disabled>Beli</button>
        </div>
    </div>
</div>


<div class="modal-container" id="buyerModal" style="display: none;">
    <div class="modal">
        <div class="modal-header">
            <h2>Informasi Pembeli & Produk</h2>
        </div>
        <div class="modal-content">
            <div class="modal-left">
                <div class="form-group">
                    <label for="buyerName">Nama</label>
                    <input type="text" id="buyerName" placeholder="Masukkan nama">
                </div>
                <div class="form-group">
                    <label for="buyerPhone">No HP</label>
                    <input type="text" id="buyerPhone" placeholder="Masukkan no HP">
                </div>
                <div class="form-group">
                    <label for="buyerAddress">Alamat</label>
                    <textarea id="buyerAddress" placeholder="Masukkan alamat"></textarea>
                </div>
            </div>
            <div class="modal-right">
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Varian</th>
                            <th>Kategori</th>
                            <th>Banyak Dus</th>
                        </tr>
                    </thead>
                    <tbody id="modalProductTableBody">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button id="submitOrder" class="btn btn-save">Submit</button>
            <button class="btn btn-cancel" id="closeModal">Batal</button>
        </div>

    </div>
</div>

<div class="modal-container-transaksi" id="transactionModal" style="display: none;">
    <div class="modal-transaksi">
        <div class="modal-header-transaksi">
            <h2>Transaksi Pembayaran</h2>
        </div>
        <div class="modal-content-transaksi">
            <form action="/keranjang/beli/transaksi" method="post" id="transactionForm" enctype="multipart/form-data">
                <input type="hidden" id="transactionId" name="transactionId" value="">

                <div class="form-group-transaksi">
                    <label for="proofOfPayment">Unggah Bukti Pembayaran (Foto)</label>
                    <input type="file" id="proofOfPayment" name="proofOfPayment" accept="image/*" required>
                </div>

                <div class="form-group-transaksi">
                    <label for="bankSelect">Pilih Bank</label>
                    <!-- <div class="bank-list-transaksi">
                        <label>
                            <input type="radio" name="bank" value="bca" required>
                            <img src=""  alt="BCA">
                        </label>
                        <label>
                            <input type="radio" name="bank" value="mandiri" required>
                            <img src="" alt="Mandiri">
                        </label>
                        <label>
                            <input type="radio" name="bank" value="bri" required>
                            <img src="" alt="BRI">
                        </label>
                        <label>
                            <input type="radio" name="bank" value="bni" required>
                            <img src="" alt="BNI">
                        </label>
                        <label>
                            <input type="radio" name="bank" value="cimb" required>
                            <img src="" alt="CIMB Niaga">
                        </label>
                    </div> -->
                </div>
        </div>
        <div class="modal-footer-transaksi">
            <button class="btn-transaksi btn-save-transaksi" id="submitTransaction">Submit</button>
            <button class="btn-transaksi btn-cancel-transaksi" id="cancelTransaction">Batal</button>
        </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        const BASEURL = "<?= BASEURL ?>";
        const $productContainer = $("#productContainer");
        const $totalItems = $("#totalItems");
        const $totalPrice = $("#totalPrice");
        const $checkoutButton = $(".checkout-button");
        const $selectAllCheckbox = $("#selectAll");
        const $buyerModal = $("#buyerModal");
        const $transactionModal = $("#transactionModal"); 
        const $modalProductTableBody = $("#modalProductTableBody");
        const $closeModal = $("#closeModal");
        const $cancelOrder = $("#cancelOrder");

        function loadCart() {
            const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            $productContainer.empty();

            cart.forEach((item, index) => {
                const productCard = `
            <div class="product-card">
                <div class="checkbox">
                    <input type="checkbox" class="select-product" data-index="${index}">
                </div>
                <div class="product-info">
                    <img src="${BASEURL}${item.photo}" alt="${item.name}">
                    <div class="produk_wrapper">
                        <div class="produk">
                            <h2>${item.name}</h2>
                        </div>
                        <div class="produk">
                            <p class="variant">${item.variant_name}</p>
                        </div>
                        <div class="produk">
                            <p class="category">${item.category_name}</p>
                        </div>
                        <div class="produk">
                            <p class="price">Rp. ${item.price.toLocaleString()}</p>
                        </div>
                    </div>
                </div>
                <div class="product-actions">
                    <button class="decrement" data-index="${index}">-</button>
                    <input type="number" value="${item.qty}" min="1" class="quantity" data-index="${index}">
                    <button class="increment" data-index="${index}">+</button>
                    <button class="delete" data-index="${index}">Hapus</button>
                </div>
            </div>
        `;
                $productContainer.append(productCard);
            });

            $(".select-product").each(function() {
                const index = $(this).data("index");
                const checkedState = JSON.parse(sessionStorage.getItem(`checkbox-${index}`)) || false;
                $(this).prop("checked", checkedState);
            });

            syncSelectAllCheckbox();
            updateSummary();
        }

        function updateSummary() {
            const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            let totalItems = 0;
            let totalPrice = 0;

            $(".select-product:checked").each(function() {
                const index = $(this).data("index");
                const item = cart[index];
                totalItems += item.qty;
                totalPrice += item.qty * item.price;
            });

            $totalItems.text(`${totalItems} barang`);
            $totalPrice.text(`Rp. ${totalPrice.toLocaleString()}`);
            $checkoutButton.prop("disabled", totalItems === 0);
        }

        function syncSelectAllCheckbox() {
            const allCheckboxes = $(".select-product");
            const checkedCheckboxes = $(".select-product:checked");
            $selectAllCheckbox.prop("checked", allCheckboxes.length > 0 && allCheckboxes.length === checkedCheckboxes.length);
        }

        $productContainer.on("change", ".select-product", function() {
            const index = $(this).data("index");
            sessionStorage.setItem(`checkbox-${index}`, $(this).prop("checked"));
            updateSummary();
            syncSelectAllCheckbox();
        });

        $selectAllCheckbox.on("change", function() {
            const isChecked = $(this).prop("checked");
            $(".select-product").prop("checked", isChecked).each(function() {
                const index = $(this).data("index");
                sessionStorage.setItem(`checkbox-${index}`, isChecked);
            });
            updateSummary();
        });

        $productContainer.on("click", ".increment", function() {
            const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const index = $(this).data("index");

            cart[index].qty++;
            sessionStorage.setItem("cart", JSON.stringify(cart));

            const checkbox = $(`.select-product[data-index="${index}"]`);
            if (checkbox.length && checkbox.prop("checked")) {
                sessionStorage.setItem(`checkbox-${index}`, true);
            }

            loadCart();
        });

        $productContainer.on("click", ".decrement", function() {
            const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const index = $(this).data("index");

            cart[index].qty = Math.max(1, cart[index].qty - 1);
            sessionStorage.setItem("cart", JSON.stringify(cart));

            const checkbox = $(`.select-product[data-index="${index}"]`);
            if (checkbox.length && checkbox.prop("checked")) {
                sessionStorage.setItem(`checkbox-${index}`, true);
            }

            loadCart();
        });

        $productContainer.on("input", ".quantity", function() {
            const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const index = $(this).data("index");
            const value = parseInt($(this).val());

            cart[index].qty = Math.max(1, isNaN(value) ? 1 : value);
            sessionStorage.setItem("cart", JSON.stringify(cart));

            const checkbox = $(`.select-product[data-index="${index}"]`);
            if (checkbox.length && checkbox.prop("checked")) {
                sessionStorage.setItem(`checkbox-${index}`, true);
            }

            loadCart();
        });

        $productContainer.on("click", ".delete", function() {
            const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const index = $(this).data("index");

            cart.splice(index, 1);
            sessionStorage.setItem("cart", JSON.stringify(cart));
            sessionStorage.removeItem(`checkbox-${index}`);

            loadCart();
        });

        function populateModalTable() {
            const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            $modalProductTableBody.empty();

            $(".select-product:checked").each(function() {
                const index = $(this).data("index");
                const item = cart[index];

                const tableRow = `
            <tr>
                <td>${item.name}</td>
                <td>${item.variant_name}</td>
                <td>${item.category_name}</td>
                <td>${item.qty}</td>
            </tr>
        `;
                $modalProductTableBody.append(tableRow);
            });
        }

        $checkoutButton.on("click", function() {
            populateModalTable();
            $buyerModal.fadeIn();
        });

        $closeModal.on("click", function() {
            $buyerModal.fadeOut();
        });

        $cancelOrder.on("click", function() {
            $buyerModal.fadeOut();
        });

        $(document).on("click", function(e) {
            if ($(e.target).is($buyerModal)) {
                $buyerModal.fadeOut();
            }
        });

        $("#submitOrder").on("click", function() {
            const buyerName = $("#buyerName").val().trim();
            const buyerPhone = $("#buyerPhone").val().trim();
            const buyerAddress = $("#buyerAddress").val().trim();

            if (!buyerName || !buyerPhone || !buyerAddress) {
                alert("Harap lengkapi semua informasi pembeli.");
                return;
            }

            const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const selectedProducts = [];

            $(".select-product:checked").each(function() {
                const index = $(this).data("index");
                const item = cart[index];

                selectedProducts.push({
                    product_id: item.id,
                    product_quantity: item.qty,
                });
            });

            if (selectedProducts.length === 0) {
                alert("Tidak ada produk yang dipilih.");
                return;
            }

            const requestData = {
                product: selectedProducts,
                customer: {
                    name: buyerName,
                    no_handphone: buyerPhone,
                    address: buyerAddress,
                },
            };

            $.ajax({
                url: "<?php echo base_url() ?>/keranjang/beli",
                method: "POST",
                contentType: "application/json",
                data: JSON.stringify(requestData),
                success: function(response) {
                    console.log(response);

                    const orderId = response?.result?.data?.customer_data?.id;

                    if (orderId) {
                        document.cookie = `order_id=${orderId}; path=/; max-age=7200`;
                        $("#transactionId").val(orderId);

                        $buyerModal.fadeOut(() => {
                            $transactionModal.fadeIn();
                        });
                    } else {
                        alert("Pesanan berhasil dikirim, namun ID orderan tidak ditemukan.");
                    }

                    sessionStorage.removeItem("cart");
                    sessionStorage.clear();
                    loadCart();
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat memproses pesanan.");
                },
            });
        });

        $("#cancelTransaction").on("click", function() {
            $transactionModal.fadeOut();
        });

        loadCart();
    });
</script>
<?= $this->endSection(); ?>