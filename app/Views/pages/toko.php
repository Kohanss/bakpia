<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/toko.css">
<!-- hero -->
<section class="hero">
    <div class="container_local hero-content">
        <div class="sub-hero-content">
            <h1>Cabang</h1>
            <p>Griya Bakpia</p>
        </div>
    </div>
</section>
<!-- hero -->

<div class="container_local">
    <div class="search">
        <form id="searchFormToko">
            <input type="text" placeholder="Cari Toko..." id="searchInputToko" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<div class="card_toko_wrapper container_local" id="tokoContainer">
    <!-- Data toko akan dimuat oleh AJAX -->
</div>

<input type="hidden" value="<?php echo base_url(); ?>" id="baseurl">
<input type="hidden" value="<?php echo BASEURL; ?>" id="Baseurl">

<script src="/js/toko.js"></script>
<?= $this->endSection(); ?>