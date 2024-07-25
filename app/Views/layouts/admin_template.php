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
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- <style>
        .sidenav {
            position: fixed;
            top: 0;
            left: 0;
        }

        .relat {
            width: 278px;
        }

        #wrapper {
            overflow-x: hidden;
        }

        .sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            transition: margin 0.25s ease-out;
        }

        .sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        .sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        body.sb-sidenav-toggled #wrapper .sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            .sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            body.sb-sidenav-toggled #wrapper .sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style> -->
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex justify-content-left mt-3 logo">
                <button id="toggle-btn" type="button">
                    <i class="lni lni-angle-double-right"></i>
                </button>
                <div class="sidebar-logo ">
                    <h1>Admin</h1>
                </div>
                <div class="sidebar-logo ">
                    <h1>Bakpia</h1>
                </div>
            </div>
            <ul class=" sidebar-nav">
                <li class="sidebar-item">
                    <a href="/login" class="sidebar-link d-flex align-items-center">
                        <span class="material-symbols-outlined gambar">dashboard</span>
                        <span class="spin">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link d-flex align-items-center">
                        <span class="material-symbols-outlined gambar">account_circle</span>
                        <span class="spin">Account</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link d-flex align-items-center">
                        <span class="material-symbols-outlined gambar">inventory_2</span>
                        <span class="spin">Product</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/category" class="sidebar-link d-flex align-items-center">
                        <span class="material-symbols-outlined gambar">category</span>
                        <span class="spin">Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/unit" class="sidebar-link d-flex align-items-center">
                        <span class="material-symbols-outlined gambar">shopping_cart</span>
                        <span class="spin">Unit</span>
                    </a>
                </li>
            </ul>
            <!-- <div class="sidebar-footer">
                <a href="sidebar-link">
                    <span class="material-symbols-outlined gambar">logout</span>
                    <span class="spin">Logout</span>
                </a>
            </div> -->
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="" class="d-none d-sm-inline-block">
                    <div class="input-grup input-group-navbar d-flex">
                        <input type="text" class="form-control rounded-0 border-0" placeholder="cari">
                        <button class="btn border-0 rounded-0 " type="button">
                            <span class="material-symbols-outlined">search</span>
                        </button>
                    </div>
                </form>
                <div class="nav-bar">
                    <h3 class="font-weight-bold fs-5">admin dashboard</h3>
                </div>
                <div class=" navbar-collapse collapse">
                    <ul class=" navbar-nav ms-auto">
                        <li class=" nav-item dropdown">
                            <a href="" class=" nav-icon pe-md-0" data-bs-toggle="dropdown">
                                <span class="material-symbols-outlined avatar img-fluid">
                                    account_circle
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                                <a href="" class=" dropdown-item">
                                    <span>account</span>
                                </a>
                                <a href="" class=" dropdown-item">
                                    <span>account</span>
                                </a>
                                <a href="" class=" dropdown-item">
                                    <span>logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">

                        <!-- <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card border-0">
                                    <div class="card-body py-4">
                                        <h5 class="mb-2 font-weight-bold">
                                            aasdasdf
                                        </h5>
                                        <p class="mb-2 font-weight-bold">
                                            $11111111
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +999
                                            </span>
                                            <span class="font-weight-bold">
                                                lorem ipsum
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-12 col-md-4">
                                <div class="card border-0">
                                    <div class="card-body py-4">
                                        <h5 class="mb-2 font-weight-bold">
                                            aasdasdf
                                        </h5>
                                        <p class="mb-2 font-weight-bold">
                                            $11111111
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +999
                                            </span>
                                            <span class=" font-weight-bold">
                                                lorem ipsum
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-12 col-md-4">
                                <div class="card border-0">
                                    <div class="card-body py-4">
                                        <h5 class="mb-2 font-weight-bold">
                                            aasdasdf
                                        </h5>
                                        <p class="mb-2 font-weight-bold">
                                            $11111111
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +999
                                            </span>
                                            <span class=" font-weight-bold">
                                                lorem ipsum
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?= $this->renderSection('content_admin'); ?>

                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- <nav class="navbar navbar-expand-lg navbar-light border-bottom fixed-top" style="background-color: #dee2e6;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Admin Bakpia</a>
                    <button class="btn btn-primary  " id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile show" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-16px, 38px, 0px);" data-popper-placement="bottom-end" >
                                    <li class="dropdown-header">
                                        <h6>Kevin Anderson</h6>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                            <i class="bi bi-person"></i>
                                            <span>My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                            <i class="bi bi-gear"></i>
                                            <span>Account Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                            <i class="bi bi-question-circle"></i>
                                            <span>Need Help?</span>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span>Sign Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> -->
    <!-- Page content-->
    <!-- <div class=""> -->

    <!-- </div>
    </div>
    </div> -->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    const burger = document.querySelector("#toggle-btn");

    burger.addEventListener("click", function() {
        document.querySelector("#sidebar").classList.toggle("expand")

    })
</script>

</html>