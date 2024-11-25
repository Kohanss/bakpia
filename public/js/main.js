$(document).ready(function () {
  const defaultCategory = $(".scroll_btn_active").find("input[type='hidden']").val();
  fetchProducts(defaultCategory, 1); 
});

$(".scroll_btn").click(function () {
  $(".scroll_btn").removeClass("scroll_btn_active");
  $(".scroll_griya").removeClass("scroll_griya_active");

  $(this).addClass("scroll_btn_active");

  const index = $(".scroll_btn").index(this);
  $(".scroll_griya").eq(index).addClass("scroll_griya_active");

  const category = $(this).find("input[type='hidden']").val();
  fetchProducts(category, index + 1);
});

function fetchProducts(category, containerIndex) {
  const baseurl = $("#baseurl").val();
  const BASEURL = $("#BASEURL").val();

  const $productContainer = $(`#productContainer${containerIndex}`);
  $productContainer.empty();

  $.ajax({
      url: `${baseurl}filter`,
      method: "POST",
      data: { category: category },
      dataType: "json",
      success: function (response) {
          if (response.result && response.result.data && response.result.data.length > 0) {
              const products = response.result.data;
              let visibleCount = 4;

              renderProducts($productContainer, products.slice(0, visibleCount), BASEURL);

              if (products.length > 4) {
                  $(".product_scroll_container").removeClass("product_scroll_container_active");
                  $("#scroll_selengkapnya").show().text("Selengkapnya").data("expanded", false);
              } else {
                  $("#scroll_selengkapnya").hide();
                  $(".product_scroll_container").removeClass("product_scroll_container_active");
              }

              $("#scroll_selengkapnya").off("click").on("click", function () {
                  const $button = $(this);

                  if ($button.data("expanded")) {
                      visibleCount = 4;
                      renderProducts($productContainer, products.slice(0, visibleCount), BASEURL);
                      $button.text("Selengkapnya").data("expanded", false);
                      $(".product_scroll_container").removeClass("product_scroll_container_active");
                  } else {
                      visibleCount = products.length;
                      renderProducts($productContainer, products.slice(0, visibleCount), BASEURL);
                      $button.text("Tutup").data("expanded", true);
                      $(".product_scroll_container").addClass("product_scroll_container_active");
                  }
              });
          } else {
              $productContainer.html("<p>No products found for this category.</p>");
              $("#scroll_selengkapnya").hide();
          }
      },
      error: function (error) {
          console.error("Error fetching products:", error);
      },
  });
}

function renderProducts(container, products, BASEURL) {
  container.empty();
  products.forEach((product) => {
      const productCard = `
      <div class="sub_product_scroll_card">
          <div class="sub_product_scroll_img">
              <img src="${BASEURL}${product.photo}" alt="Product Image">
          </div>
          <div class="sub_product_scroll_title_wrapper">
              <div class="sub_product_scroll_title">
                  <p>${product.name}</p>
              </div>
              <div class="sub_product_scroll_name">
                  <p>${product.variant_name}</p>
              </div>
              <div class="sub_product_scroll_category">
                  <p>${product.category_name}</p>
              </div>
              <div class="sub_product_scroll_price">
                  <p>Rp ${product.price}</p>
              </div>
              <div class="sub_product_scroll_btn">
                  <a href="#"><button class="btn btn-primary">Beli Sekarang</button></a>
              </div>
          </div>
      </div>`;
      container.append(productCard);
  });
}

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
  slidesPerView: "auto",
  spaceBetween: 5,
  breakpoints: {
    768: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    960: {
      slidesPerView: "auto",
      spaceBetween: 5,
    },
  },
});
