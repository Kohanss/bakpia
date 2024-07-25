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
<div class="slideshow_container container">
    <div class="mySlides">
        <div class="wrapper wrap1">
            <div class="produk_img">
                <div class="pitek1"><img src="/img/pitek.jpg" alt="" /></div>
            </div>
        </div>
    </div>

    <!-- switch 2 -->
    <div class="mySlides">
        <div class="wrapper wrap2">
            <div class="produk_img">
                <div class="pitek2"><img src="" alt="" /></div>
            </div>
        </div>
    </div>
    <!-- switch 3 -->
    <div class="mySlides">
        <div class="wrapper wrap1">
            <div class="produk_img">
                <div class="pitek3"><img src="" alt="" /></div>
            </div>
        </div>
    </div>
    <div class="prev_next">
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <div class="dot_wrap">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>

<div class="search-container">
    <input type="text" placeholder="kacang hijau" name="search" id="search_input">
    <button id="search_btn"><span class="material-symbols-outlined">search</span></button>
</div>


<div class="card_container container" id="search_results"></div>

<!-- card -->
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

<!-- pagination -->
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




<script>
    var slideIndex = 1;
    timer = null;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides((slideIndex += n));
        clearTimeout(timer);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");

        if (n == undefined) {
            n = ++slideIndex;
        }
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < slides.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        timer = setTimeout(showSlides, 4000);

    }
    // $(document).ready(function() {
    //     $(".paginat").click(function() {
    //         $(".paginat").removeClass("paginat_active");
    //         $(this).addClass("paginat_active");
    //     })
    // })



    // function search() {
    //     var keyword = $('#search_input').val();
    //     if (keyword.length >= 3) {
    //         $.ajax({
    //             url: "<?php //echo base_url('pages/search'); 
                            ?>",
    //             type: "POST",
    //             data: {
    //                 keyword: keyword
    //             },
    //             success: function(data) {
    //                 $("#search_results").html(data);
    //             },
    //         });
    //     } else {
    //         $("#search_results").html("");
    //     }
    // }

    // $(document).ready(function() {
    //     $("#search_btn").on("click", function() {
    //         search();
    //     });

    //     $('#search_input').on('keyup', function(e) {
    //         if (e.keyCode === 13) {
    //             search();
    //         }
    //     });
    // });

</script>

<?= $this->endSection(); ?>