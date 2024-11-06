<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <title>login</title>
</head>

<?php
// if (!empty($eror)) {
//     print_r($eror);
//     die;
// }
// $eror = '';
?>

<body>
    <div class="form_wrapper foto d-flex">
        <div class="login_form">
            <div class="wrapper_login_form d-flex align-items-center">
                <div class="sub_login">
                    <div class="title_login mb-4">
                        <h1 class="text-center">Login</h1>
                        <h5 class="text-center">Anda harus login untuk mengakses halaman admin</h5>
                    </div>
                    <form class="input_login" method="post" action="/login_post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <?php if (!empty($eror)) {  ?>
                                <?php if ($eror == "Username tidak sesuai") { ?>
                                    <p class="eror"><?php echo $eror; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <input name="username" type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <?php if (!empty($eror)) {  ?>
                                <?php if ($eror == "Password tidak sesuai") { ?>
                                    <p class="eror"><?php echo $eror; ?></p>
                                <?php } ?>
                            <?php } ?>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="togglePass()">
                            <div class="check d-flex justify-content-between">
                                <label class="form-check-label" for="exampleCheck1">show password</label>
                                <a href="/login/lupa-password">Lupa Password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="text d-flex align-items-center">
            <div class="sub_text text-center">
                <h1>Selamat Datang</h1>
                <h2>Admin Griya Bakpia</h2>
            </div>
        </div>
    </div>

</body>
<script>
    function togglePass() {
        var x = document.getElementById("exampleInputPassword1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</html>