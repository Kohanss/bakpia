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
    <!-- font popins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- font jakarta -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><? //echo $title; 
            ?></title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="transparent-nav">
            <div class="container_local nav_container">
                <div class="nav_img_left">
                    <a href=""><img src="/img/logo.png" alt="" style="width: 95px;"></a>
                </div>
                <div class="hamburger">
                    <button id="hamburger_btn"><span class="material-symbols-outlined">menu</span></button>
                </div>
                <div class="nav_img_right">
                    <a href=""><img src="/img/logo.png" alt="" style="width: 90px;"></a>
                </div>
                <div class="navbar_link" id="nav_link">
                    <ul>
                        <li><a class="navbar_link_btn" href="/">Beranda</a></li>
                        <li><a class="navbar_link_btn" href="/produk">Produk</a></li>
                        <li><a class="navbar_link_btn" href="/tentang">Tentang</a></li>
                        <li><a class="navbar_link_btn" href="/toko">Toko</a></li>
                    </ul>
                </div>
                <div class="navbar_kecil">
                    <div class="navbar_link_icon">
                        <ul>
                            <li><span class="material-symbols-outlined">local_mall</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- <div class="dropdown_nav" id="myNavbar">
                <div class="search_bawah">
                    <form action=" ">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div> -->
        </div>

        <div class="backround_fade_sidebar_kiri"></div>
        <div class="sidebar_kiri">
            <div class="wrapper_sidebar_kiri">
                <div class="close"><button id="closebtnkiri" class="closebtnkiri"></button></div>
                <img src="/img/logo.png" alt="" style="width: 90px;">
                <hr>
                <ul>
                    <div class="sidebar_icon">
                        <span class="material-symbols-outlined">home</span>
                        <li><a class="sidebar_kiri_btn" href="/">Beranda</a></li>
                    </div>
                    <div class="sidebar_icon">
                        <span class="material-symbols-outlined">shopping_cart</span>
                        <li><a class="sidebar_kiri_btn" href="/produk">Produk</a></li>
                    </div>
                    <div class="sidebar_icon">
                        <span class="material-symbols-outlined">info</span>
                        <li><a class="sidebar_kiri_btn" href="/tentang">Tentang</a></li>
                    </div>
                    <div class="sidebar_icon">
                        <span class="material-symbols-outlined">home</span>
                        <li><a class="sidebar_kiri_btn" href="/toko">Toko</a></li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <script src="/js/template-depan.js"></script>
    <!-- end of navbar -->


    <?= $this->renderSection('content'); ?>


    <!-- footer -->
    <a href="" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <footer>
        <div class="full_screen_footer">
            <div class="container_local container_footer">
                <div class="top_footer">
                    <p class="title_footer">Griya Bakpia</p>
                    <div class="alamat_footer">
                        <span class="material-symbols-outlined">location_on</span>
                        <p>Jalan Sunan Kudus Ds. Geblagan RT. 01 No 8, Tamantirto, Kecamatan Kasihan, Kabupaten Bantul, Kota Yogyakarta</p>
                    </div>
                    <div class="email_footer">
                        <span class="material-symbols-outlined">mail</span>
                        <p>griyabakpia@gmail.com</p>
                    </div>
                    <div class="call_footer">
                        <span class="material-symbols-outlined">call</span>
                        <p>+62 8123456789</p>
                    </div>
                    <div class="sosmed_footer">
                        <a href=""><i class='bx bxl-facebook-circle'></i></a>
                        <a href=""><img src="/img/ig1.png" alt=""></a>
                        <a href=""><i class='bx bxl-tiktok'></i></a>
                    </div>
                </div>
                <div class="middle_footer">
                    <ul class="navigasi_middle_footer">
                        <li>
                            <h1>Link Cepat</h1>
                        </li>
                        <li><a href="">Produk</a></li>
                        <li><a href="">Beranda</a></li>
                        <li><a href="">Tentang</a></li>
                        <li><a href="">Toko</a></li>
                    </ul>
                    <ul class="policy_middle_footer">
                        <li>
                            <h1>Kebijakan</h1>
                        </li>
                        <li><a href="">Syarat dan Ketentuan</a></li>
                        <li><a href="">Kebijakan Pengiriman</a></li>
                        <li><a href="">Kebijakan Pengembalian</a></li>
                        <li><a href="">Kebijakan Privasi Pembeli</a></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                    <div class="jam_buka_footer">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hari</th>
                                    <th>Jam Buka</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Senin</td>
                                    <td>08:00 - 17:00</td>
                                </tr>
                                <tr>
                                    <td>Selasa</td>
                                    <td>08:00 - 17:00</td>
                                </tr>
                                <tr>
                                    <td>Rabu</td>
                                    <td>08:00 - 17:00</td>
                                </tr>
                                <tr>
                                    <td>Kamis</td>
                                    <td>08:00 - 17:00</td>
                                </tr>
                                <tr>
                                    <td>Jumat</td>
                                    <td>08:00 - 17:00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container_local bottom_footer">
                <p>Copyright 2024 © PT Griya Bakpia</p>
            </div>
        </div>
    </footer>
    <!-- end of footer -->



</body>

</html>