<!DOCTYPE html>
<html lang="en">
<?php
// print_r($id_otp); die;
if (empty($otp)) {
    return redirect()->to('/login');
}?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset_pas.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Lupa Password</title>
</head>

<body>
    <div class="bgimg"></div>
    <div class="form">
        <div class="form_wrapper">
            <h2 class="text-center">Reset Password</h2>
            <form id="myform" action="/reset-pass" method="post">
                <input name="id" type="hidden" value="<?php echo $id_otp ?>">
                <input name="otp" type="hidden" value="<?php echo $otp ?>">
                <div class="mb-3">
                    <label for="new-password" class="form-label">Password Baru</label>
                    <input name="password" type="password" id="new-password" class="form-control" required>
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Ulangi Password</label>
                    <input name="confirm" type="password" id="confirm-password" class="form-control" required>
                    <div id="emailHelp" class="form-text"><?php
                                                            if (!empty($msg_error)) {
                                                                echo $msg_error;
                                                            }
                                                            ?></div>
                </div>
                <input type="checkbox" id="show-password"> Tampilkan Password
                <br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
<?php
// unset($_SESSION['']);
?>

<script>
    $(document).ready(function() {
        $('#show-password').change(function() {
            var passwordField = $('#new-password');
            var confirmPasswordField = $('#confirm-password');
            if ($(this).is(':checked')) {
                passwordField.attr('type', 'text');
                confirmPasswordField.attr('type', 'text');
            } else {
                passwordField.attr('type', 'password');
                confirmPasswordField.attr('type', 'password');
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>