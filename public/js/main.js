$(document).ready(function () {
  $("#scroll_selengkapnya").click(function () {
    $(".product_scroll_container").toggleClass("product_scroll_container_active");
    $(".product_scroll").toggleClass("product_scroll_active");
  });

  $(".scroll_btn").click(function () {
    $(".scroll_btn").removeClass("scroll_btn_active");
    $(this).addClass("scroll_btn_active");
    $(".scroll_griya").removeClass("scroll_griya_active");
    var index = $(".scroll_btn").index(this);
    $(".scroll_griya").eq(index).addClass("scroll_griya_active");
  });
});

// Swiper for Produk Laris
var featuredSwiper = new Swiper(".featuredSwiper", {
  slidesPerView: "auto",
  spaceBetween: 20,
  breakpoints: {
    320: {
      slidesPerView: "auto",
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});


// Swiper for Special Offer
var specialOfferSwiper = new Swiper(".specialOfferSwiper", {
  slidesPerView: "auto",
  spaceBetween: 20,
  freeMode: true,
});


  // Swiper for Produk Kami
  var produkKamiSwiper = new Swiper(".produkKamiSwiper", {
    slidesPerView: 'auto',
    spaceBetween: 5,
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      960: {
        slidesPerView: 'auto',
        spaceBetween: 5,
      },
    },
  });

// $(document).ready(function() {
//     $(".scroll_btn").click(function() {
//         $(".scroll_btn").removeClass("scroll_btn_active");
//         $(this).addClass("scroll_btn_active");
//         $(".scroll_griya").removeClass("scroll_griya_active");
//         var index = $(this).index();
//         $(".scroll_griya").eq(index).addClass("scroll_griya_active");
//     })
// })

// $(document).ready(function(){
//   $("#scroll_selengkapnya").click(function () {
//     $(".product_scroll_container").toggleClass("product_scroll_container_active")
//     $(".product_scroll").toggleClass("product_scroll_active")
//   })
// })
