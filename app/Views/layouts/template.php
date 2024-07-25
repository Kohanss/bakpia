<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/reset.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- font Playwrite Deutschland Schulausgangschrift -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+SAS:wght@100..400&display=swap" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $title; ?></title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="transparent-nav">
            <div class="container nav_container">
                <div class="nav_img_left">
                    <img src="/img/logo.png" alt="" style="width: 90px;">
                </div>
                <div class="navbar-header">
                    <i class='bx bxl-whatsapp'></i>
                </div>
                <div class="nav_img_right">
                    <img src="/img/logo.png" alt="" style="width: 90px;">
                </div>
                <div class="navbar_login">
                    <div class="navbar_link" id="nav_link">
                        <ul>
                            <li><a class="navbar_link_btn" href="/">Beranda</a></li>
                            <li><a class="navbar_link_btn" href="/produk?page=1">Produk</a></li>
                            <li><a class="navbar_link_btn" href="/tentang">Tentang</a></li>
                            <li><a class="navbar_link_btn" href="/toko">Toko</a></li>
                        </ul>
                    </div>
                    <div class="navbar_link_icon">
                        <ul>
                            <li><span class="material-symbols-outlined">local_mall</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dropdown_nav" id="myNavbar">
                <div class="container navbar_link_dropdown">
                    <ul>
                        <li><a class="navbar_link_dropdown_btn" href="/">Beranda</a></li>
                        <li><a class="navbar_link_dropdown_btn" href="/produk">Produk</a></li>
                        <li><a class="navbar_link_dropdown_btn" href="/tentang">Tentang</a></li>
                        <li><a class="navbar_link_dropdown_btn" href="/toko">Toko</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // $(document).ready(function() {
        //     $(".navbar_link_btn").click(function() {
        //         $(".navbar_link_btn").removeClass("navbar_link_btn_active");
        //         $(this).addClass("navbar_link_btn_active");
        //         localStorage.setItem('activeNavURL', $(this).attr('href'));
        //     })
        // })

        $(document).ready(function() {
            var currentURL = location.pathname.split('/')[1];
            $('.navbar_link_dropdown_btn').each(function() {
                var linkURL = $(this).attr('href').split('/')[1];

                if (currentURL === linkURL) {
                    $(this).addClass('navbar_link_dropdown_active');
                }
            });
        });

        $(document).ready(function() {
            var currentURL = location.pathname.split('/')[1];
            $('.navbar_link_btn').each(function() {
                var linkURL = $(this).attr('href').split('/')[1];

                if (currentURL === linkURL) {
                    $(this).addClass('navbar_link_btn_active');
                }
            });
        });
    </script>
    <!-- end of navbar -->


    <?= $this->renderSection('content'); ?>


    <!-- footer -->
    <!-- <footer class="footer"> -->
    <a href="" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    <div class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="sub_footer_section">
                        <h3>Griya Bakpia</h3>
                    </div>
                    <div class="sub_footer_section_griyabakpia">
                        <div class="section_griyabakpia">
                            <span class="material-symbols-outlined">call</span>
                            <p> - 08123123123123</p>
                        </div>
                        <div class="section_griyabakpia">
                            <span class="material-symbols-outlined">mail</span>
                            <p> - example@gmail.com</p>
                        </div>
                        <div class="section_griyabakpia">
                            <span class="material-symbols-outlined">location_on</span>
                            <p> - Yogyakarta</p>
                        </div>


                    </div>
                </div>
                <div class="footer-section">
                    <div class="sub_footer_section">
                        <h3>tautan</h3>
                    </div>
                    <div class="sub_footer_section_link">
                        <ul>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Kebijakan Privasi</a></li>
                            <li><a href="#">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-section">
                    <div class="sub_footer_section">
                        <h3>Social Media</h3>
                    </div>
                    <div class="sub_footer_section_sosmed">
                        <div class="sosmed1">
                            <i class='bx bxl-facebook'></i>
                            <p>@example</p>
                        </div>
                        <div class="sosmed1">
                            <i class='bx bxl-instagram'></i>
                            <p>@example</p>
                        </div>
                        <div class="sosmed1">
                            <i class='bx bxl-tiktok'></i>
                            <p>@example</p>
                        </div>
                    </div>
                </div>
                <div class="footer-section-openhour">
                    <div class="sub_footer_section_openhour_text">
                        <h3>Jam Buka Toko</h3>
                    </div>
                    <table class="sub_footer_section_openhour">
                        <tr>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                        <tr>
                            <td>Senin</td>
                            <td>08.00 - 17.00</td>
                        </tr>
                        <tr>
                            <td>Selasa</td>
                            <td>08.00 - 17.00</td>
                        </tr>
                        <tr>
                            <td>Rabu</td>
                            <td>08.00 - 17.00</td>
                        </tr>
                        <tr>
                            <td>Kamis</td>
                            <td>08.00 - 17.00</td>
                        </tr>
                        <tr>
                            <td>Juma'at</td>
                            <td>08.00 - 17.00</td>
                        </tr>
                        <tr>
                            <td>Sabtu</td>
                            <td>08.00 - 17.00</td>
                        </tr>
                        <tr>
                            <td>Minggu</td>
                            <td>08.00 - 17.00</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Griya Bakpia | Designed by team</p>
            </div>
        </div>
    </div>

    <!-- <div class="navbar_link_icon">
        <ul>
            <li><span class="material-symbols-outlined">local_mall</span></li>
        </ul>
    </div> -->
    <!-- </footer> -->
    <!-- end of footer -->



</body>

</html>