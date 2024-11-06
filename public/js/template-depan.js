var script = document.createElement("script");

script.src = "https://code.jquery.com/jquery-3.7.1.min.js";
document.getElementsByTagName("head")[0].appendChild(script);

// $(document).ready(function() {
//     $(".navbar_link_btn").click(function() {
//         $(".navbar_link_btn").removeClass("navbar_link_btn_active");
//         $(this).addClass("navbar_link_btn_active");
//         localStorage.setItem('activeNavURL', $(this).attr('href'));
//     })
// })
// $(document).ready(function() {
//     $('#nav-icon3').click(function() {
//         $(this).toggleClass('open');
//     });
// });

// sidebar kiri open
$(document).ready(function () {
    $('#hamburger_btn').click(function () {
        $('.wrapper_sidebar_kiri').addClass('sidebar_kiri_active');
        $('.backround_fade_sidebar_kiri').addClass('backround_fade_sidebar_active');
    })
})

// sidebar kiri close
$(document).ready(function () {
    $('#closebtnkiri').click(function () {
        $('.wrapper_sidebar_kiri').removeClass('sidebar_kiri_active');
        $('.backround_fade_sidebar_kiri').removeClass('backround_fade_sidebar_active');
    })
})
$(document).ready(function () {
    $('.backround_fade_sidebar_kiri').click(function () {
        $('.wrapper_sidebar_kiri').removeClass('sidebar_kiri_active');
        $('.backround_fade_sidebar_kiri').removeClass('backround_fade_sidebar_active');
    })
})



$(document).ready(function () {
  var currentURL = location.pathname.split("/")[1];
  $(".sidebar_kiri_btn").each(function () {
    var linkURL = $(this).attr("href").split("/")[1];

    if (currentURL === linkURL) {
      $(this).addClass("sidebar_kiri_link_active");
    }
  });
});

$(document).ready(function () {
  var currentURL = location.pathname.split("/")[1]; 
  $(".navbar_link_btn").each(function () {
    var linkURL = $(this).attr("href").split("/")[1];

    if (currentURL === linkURL) {
      $(this).addClass("navbar_link_btn_active");
    }
  });
});
