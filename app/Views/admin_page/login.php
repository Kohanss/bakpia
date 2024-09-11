<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css\login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <title>login</title>
</head>

<body>
    <div class="container">
        <div class="sub_card">
            <header>Login</header>
            <p>You need login to access the admin data</p>
            <form action="<?php echo base_url('login'); ?>" method="post">
                <div class="field_input">
                    <label for="username">Username</label>
                    <input type="username" name="username" id="username" required />
                    <?php if (!empty($eror) && $eror == 'Username not registered') {
                        echo '<p style="color: red; font-size:14px; margin-top:-15px">' . $eror . '</p>';
                    } ?>
                </div>
                <div class="field_input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required />
                    <?php if (!empty($eror) && $eror == 'Password not match') {
                       echo '<p style="color: red; font-size:14px; margin-top:-15px">' . $eror . '</p>';
                    } ?>
                </div>
                <div class="form-check" style="margin-left: -165px;">
                    <input class="form-check-input" type="checkbox" onclick="togglePass()">
                    <label class="form-check-label" for="flexCheckDefault" style="font-weight: 200; font-size:14px;">Show password</label>
                </div>
                <div class="btn_input">
                    <input type="submit" class="btn" name="submit" value="Login" />
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function togglePass() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>