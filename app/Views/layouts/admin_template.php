<?php
$token  = $_COOKIE['Token'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => BASEURL . 'admin/user/user-logged-in',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        "Token: $token"
    ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
// print_r($response); die;
curl_close($curl);
$role = $response['result']['data']['user']['role'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url(); ?>css/template_admin.css?v1.<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Document</title>

</head>

<body>
    <div class="wrapper d-flex">
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
                        <a href="/admin" class="sidebar-link sidebar_link_active d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">inventory_2</span>
                            <span class="spin">Product</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/category" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">format_list_bulleted</span>
                            <span class="spin">Category</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">format_list_bulleted</span>
                            <span class="spin">Variant</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">account_balance</span>
                            <span class="spin">Bank</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">storefront</span>
                            <span class="spin">Outlet</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/stock" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined">inventory</span>
                            <span class="spin">Stock</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/transaction" class="sidebar-link d-flex align-items-center">
                            <span class="material-symbols-outlined gambar">contract_edit</span>
                            <span class="spin">Transaction</span>
                        </a>
                    </li>
                    <?php if (empty($role == 'super_user')) { ?>
                        <li class="sidebar-item disable">
                            <a href="/edit-account" class="sidebar-link d-flex align-items-center">
                                <span class="material-symbols-outlined gambar">group</span>
                                <span class="spin">Account Edit</span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="sidebar-item">
                            <a href="/edit-account" class="sidebar-link d-flex align-items-center">
                                <span class="material-symbols-outlined gambar">group</span>
                                <span class="spin">Account Edit</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="sidebar-item position-fixed" style="bottom: 0;">
                        <form class="dropdown-item text-center link-danger logout" action="<?= base_url('/logout'); ?>" method="post">
                            <button class="sidebar-link-logout d-flex align-items-center">
                                <span class="material-symbols-outlined gambar">logout</span>
                                <span class="spin-logout">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </aside>
            <aside class="sidebar_transparent">
                <div class="d-flex justify-content-left mt-3 logo">
                </div>
            </aside>
            <aside class="sidebar_layarkecil">
            </aside>
        </div>

        <div class="main1 w-100">
            <nav class="navbar navbar-expand px-4 py-3 z-5 ">
                <div class="nav-bar">
                    <h3 class="fw-bold fs-3">Admin <?php echo $title; ?></h3>
                </div>
                <!-- <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="" class=" nav-icon pe-md-0" data-bs-toggle="dropdown">
                                <span class="material-symbols-outlined avatar img-fluid" style="color: black; ">
                                    account_circle
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                                <?php if (empty($role == 'super_user')) { ?>
                                    <a href="/account" class="dropdown-item text-center disabled">
                                        <span>account</span>
                                    </a>
                                <?php } else { ?>
                                    <a href="/account" class="dropdown-item text-center">
                                        <span>account</span>
                                    </a>
                                <?php } ?>
                                <form class="dropdown-item text-center link-danger logout" action="<?= base_url('/logout'); ?>" method="post">
                                    <button type="submit" style="border: none; width:150px; background-color:transparent"><span>logout</span></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div> -->
            </nav>
            <main class="container-fluid content px-3 py-0">
                <div class="mb-3">
                    <?= $this->renderSection('content_admin'); ?>
                </div>
            </main>
        </div>
    </div>
</body>
<script>
    const burger = document.querySelector("#toggle-btn");
    const icon = burger.querySelector("i");

    burger.addEventListener("click", function() {
        document.querySelector(".sidebar").classList.toggle("expand");
        document.querySelector(".sidebar_transparent").classList.toggle("expand");
        icon.classList.toggle("rotate");
    });

    const currentUrl = window.location.pathname;
    const sidebarLinks = document.querySelectorAll('.sidebar-link');

    sidebarLinks.forEach(link => {
        if (link.getAttribute('href') === currentUrl) {
            link.classList.add('sidebar_link_active');
        } else {
            link.classList.remove('sidebar_link_active');
        }
    });
</script>

</html>