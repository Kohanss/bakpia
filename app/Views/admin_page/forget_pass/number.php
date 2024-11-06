<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/number.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Lupa Password</title>
</head>

<body>
    <div class="bgimg"></div>
    <div class="form">
        <div class="form_wrapper">
            <h2 class="text-center">Lupa Password?</h2>
            <form id="myform" action="/no-hp" method="post">
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Nomer Telepon</label>
                    <input name="no_handphone" type="number" id="phoneNumber" class="form-control" required>
                    <div id="emailHelp" class="form-text">Otp akan di kirim setelah anda memasukkan nomer telepon anda</div>
                    <div id="response">
                        <p class="mb-0"><?php if (!empty($message)) {
                                echo $message;
                            } ?></p>
                    </div> <!-- Tempat untuk menampilkan respon -->
                    <a href="/login" >Kembali ke Login</a>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // let globalMessage; // Variabel global untuk menyimpan pesan

        // $(document).ready(function() {
        //     $('#myform').on('submit', function(event) {
        //         event.preventDefault();

        //         var noHandphone = $('#phoneNumber').val();

        //         var formData = new FormData();
        //         formData.append("no_handphone", noHandphone);

        //         $.ajax({
        //             url: "<?php echo base_url('/no-hp') ?>",
        //             method: "POST",
        //             processData: false,
        //             contentType: false,
        //             data: formData,
        //             success: function(response) {
        //                 console.log(response);
        //                 if (response.message === "Pesan terkirim") {
        //                     globalMessage = response.message; // Simpan pesan ke variabel global
        //                     $('#response').html(`
        //                 <p>${response.message}</p>
        //             `);
        //                 } else {
        //                     $('#response').html(`
        //                 <p>Error: ${response.error || 'Terjadi kesalahan'}</p>
        //             `);
        //                 }
        //             },
        //             error: function(jqXHR, textStatus, errorThrown) {
        //                 $('#response').html(`
        //             <p>Error: ${textStatus}</p>
        //             <p>Detail: ${errorThrown}</p>
        //         `);
        //             }
        //         });
        //     });

        //     // Anda bisa mengakses globalMessage di sini setelah AJAX selesai
        //     // Misalnya, menampilkan pesan di elemen lain
        //     $('#showMessageButton').on('click', function() {
        //         if (globalMessage) {
        //             alert(globalMessage); // Menampilkan pesan di alert
        //         } else {
        //             alert('Tidak ada pesan yang tersedia.');
        //         }
        //     });
        // });
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>