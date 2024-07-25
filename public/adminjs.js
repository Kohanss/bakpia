//modal profile
// const subMenu = document.getElementById("subMenu");
// document.querySelector(".nav_toggle_btn").addEventListener("click", toggleMenu);
// function toggleMenu() {
//   subMenu.classList.toggle("open-menu");
// }
// modal logout
// const modalExit = document.querySelector("#overlay_exit");
// const exitButton = document.querySelector(".btn_exit");
// const noBtn = document.querySelector(".out-btn");
// exitButton.addEventListener("click", function () {
//   modalExit.classList.add("active");
// });
// noBtn.addEventListener("click", function () {
//   modalExit.classList.remove("active");
// });

// sidebar
// function openSideBar() {
//   document.getElementById("sidebar").style.width = "20%";
//   document.getElementById("responsive_table_active").classList.add("responsive_table_active");
//   document.getElementById("navbar").classList.add("navbar_active");
// }
// function closeSidebar() {
//   document.getElementById("sidebar").style.width = "0px";
//   document.getElementById("responsive_table_active").classList.remove("responsive_table_active");
//   document.getElementById("responsive_table_active").style.transition = "0.5s";
//   document.getElementById("navbar").classList.remove("navbar_active");
// }

//modal hapus
const hapusBtn = document.querySelectorAll(".action-btn #hapus"),
  modalHapus = document.querySelector("#modal_hapus"),
  batalBtn = document.querySelector(".sub_modal_hapus :nth-child(3)");
hapusBtn.forEach(function (btn) {
  btn.addEventListener("click", function () {
    event.preventDefault();
    modalHapus.classList.add("modal_hapus_active");
  });
});
batalBtn.addEventListener("click", function () {
  modalHapus.classList.remove("modal_hapus_active");
});
window.addEventListener("click", function (event) {
  if (event.target === modalHapus) {
    modalHapus.classList.remove("modal_hapus_active");
  }
});

//modal Edit
// const btnEdit = document.querySelectorAll(".action-btn #edit_btn"),
//   modalEdit = document.querySelector(".modal_edit"),
//   batalEdit = document.querySelector("#edit-content .silang");
// btnEdit.forEach(function (btn) {
//   btn.addEventListener("click", function () {
//      event.preventDefault();
//     modalEdit.classList.add("modal_edit_active");
//   });
// });

// batalEdit.addEventListener("click", function () {
//   event.preventDefault();
//   modalEdit.classList.remove("modal_edit_active");
// });

//modal tambah
// const btnTambah = document.getElementById("button_tambah"),
//   modalTambah = document.querySelector("#modal_tambah"),
//   bataltambah = document.querySelector("#tambah-content .silang");
// btnTambah.addEventListener("click", function () {
//    event.preventDefault();
//   modalTambah.classList.add("modal_tambah_active");
// });

// bataltambah.addEventListener("click", function () {
//   event.preventDefault();
//   modalTambah.classList.remove("modal_tambah_active");
// });
