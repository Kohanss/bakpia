<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/tentang.css">
<div class="container">
    <div class="about">
        <div class="about_title">
            <h2>Bakpia dengan rasa Terbaik</h2>
        </div>
        <div class="about_content">
            <img src="/img/halamanRumah.jpg" alt="">
            <div class="about_text">
                <p>
                    Bakpia merupakan makanan khas dari Yogyakarta yang terkenal dengan kelezatannya. Kue tradisional ini terbuat dari tepung terigu, kacang hijau, dan gula, yang kemudian dipanggang hingga matang. Bakpia memiliki tekstur yang renyah di luar dan lembut di dalam, dengan rasa manis yang legit dari kacang hijau.
                </p>
                <p>
                    Bakpia memiliki sejarah panjang di Yogyakarta. Konon, bakpia pertama kali dibuat oleh masyarakat Tionghoa yang tinggal di Yogyakarta sekitar tahun 1940-an. Seiring waktu, bakpia menjadi semakin populer dan disukai banyak orang, sehingga menjadi salah satu oleh-oleh khas Yogyakarta yang wajib dicoba.
                </p>
                <p>
                    Saat ini, terdapat berbagai macam varian rasa bakpia yang tersedia, mulai dari rasa kacang hijau klasik, hingga rasa kekinian seperti cokelat, keju, durian, dan masih banyak lagi. Hal ini membuat bakpia semakin digemari oleh berbagai kalangan, baik tua maupun muda.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="card_container container">
    <?php foreach ($data_page['result']['data'] as $p) : ?>
        <div class="card_produk">
            <div class="card">
                <img src="/img/pitek.jpg" alt="" />
                <div class="card_text">
                    <p><?php echo $p['product']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<div class="container pagination">
    <?php if (!empty($data_page['result']['pagination']['prev'])) {
        $num = $data_page['result']['pagination']['prev']; ?>
        <a href="/pages/produk?page=<?= $num; ?>">&laquo;</a>
    <?php }  ?>
    <?php for ($i = 1; $i <= $data_page['result']['pagination']['jumlah_page']; $i++) { ?>
        <a class="paginat" href="/pages/produk?page=<?= $i; ?>"><?php echo $i ?></a>
    <?php } ?>
    <?php if (!empty($data_page['result']['pagination']['next'])) {
        $num = $data_page['result']['pagination']['next']; ?>
        <a href="/pages/produk?page=<?= $num; ?>">&raquo;</a>
    <?php }  ?>
</div>

<div class="galeri">
    <h1></h1>
</div>


<?= $this->endSection(); ?>