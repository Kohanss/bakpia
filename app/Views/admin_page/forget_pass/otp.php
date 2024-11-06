<!DOCTYPE html>
<html lang="en">

<?php
// print_r($expired); die;
if (!empty($expired)) {
    date_default_timezone_set('Asia/Jakarta');
    $expiredTimestamp = strtotime($expired);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/otp.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Lupa Password</title>
</head>

<body>
    <div class="bgimg"></div>
    <div class="form">
        <div class="form_wrapper">
            <h2 class="text-center">OTP</h2>
            <form id="myform" action="/otp" method="post">
                <div class="mb-3">
                    <label for="otp" class="form-label">Masukkan Otp</label>
                    <input name="otp" type="number" id="otp" class="form-control" required>
                    <div id="emailHelp" class="form-text mb-0">Masukkan kode otp anda 6 digit</div>
                    <div id="response">
                        <p class="mb-0"><?php if (!empty($error)) {
                                            echo $error;
                                        } ?></p>
                    </div> <!-- Tempat untuk menampilkan respon -->
                    <div id="countdown" class="text-left">
                        <span id="countdown-timer"><?php echo floor(($expiredTimestamp - time()) / 60) . ":" . str_pad(($expiredTimestamp - time()) % 60, 2, "0", STR_PAD_LEFT); ?></span>
                    </div> <!-- Tempat untuk menampilkan countdown -->
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Ambil waktu expired dari PHP
            var expiredTimestamp = <?php echo $expiredTimestamp * 1000; ?>; // Mengonversi ke milidetik

            // Fungsi untuk memperbarui countdown
            function updateCountdown() {
                var now = new Date().getTime(); // Waktu saat ini dalam milidetik
                var timeDifference = expiredTimestamp - now; // Selisih waktu

                // Hitung menit dan detik
                var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                // Tampilkan countdown
                $("#countdown-timer").text(minutes + ":" + (seconds < 10 ? "0" + seconds : seconds));

                // Jika waktu habis
                if (timeDifference < 0) {
                    clearInterval(countdownInterval); // Hentikan interval
                    $("#countdown-timer").text("0:00"); // Tampilkan pesan expired
                }
            }

            // Update countdown setiap detik
            var countdownInterval = setInterval(updateCountdown, 1000);
        });


        // $(document).ready(function() {
        //     $('#myform').on('submit', function(event) {
        //         event.preventDefault(); 

        //         var otp = $('#otp').val();

        //         var formData = new FormData();
        //         formData.append("otp", otp);

        //         $.ajax({
        //             url: "<?php echo base_url('/otp') ?>",
        //             method: "POST",
        //             processData: false,
        //             contentType: false,
        //             data: formData,
        //             success: function(response) {
        //                 console.log(response)
        //                 $('#response').html(`
        //                     <p>${response.error}</p>
        //                 `);
        //             },
        //             error: function(jqXHR, textStatus, errorThrown) {
        //                 $('#response').html(`
        //                     <p>Error: ${textStatus}</p>
        //                     <p>Detail: ${errorThrown}</p>
        //                 `);
        //             }
        //         });
        //     });
        // });
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>