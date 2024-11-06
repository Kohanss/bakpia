<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>
<?php
// $pagination = [
//     "jumlah_data" => 6,
//     "jumlah_page" => 5,
//     "page" => "1",
//     "page_sebelumnya" => null,
//     "page_selanjutnya" => 2
// ] 
// print_r($data_get);
// die;
?>
<link rel="stylesheet" href="/css/produk.css">
<!-- swiper js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<div class="container_local slider">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide_photo"><img src="/img/bakpia-keju.jpg" alt=""></div>
            <div class="swiper-slide slide_photo"><img src="/img/bakpia-keju.jpg" alt=""></div>
            <div class="swiper-slide slide_photo"><img src="/img/bakpia-keju.jpg" alt=""></div>
            <div class="swiper-slide slide_photo"><img src="/img/bakpia-keju.jpg" alt=""></div>
        </div>
    </div>
</div>
<div class="container_local">
    <div class="search">
        <form action=" ">
            <input type="text" placeholder="Search" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>


<div class="container_local produk_section">
    <div class="produk_filter">
        <form action="">
            <div class="produk_filter_wrapper">
                <div class="filter">
                    <div class="title_filter">
                        <p>Filter</p>
                    </div>
                    <div class="title_filter_varian">
                        <p>Filter dari Nama</p>
                    </div>
                    <div class="fiter_item">
                        <input type="checkbox">
                        <label for="kategori">Griya Bakpia</label>
                    </div>
                    <div class="fiter_item">
                        <input type="checkbox">
                        <label for="kategori">Bakpia 465</label>
                    </div>
                    <div class="fiter_item">
                        <input type="checkbox">
                        <label for="kategori">Bakpia 465 Kering</label>
                    </div>
                    <div class="fiter_item">
                        <input type="checkbox">
                        <label for="kategori">Paketan</label>
                    </div>
                </div>
                <div class="filter_harga">
                    <div class="sub_filter_harga">
                        <div class="filter_harga_title">
                            <h2>Filter dari Harga</h2>
                        </div>
                        <div class="harga_minimum">
                            <label for="">Rp. </label>
                            <input type="number" placeholder="Harga Minimum">
                        </div>
                        <div class="harga_maksimal">
                            <label for="">Rp. </label>
                            <input type="number" placeholder="Harga Maksimal">
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter_btn">
                <button>Terapkan</button>
            </div>
        </form>
    </div>
    <div class="scroll_griya">
        <div class="product_scroll_wrapper">
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 4652 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_product_scroll_card">
                <div class="sub_product_scroll_img">
                    <img src="https://via.placeholder.com/200x200" alt="">
                </div>
                <div class="sub_product_scroll_title_wrapper">
                    <div class="sub_product_scroll_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_product_scroll_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_product_scroll_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_product_scroll_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_product_scroll_btn">
                        <a href=""><button class="btn btn-primary">Tambah ke Keranjang</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pagination">
    <a href="#" class="prev"><span class="material-symbols-outlined">
            arrow_back
        </span>
    </a>
    <div class="pagi_number">
        <a class="active" href="">1</a>
        <a href="">2</a>
        <a href="">3</a>
    </div>
    <a href="#" class="next"><span class="material-symbols-outlined">
            arrow_forward
        </span>
    </a>
</div>

<script src="/js/produk.js"></script>

<?= $this->endSection(); ?>