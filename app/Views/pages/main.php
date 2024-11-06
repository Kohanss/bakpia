<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/main.css">
<!-- swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- aos -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<style>
    .swiper-slide {
        width: fit-content;
    }
</style>
<!-- hero -->
<section class="hero">
    <!-- <div class="hero-overlay"></div> -->
    <div class="hero-content">
        <div class="sub-hero-content">
            <h1>Griya Bakpia</h1>
            <p><i>Cita Rasa Bakpia yang Sesungguhnya</i></p>
            <button>Beli Sekarang</button>
        </div>
    </div>
</section>
<!-- end hero -->

<!-- produk laris -->
<div class="featured_product">
    <div class="container_local featured_product_wrapper">
        <div class="featured_product_title">
            <p>Bakpia Terenak</p>
            <div class="line_title"></div>
        </div>
        <div class="penjelas_judul">
            <p>Bakpia ini banyak di sukai orang-orang</p>
        </div>
        <div class="featured_product_card">
            <div class="sub_featured_product_card">
                <div class="sub_featured_product_img">
                    <img src="/img/phmax.png" alt="">
                </div>
                <div class="sub_featured_product_title_wrapper">
                    <div class="sub_featured_product_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_featured_product_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_featured_product_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_featured_product_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_featured_product_like">
                        <span class="material-symbols-outlined favorite-icon">favorite</span>
                    </div>
                    <div class="sub_featured_product_btn">
                        <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_featured_product_card">
                <div class="sub_featured_product_img">
                    <img src="/img/soklat.jpg" alt="">
                </div>
                <div class="sub_featured_product_title_wrapper">
                    <div class="sub_featured_product_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_featured_product_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_featured_product_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_featured_product_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_featured_product_like">
                        <span class="material-symbols-outlined favorite-icon">favorite</span>
                    </div>
                    <div class="sub_featured_product_btn">
                        <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_featured_product_card">
                <div class="sub_featured_product_img">
                    <img src="/img/campur.jpg" alt="">
                </div>
                <div class="sub_featured_product_title_wrapper">
                    <div class="sub_featured_product_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_featured_product_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_featured_product_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_featured_product_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_featured_product_like">
                        <span class="material-symbols-outlined favorite-icon">favorite</span>
                    </div>
                    <div class="sub_featured_product_btn">
                        <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                    </div>
                </div>
            </div>
            <div class="sub_featured_product_card">
                <div class="sub_featured_product_img">
                    <img src="/img/coklatgaring.jpg" alt="">
                </div>
                <div class="sub_featured_product_title_wrapper">
                    <div class="sub_featured_product_title">
                        <p>Bakpia 465 Isi 20</p>
                    </div>
                    <div class="sub_featured_product_name">
                        <p>Mix Keju Coklat</p>
                    </div>
                    <div class="sub_featured_product_category">
                        <p>Kering</p>
                    </div>
                    <div class="sub_featured_product_price">
                        <p>Rp 50.000</p>
                    </div>
                    <div class="sub_featured_product_like">
                        <span class="material-symbols-outlined favorite-icon">favorite</span>
                    </div>
                    <div class="sub_featured_product_btn">
                        <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="featured_product_responsive">
    <div class="container_local featured_product_wrapper">
        <div class="featured_product_title">
            <p>Bakpia Terenak</p>
            <div class="line_title"></div>
        </div>
        <div class="penjelas_judul">
            <p>Bakpia ini banyak di sukai orang-orang</p>
        </div>
        <div class="swiper featuredSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="sub_featured_product_card">
                        <div class="sub_featured_product_img">
                            <img src="/img/phmax.png" alt="">
                        </div>
                        <div class="sub_featured_product_title_wrapper">
                            <div class="sub_featured_product_title">
                                <p>Bakpia 465 Isi 20</p>
                            </div>
                            <div class="sub_featured_product_name">
                                <p>Mix Keju Coklat</p>
                            </div>
                            <div class="sub_featured_product_category">
                                <p>Kering</p>
                            </div>
                            <div class="sub_featured_product_price">
                                <p>Rp 50.000</p>
                            </div>
                            <div class="sub_featured_product_btn">
                                <button>Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="sub_featured_product_card">
                        <div class="sub_featured_product_img">
                            <img src="/img/phmax.png" alt="">
                        </div>
                        <div class="sub_featured_product_title_wrapper">
                            <div class="sub_featured_product_title">
                                <p>Bakpia 465 Isi 20</p>
                            </div>
                            <div class="sub_featured_product_name">
                                <p>Mix Keju Coklat</p>
                            </div>
                            <div class="sub_featured_product_category">
                                <p>Kering</p>
                            </div>
                            <div class="sub_featured_product_price">
                                <p>Rp 50.000</p>
                            </div>
                            <div class="sub_featured_product_btn">
                                <button>Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="sub_featured_product_card">
                        <div class="sub_featured_product_img">
                            <img src="/img/phmax.png" alt="">
                        </div>
                        <div class="sub_featured_product_title_wrapper">
                            <div class="sub_featured_product_title">
                                <p>Bakpia 465 Isi 20</p>
                            </div>
                            <div class="sub_featured_product_name">
                                <p>Mix Keju Coklat</p>
                            </div>
                            <div class="sub_featured_product_category">
                                <p>Kering</p>
                            </div>
                            <div class="sub_featured_product_price">
                                <p>Rp 50.000</p>
                            </div>
                            <div class="sub_featured_product_btn">
                                <button>Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="sub_featured_product_card">
                        <div class="sub_featured_product_img">
                            <img src="/img/phmax.png" alt="">
                        </div>
                        <div class="sub_featured_product_title_wrapper">
                            <div class="sub_featured_product_title">
                                <p>Bakpia 465 Isi 20</p>
                            </div>
                            <div class="sub_featured_product_name">
                                <p>Mix Keju Coklat</p>
                            </div>
                            <div class="sub_featured_product_category">
                                <p>Kering</p>
                            </div>
                            <div class="sub_featured_product_price">
                                <p>Rp 50.000</p>
                            </div>
                            <div class="sub_featured_product_btn">
                                <button>Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- produk laris -->

<!-- deskripsi bakpia -->
<div class="container_local">
    <div class="bakpia_wrapper">
        <div class="sub_bakpia">
            <div class="desc_basah">
                <div class="sub_desc_basah">
                    <h2>Bakpia Basah</h2>
                    <p>Bakpia basah memiliki karakteristik kulit yang lebih tebal dan lembut. Teksturnya cenderung sedikit lembab, sehingga memberikan sensasi lebih "mengenyangkan" dan kaya rasa saat dimakan. Proses pembuatannya memungkinkan kelembapan terjaga dalam kulit dan isiannya, memberikan rasa yang lebih segar dan empuk. </p>
                </div>
            </div>
            <div class="foto_basah">
                <img src="/img/basah.png" alt="">
            </div>
        </div>
        <div class="sub_bakpia">
            <div class="foto_kering">
                <img src="/img/kering.png" alt="">
            </div>
            <div class="desc_kering">
                <div class="sub_desc_kering">
                    <h2>Bakpia Kering</h2>
                    <p>Bakpia kering adalah jenis bakpia yang memiliki tekstur kulit renyah dan tipis. Proses pembuatannya dilakukan dengan memanggang lebih lama sehingga menghasilkan bakpia yang kering di bagian luar. Isian bakpia kering biasanya lebih padat dan tidak terlalu lembab. Tekstur renyahnya memberikan sensasi yang ringan saat dikonsumsi, mirip dengan biskuit atau kue kering.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bakpia_wrapper_responsive">
        <div class="sub_bakpia_responsive">
            <div class="foto_basah_responsive">
                <img src="/img/basah.png" alt="">
            </div>
            <div class="desc_basah_responsive">
                <div class="sub_desc_basah_responsive">
                    <h2>Bakpia Basah</h2>
                    <p>Bakpia basah memiliki karakteristik kulit yang lebih tebal dan lembut. Teksturnya cenderung sedikit lembab, sehingga memberikan sensasi lebih "mengenyangkan" dan kaya rasa saat dimakan. Proses pembuatannya memungkinkan kelembapan terjaga dalam kulit dan isiannya, memberikan rasa yang lebih segar dan empuk. </p>
                </div>
            </div>
        </div>
        <div class="sub_bakpia_responsive">
            <div class="foto_kering_responsive">
                <img src="/img/kering.png" alt="">
            </div>
            <div class="desc_kering_responsive">
                <div class="sub_desc_kering">
                    <h2>Bakpia Kering</h2>
                    <p>Bakpia kering adalah jenis bakpia yang memiliki tekstur kulit renyah dan tipis. Proses pembuatannya dilakukan dengan memanggang lebih lama sehingga menghasilkan bakpia yang kering di bagian luar. Isian bakpia kering biasanya lebih padat dan tidak terlalu lembab. Tekstur renyahnya memberikan sensasi yang ringan saat dikonsumsi, mirip dengan biskuit atau kue kering.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- deskripsi bakpia -->

<!-- special offer -->
<div class="container_local">
    <div class="special_offer">
        <div class="sub_special_offer">
            <div class="special_offer_title">
                <h1>Penawaran Khusus</h1>
                <div class="line_title"></div>
            </div>
            <div class="special_offer_card">
                <div class="special_offer_card_item">
                    <img src="https://via.placeholder.com/540x300" alt="Produk Spesial 1" class="special_offer_card_img">
                    <div class="special_offer_card_body">
                        <h5 class="special_offer_card_title">Bakpia 2 Dus Diskon!!</h5>
                        <p class="special_offer_card_text">Bakpia 2 dus diskon hingga 50%! </p>
                    </div>
                    <div class="special_offer_card_btn">
                        <button class="special_offer_btn">Beli Sekarang</button>
                    </div>
                </div>
                <div class="special_offer_card_item">
                    <img src="https://via.placeholder.com/540x300" alt="Produk Spesial 2" class="special_offer_card_img">
                    <div class="special_offer_card_body">
                        <h5 class="special_offer_card_title">Gratis Ongkir!!</h5>
                        <p class="special_offer_card_text">Promo besar. Jangan sampai kehabisan!</p>
                    </div>
                    <div class="special_offer_card_btn">
                        <button class="special_offer_btn">Beli Sekarang</button>
                    </div>
                </div>
                <div class="special_offer_card_item">
                    <img src="https://via.placeholder.com/540x300" alt="Produk Spesial 2" class="special_offer_card_img">
                    <div class="special_offer_card_body">
                        <h5 class="special_offer_card_title">Beli 4 Dapat 1</h5>
                        <p class="special_offer_card_text">Promo besar Jangan sampai kehabisan!</p>
                    </div>
                    <div class="special_offer_card_btn">
                        <button class="special_offer_btn">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="special_offer_responsive">
        <div class="special_offer_title">
            <h1>Penawaran Khusus</h1>
            <div class="line_title"></div>
        </div>
        <div class="swiper specialOfferSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="special_offer_card_item">
                        <img src="https://via.placeholder.com/540x300" alt="Produk Spesial 1" class="special_offer_card_img" />
                        <div class="special_offer_card_body">
                            <h5 class="special_offer_card_title">Bakpia 2 Dus Diskon!!</h5>
                            <p class="special_offer_card_text">Diskon hingga 50%!</p>
                        </div>
                        <div class="special_offer_card_btn">
                            <button class="special_offer_btn">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="special_offer_card_item">
                        <img src="https://via.placeholder.com/540x300" alt="Produk Spesial 1" class="special_offer_card_img" />
                        <div class="special_offer_card_body">
                            <h5 class="special_offer_card_title">Bakpia 2 Dus Diskon!!</h5>
                            <p class="special_offer_card_text">Diskon hingga 50%!</p>
                        </div>
                        <div class="special_offer_card_btn">
                            <button class="special_offer_btn">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="special_offer_card_item">
                        <img src="https://via.placeholder.com/540x300" alt="Produk Spesial 1" class="special_offer_card_img" />
                        <div class="special_offer_card_body">
                            <h5 class="special_offer_card_title">Bakpia 2 Dus Diskon!!</h5>
                            <p class="special_offer_card_text">Diskon hingga 50%!</p>
                        </div>
                        <div class="special_offer_card_btn">
                            <button class="special_offer_btn">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- special offer -->

<!-- produk kami -->
<div class="container_local product_scroll_container">
    <div class="product_scroll">
        <div class="product_scroll_title">
            <p>Produk Kami</p>
            <div class="line_title"></div>
        </div>
        <div class="product_scroll_btn">
            <ul>
                <li><button class="scroll_btn scroll_btn_active">Griya Bakpia</button></li>
                <li><button class="scroll_btn">Bakpia 465</button></li>
                <li><button class="scroll_btn">Bakpia 465 Kering</button></li>
            </ul>
        </div>
        <div class="scroll_griya scroll_griya_active">
            <div class="product_scroll_wrapper">
                <div class="sub_product_scroll_card">
                    <div class="sub_product_scroll_img">
                        <img src="https://via.placeholder.com/200x200" alt="">
                    </div>
                    <div class="sub_product_scroll_title_wrapper">
                        <div class="sub_product_scroll_title">
                            <p>Bakpia 4651 Isi 20</p>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                        </div>
                    </div>
                </div>
            </div>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll_griya">
            <div class="product_scroll_wrapper">
                <div class="sub_product_scroll_card">
                    <div class="sub_product_scroll_img">
                        <img src="https://via.placeholder.com/200x200" alt="">
                    </div>
                    <div class="sub_product_scroll_title_wrapper">
                        <div class="sub_product_scroll_title">
                            <p>Bakpia 4653 Isi 20</p>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll_btn_selengkapnya">
        <button id="scroll_selengkapnya">selengkapnya</button>
    </div>

    <div class="product_scroll_responsive">
        <div class="product_scroll_title">
            <p>Produk Kami</p>
            <div class="line_title"></div>
        </div>
        <div class="product_scroll_btn">
            <ul>
                <li><button class="scroll_btn scroll_btn_active">Griya Bakpia</button></li>
                <li><button class="scroll_btn">Bakpia 465</button></li>
                <li><button class="scroll_btn">Bakpia 465 Kering</button></li>
            </ul>
        </div>
        <div class="swiper produkKamiSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                        </div>
                    </div>
                </div>  
                </div>
                <div class="swiper-slide">
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                        </div>
                    </div>
                </div>  
                </div>
                <div class="swiper-slide">
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                        </div>
                    </div>
                </div>  
                </div>
                <div class="swiper-slide">
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                        </div>
                    </div>
                </div>  
                </div>
                <div class="swiper-slide">
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
                            <a href=""><button class="btn btn-primary">Beli Sekarang</button></a>
                        </div>
                    </div>
                </div>  
                </div>
                <div class="swiper-slide">
                    <div class="sub_product_scroll_card">
                        <div class="sub_product_scroll_img">
                            <img src="https://via.placeholder.com/200x200" alt="" />
                        </div>
                        <div class="sub_product_scroll_title_wrapper">
                            <div class="sub_product_scroll_title">
                                <p>Bakpia 465 Isi 20</p>
                            </div>
                            <div class="sub_product_scroll_name">
                                <p>Mix Keju Coklat</p>
                            </div>
                            <div class="sub_product_scroll_price">
                                <p>Rp 50.000</p>
                            </div>
                            <div class="sub_product_scroll_btn">
                                <button>Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- repeat other cards -->
            </div>
        </div>
    </div>
</div>
<!-- produk kami -->


<script src="/js/main.js"></script>

<?= $this->endSection(); ?>