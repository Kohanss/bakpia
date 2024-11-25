<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/histori_pembeli.css">

<div class="container_local table-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Status Pembayaran</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal-container-nomer" id="transactionModal" style="display: none;">
    <div class="modal-nomer">
        <div class="modal-header-nomer">
            <h2>Transaksi Nomor</h2>
        </div>
        <div class="modal-content-nomer">
            <form id="transactionForm">
                <input type="hidden" id="transactionId" name="transactionId" value="">
                <div class="form-group-nomer">
                    <label for="transactionNumber">Masukkan Nomor Transaksi</label>
                    <div id="errorMessage">
                    </div>
                    <input type="number" id="transactionNumber" name="transactionNumber" class="input-nomer" placeholder="Masukkan nomor..." required>
                </div>
        </div>
        <div class="modal-footer-nomer">
            <button class="btn-nomer btn-save-nomer" id="submitTransaction">Submit</button>
            <button type="button" class="btn-nomer btn-cancel-nomer" id="cancelTransaction">Batal</button>
        </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#transactionModal").fadeIn();

        $("#transactionForm").on("submit", function(e) {
            e.preventDefault();

            const transactionNumber = $("#transactionNumber").val();
            const $errorMessage = $("#errorMessage");

            if (transactionNumber.trim() === "") {
                $errorMessage.text("Nomor transaksi tidak boleh kosong!").show();
                return;
            }

            $.ajax({
                url: "<?php base_url() ?>/histori-nomer",
                method: "POST",
                data: {
                    nomer: transactionNumber
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 200) {
                        $("#transactionModal").fadeOut();
                        renderTable(response.result.data);
                        $errorMessage.hide();
                    } else {
                        $errorMessage.text(response.error || "Terjadi kesalahan, coba lagi.").show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    $errorMessage.text("Terjadi kesalahan pada server.").show();
                },
            });
        });

        $("#cancelTransaction").on("click", function() {
            $("#transactionModal").fadeOut();
            $("#errorMessage").hide();
        });
    });

    function renderTable(data) {
        const $tableBody = $(".styled-table tbody");
        $tableBody.empty();

        if (data.length > 0) {
            data.forEach((item) => {
                const row = `
                <tr>
                    <td>${item.customer_name}</td>
                    <td>${item.customer_address}</td>
                    <td class="status ${item.status.toLowerCase()}">${capitalize(item.status)}</td>
                    <td>Rp${formatRupiah(item.price)}</td>
                </tr>
            `;
                $tableBody.append(row);
            });
        } else {
            $tableBody.append(`
            <tr>
                <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>
            </tr>
        `);
        }
    }

    function formatRupiah(angka) {
        return parseInt(angka).toLocaleString("id-ID");
    }

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
    }
</script>


<?= $this->endSection(); ?>