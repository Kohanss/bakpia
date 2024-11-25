$(document).ready(function () {
  const baseurl = $("#baseurl").val();
  const BASEURL = $("#Baseurl").val();

  // Fungsi untuk memuat produk dari API
  function loadProducts(params = {}) {
    $.ajax({
      url: `${baseurl}produk/filter`,
      method: "POST",
      data: params,
      dataType: "json",
      success: function (response) {
        if (response.result && response.result.data.length > 0) {
          renderProducts(response.result.data);
          renderPagination(response.result.pagination);
        } else {
          $("#productContainer").html(`
            <div class="sub_product_scroll_card_error">
              <div class="sub_product_scroll_title_wrapper">
                <div class="sub_product_scroll_name">
                  <p>Tidak ada produk yang ditemukan</p>
                </div>
              </div>
            </div>
          `);
          $(".pagination").hide();
        }
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  }

  // Fungsi untuk merender produk
  function renderProducts(products) {
    const $productContainer = $("#productContainer");
    $productContainer.empty();

    products.forEach((product) => {
      const productCard = `
        <div class="sub_product_scroll_card">
          <div class="sub_product_scroll_img">
              <img src="${BASEURL}${product.photo}" alt="${product.name}">
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
                  <button class="btn btn-primary add-to-cart" 
                      data-id="${product.id}" 
                      data-name="${product.name}" 
                      data-variant="${product.variant_name}" 
                      data-category="${product.category_name}" 
                      data-price="${product.price}" 
                      data-photo="${product.photo}">
                      Tambah ke Keranjang
                  </button>
              </div>
          </div>
        </div>`;
      $productContainer.append(productCard);
    });

    // Tambahkan event listener untuk tombol "Tambah ke Keranjang"
    $(".add-to-cart").on("click", function () {
      const product = {
        id: $(this).data("id"),
        name: $(this).data("name"),
        variant_name: $(this).data("variant"),
        category_name: $(this).data("category"),
        price: $(this).data("price"),
        photo: $(this).data("photo"),
      };
      addToCart(product);
    });
  }

  // Fungsi untuk menyimpan ke session storage
  function addToCart(product) {
    let cart = sessionStorage.getItem("cart"); 
    cart = cart ? JSON.parse(cart) : []; 

    // Periksa apakah produk sudah ada di keranjang
    const existingProduct = cart.find((item) => item.id === product.id);
    if (existingProduct) {
      // Tambah jumlah produk jika sudah ada
      existingProduct.qty += 1;
    } else {
      // Tambahkan produk baru
      cart.push({ ...product, qty: 1 });
    }

    // Simpan kembali ke session storage
    sessionStorage.setItem("cart", JSON.stringify(cart));
    alert("Produk berhasil ditambahkan ke keranjang!");
  }

  // Fungsi untuk merender pagination
  function renderPagination(pagination) {
    const $paginationContainer = $("#paginationContainer");
    $paginationContainer.empty();

    if (pagination.total_page <= 1) {
      $(".pagination").hide();
      return;
    } else {
      $(".pagination").show();
    }

    if (pagination.prev) {
      const prevLink = `<a href="#" data-page="${pagination.prev}" class="prev">previous</a>`;
      $paginationContainer.append(prevLink);
    }

    pagination.detail.forEach((page) => {
      const pageLink = `<a href="#" data-page="${page}" class="${Number(pagination.page) === page ? "active" : ""}">${page}</a>`;
      $paginationContainer.append(pageLink);
    });

    if (pagination.next) {
      const nextLink = `<a href="#" data-page="${pagination.next}" class="next">next</a>`;
      $paginationContainer.append(nextLink);
    }
  }

  // Event: Pencarian
  $("#searchForm").on("submit", function (e) {
    e.preventDefault();
    const searchQuery = $("#searchInput").val();
    loadProducts({ search: searchQuery });
  });

  // Event: Filter Kategori
  $("#categoryFilter").on("change", function () {
    const category = $(this).val();
    loadProducts({ filter: category });
  });

  // Event: Filter Harga
  $("#filterForm").on("submit", function (e) {
    e.preventDefault();
    const startPrice = $("#startPrice").val();
    const endPrice = $("#endPrice").val();
    loadProducts({ start: startPrice, end: endPrice });
  });

  // Event: Pagination
  $(document).on("click", "#paginationContainer a", function (e) {
    e.preventDefault();
    const page = $(this).data("page");
    loadProducts({ page });
  });

  loadProducts();
});
