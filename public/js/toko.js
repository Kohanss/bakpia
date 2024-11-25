$(document).ready(function () {
  const baseurl = $("#baseurl").val();
  const BASEURL = $("#Baseurl").val();

  // Function to load toko data
  function loadToko(params = {}) {
    $.ajax({
      url: `${baseurl}toko/filter`,
      method: "POST",
      data: params,
      dataType: "json",
      success: function (response) {
        if (response.result && response.result.data.length > 0) {
          renderToko(response.result.data);
        } else {
          $("#tokoContainer").html("<p>Tidak ada toko yang ditemukan.</p>");
        }
      },
      error: function (error) {
        console.error("Error:", error);
      },
    });
  }

  // Function to render toko data
  function renderToko(tokoList) {
    const $tokoContainer = $("#tokoContainer");
    $tokoContainer.empty();

    tokoList.forEach((toko) => {
      const tokoCard = ` 
             <div class="card_toko">
        <div class="card_toko_img">
            <img src="${BASEURL}${toko.photo}" alt="${toko.title} alt="toko1">
        </div>
        <div class="card_toko_desc">
            <div class="card_toko_title">
                <h1>${toko.title}</h1>
            </div>
            <div class="card_toko_alamat">
                <span class="material-symbols-outlined">storefront</span>
                <h2>${toko.address}</h2>
            </div>
            <div class="card_toko_nomer">
                <span class="material-symbols-outlined">phone_in_talk</span>
                <h3>0812321323531</h3>
            </div>
            <div class="card_toko_btn">
                <a href=""><button class="googlemaps"><span class="material-symbols-outlined">location_on</span>Gmaps</button></a>
                <a href=""><button class="Wa"><i class='bx bxl-whatsapp'></i>Wa</button></a>
            </div>
        </div>
    </div>`;
      $tokoContainer.append(tokoCard);
    });
  }

  // Event: Search toko
  $("#searchFormToko").on("submit", function (e) {
    e.preventDefault();
    const searchQuery = $("#searchInputToko").val();
    loadToko({ search: searchQuery });
  });

  // Load initial data toko
  loadToko();
});
