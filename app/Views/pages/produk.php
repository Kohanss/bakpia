<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>
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

<!-- Search -->
<div class="container_local">
    <div class="search">
        <form id="searchForm">
            <input type="text" placeholder="Search" id="searchInput" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<!-- Produk dan Filter -->
<div class="container_local produk_section">
    <!-- Filter -->
    <div class="produk_filter">
        <form id="filterForm">
            <div class="produk_filter_wrapper">
                <div class="filter">
                    <div class="title_filter">
                        <p>Filter</p>
                    </div>
                    <div class="title_filter_varian">
                        <p>Filter dari Kategori</p>
                    </div>
                    <div class="filter_item">
                        <select class="sub_filter_item" id="categoryFilter" name="category">
                            <option value="">Semua</option>
                            <option value="Basah">Basah</option>
                            <option value="Kering">Kering</option>
                        </select>
                    </div>
                </div>
                <div class="filter_harga">
                    <div class="sub_filter_harga">
                        <div class="filter_harga_title">
                            <h2>Filter dari Harga</h2>
                        </div>
                        <div class="harga_minimum">
                            <label for="startPrice">Rp. </label>
                            <input type="number" placeholder="Harga Minimum" id="startPrice" name="start_price">
                        </div>
                        <div class="harga_maksimal">
                            <label for="endPrice">Rp. </label>
                            <input type="number" placeholder="Harga Maksimal" id="endPrice" name="end_price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter_btn">
                <button type="submit">Terapkan</button>
            </div>
        </form>
    </div>

    <!-- Produk -->
    <div class="scroll_griya">
        <div class="product_scroll_wrapper" id="productContainer">
            <!-- Produk akan dimuat di sini -->
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="pagination">
    <div class="pagi_number" id="paginationContainer">
        <!-- Pagination numbers akan dimuat di sini -->
    </div>
</div>

<!-- Hidden Input for BASEURL -->
<input type="hidden" value="<?php echo base_url(); ?>" id="baseurl">
<input type="hidden" value="<?php echo BASEURL; ?>" id="Baseurl">

<script src="/js/produk.js"></script>

<?= $this->endSection(); ?>
