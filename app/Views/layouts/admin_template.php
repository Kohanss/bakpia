<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/template_admin.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="main1">
            <nav class="navbar navbar-expand px-4 py-3 position-fixed w-100 z-3">
                <!-- <form action="<?php echo base_url('/admin/search'); ?>" method="post" class="d-none d-sm-inline-block">
                    <div class="input-grup input-group-navbar d-flex">
                        <input type="text" class="form-control rounded-0 border-0" placeholder="cari">
                        <button class="btn border-0 rounded-0 " type="button">
                            <span class="material-symbols-outlined">search</span>
                        </button>
                    </div>
                </form> -->
                <div class="nav-bar">
                    <h3 class="font-weight-bold fs-5">admin <?= $title; ?></h3>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class=" navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="" class=" nav-icon pe-md-0" data-bs-toggle="dropdown">
                                <span class="material-symbols-outlined avatar img-fluid" style="color: black;">
                                    account_circle
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                                <a href="/account" class=" dropdown-item text-center">
                                    <span>account</span>
                                </a>
                                <form class="dropdown-item text-center link-danger logout" action="<?= base_url('/logout'); ?>" method="post">
                                    <button type="submit" style="border: none; width:150px; background-color:transparent"><span>logout</span></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="side-bar">
            <aside class="sidebar position-fixed">
                <div class="d-flex justify-content-left mt-3 logo">
                    <button id="toggle-btn" type="button">
                        <i class="lni lni-angle-double-right"></i>
                    </button>
                    <div class="sidebar-logo">
                        <h1>Admin</h1>
                    </div>
                    <div class="sidebar-logo">
                        <h1>Bakpia</h1>
                    </div>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">dashboard</span>
                            <span class="spin">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/login" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">inventory_2</span>
                            <span class="spin">Product</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/stock" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined">inventory</span>
                            <span class="spin">Stock</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/category" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">format_list_bulleted</span>
                            <span class="spin">Category</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/type" class="sidebar-link d-flex align-items-center">

                            <span class="spin">Variant</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/transaction" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">contract_edit</span>
                            <span class="spin">Transaction</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/edit-account" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">group</span>
                            <span class="spin">Account Edit</span>
                        </a>
                    </li>
                </ul>
            </aside>
            <aside class="sidebar_transparent">
                <div class="d-flex justify-content-left mt-3 logo">
                    <h1>asdfaf</h1>
                </div>
            </aside>
            <aside class="sidebar_layarkecil">
                <div class="">
                    <h1>asdfaf</h1>
                </div>
            </aside>
            <main class="container-fluid content px-3 py-3" style="margin-top:64px">
                <div class="">
                    <div class="mb-3">
                        <?= $this->renderSection('content_admin'); ?>
                    </div>
                </div>
            </main>
        </div>
    </div>



</body>
<script>
    const burger = document.querySelector("#toggle-btn");
    burger.addEventListener("click", function() {
        document.querySelector(".sidebar").classList.toggle("expand")
    })
    burger.addEventListener("click", function() {
        document.querySelector(".sidebar_transparent").classList.toggle("expand")
    })
</script>

</html>