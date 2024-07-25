<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/main.css">
<!-- hero -->
<div class="hero">
    <img src="/img/hero.svg" alt="">
    <div class="container">
        <div class="transparent_hero"></div>
        <div class="sub_hero">
            <div class="wrapper_hero">
                <div class="title_hero">
                    <h2>Lezatnya Terasa di Setiap Lapisan</h2>
                </div>
                <div class="desc_hero">
                    <p>Bakpia kami terbuat dari bahan berkualitas terbaik. Dengan isian yang lembut dan kulit yang renyah, setiap bakpia menawarkan pengalaman rasa yang akan membuat Anda jatuh cinta pada gigitan pertama.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="curve_hero"><h2>Signature Taste</h2></div> -->
<!-- end hero -->

<!-- category -->
<div class="container category">
    <div class="category_card1">
        <img src="/img/pitek.jpg" alt="" style="height: auto" ;>
        <div class="text_category">
            <h4><b>Griya Bakpia Premium</b></h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis nobis repellendus reiciendis deleniti nostrum blanditiis facere beatae harum ipsa quam nesciunt quis eum quo, maiores provident dignissimos aliquam, aliquid sapiente.
                Qui repellat nisi unde repudiandae quae ea est exercitationem perferendis ipsam voluptate iste, ullam quasi! Sequi dolores eius dolorum repellendus, commodi, sed minima omnis, architecto exercitationem corporis porro accusamus possimus?
                Omnis nisi itaque quisquam delectus, deleniti veniam, iusto expedita ullam tempora a dolorum iste! Ducimus omnis fugiat qui sit id atque commodi, doloremque blanditiis quam ad odit ex, nulla eveniet!
                Minus dolores mollitia veritatis quia, iusto saepe cum autem adipisci itaque numquam fuga eligendi molestiae. Velit ea ut, assumenda nam illum tempora! Similique dicta molestias aut fugiat sequi, suscipit eum?
                Delectus iste quisquam accusantium unde ex exercitationem quia repellendus fuga consequatur? Asperiores iure odio tenetur! Architecto modi sunt harum! Est iste ipsa facere nostrum reprehenderit quidem temporibus. Laborum, ratione suscipit!</p>
        </div>
    </div>
    <div class="category_card2">
        <div class="text_category">
            <h4><b>Bakpia 465</b></h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis nobis repellendus reiciendis deleniti nostrum blanditiis facere beatae harum ipsa quam nesciunt quis eum quo, maiores provident dignissimos aliquam, aliquid sapiente.
                Qui repellat nisi unde repudiandae quae ea est exercitationem perferendis ipsam voluptate iste, ullam quasi! Sequi dolores eius dolorum repellendus, commodi, sed minima omnis, architecto exercitationem corporis porro accusamus possimus?
                Omnis nisi itaque quisquam delectus, deleniti veniam, iusto expedita ullam tempora a dolorum iste! Ducimus omnis fugiat qui sit id atque commodi, doloremque blanditiis quam ad odit ex, nulla eveniet!
                Minus dolores mollitia veritatis quia, iusto saepe cum autem adipisci itaque numquam fuga eligendi molestiae. Velit ea ut, assumenda nam illum tempora! Similique dicta molestias aut fugiat sequi, suscipit eum?
                Delectus iste quisquam accusantium unde ex exercitationem quia repellendus fuga consequatur? Asperiores iure odio tenetur! Architecto modi sunt harum! Est iste ipsa facere nostrum reprehenderit quidem temporibus. Laborum, ratione suscipit!</p>
        </div>
        <img src="/img/pitek.jpg" alt="" style="height: auto" ;>
    </div>
</div>
<!-- end of category -->

<!-- slider -->
<div class="btn_slider">
    <button class="btn_bakpia griya_bakpia">Griya Bakpia</button>
    <button class="btn_bakpia bakpia_465">Bakpia 465</button>
    <button class="btn_bakpia 465_kering">Bakpia 465 Kering</button>
</div>
<div class="container">
    <div class="slideShow_product" id="griya">
        <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button btn_left">
                < </button>
                    <ul class="image-list">
                        <?php foreach ($data_get['result'] as $value) {  ?>
                            <div class="image-item">
                                <img src="/img/logo.png" alt="img-1" />
                                <h3><?= $value['product']; ?></h3>
                            </div>
                        <?php } ?>
                    </ul>
                    <button id="next-slide" class="slide-button btn_right">
                        >
                    </button>
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
            </div>
        </div>
    </div>


    <div class="slideShow_product" id="basah465">
        <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button btn_left">
                < </button>
                    <ul class="image-list">
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>465</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                    </ul>
                    <button id="next-slide" class="slide-button btn_right">
                        >
                    </button>
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
            </div>
        </div>
    </div>

    <div class="slideShow_product" id="kering465">
        <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button btn_left">
                < </button>
                    <ul class="image-list">
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>kering</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                        <div class="image-item">
                            <img src="/img/logo.png" alt="img-1" />
                            <h3>asdfasdfasd</h3>
                        </div>
                    </ul>
                    <button id="next-slide" class="slide-button btn_right">
                        >
                    </button>
        </div>
        <div class="slider-scrollbar">
            <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btn_bakpia").click(function() {
            $(".btn_bakpia").removeClass("btn_bakpia_active");
            $(this).addClass("btn_bakpia_active");
        })
    })

    $(document).ready(function() {
        $(".griya_bakpia").click(function() {
            $("#griya").css({
                "display": "block"
            })
            $("#basah465").css({
                "display": "none"
            })
            $("#kering465").css({
                "display": "none"
            })
        })
    })

    $(document).ready(function() {
        $(".bakpia_465").click(function() {
            $("#basah465").css({
                "display": "block"
            })
            $("#griya").css({
                "display": "none"
            })
            $("#kering465").css({
                "display": "none"
            })
        })
    })

    $(document).ready(function() {
        $(".465_kering").click(function() {
            $("#kering465").css({
                "display": "block"
            })
            $("#basah465").css({
                "display": "none"
            })
            $("#griya").css({
                "display": "none"
            })
        })
    })
</script>

<?= $this->endSection(); ?>