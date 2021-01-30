<!DOCTYPE html>
<html lang="en">

<head>
    <title>Akademik OL Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= assets_url() ?>home/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>home/css/main.css">
</head>

<body>


    <div class="container-login100" style="background-image: url('<?= assets_url() ?>home/images/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-50 p-b-30">
            <?= form_open('auth/check_validation', array('id' => 'form-login', 'class' => 'md-float-material form-material', 'method' => 'post')) ?>
            <span class="login100-form-title p-b-37">
                <img src="<?= assets_url() ?>home/images/logo.png" />
                <br>
                <br>
                Login Form
            </span>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Nama User Wajib diisi">
                <?= form_input(array('name' => 'username', 'id' => 'username', 'class' => 'input100', 'placeholder' => 'Username')) ?>
                <span class="focus-input100"></span>
                <?= form_error('username', '<div class="error">', '</div>') ?>
            </div>
            <div class="wrap-input100 validate-input m-b-25" data-validate="Password Wajib Diisi">
                <?= form_password(array('name' => 'password', 'id' => 'password', 'class' => 'input100', 'placeholder' => 'Password')) ?>
                <span class="focus-input100"></span>
                <?= form_error('password', '<div class="error">', '</div>') ?>
            </div>
            <div class="container-login100-form-btn">
                <?= form_input(array('type' => 'submit', 'name' => 'login', 'value' => 'Login', 'id' => 'login', 'class' => 'login100-form-btn')) ?>
            </div>
            <?= form_close() ?>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <script src="<?= assets_url() ?>home/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= assets_url() ?>home/vendor/animsition/js/animsition.min.js"></script>
    <script src="<?= assets_url() ?>home/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= assets_url() ?>home/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= assets_url() ?>home/vendor/select2/select2.min.js"></script>
    <script src="<?= assets_url() ?>home/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= assets_url() ?>home/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="<?= assets_url() ?>home/vendor/countdowntime/countdowntime.js"></script>
    <script src="<?= assets_url() ?>home/js/main.js"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-23581568-13');

        var untukTambahData = function() {
            $('#form-login').parsley();
            $('#form-login').submit(function(e) {
                e.preventDefault();
                $('#username').attr('required', 'required');
                $('#password').attr('required', 'required');
                if ($('#form-login').parsley().isValid() == true) {
                    $.ajax({
                        method: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        dataType: 'json',
                        beforeSend: function() {
                            $('#login').val('Wait');
                        },
                        success: function(response) {
                            if (response.status == true) {
                                window.location = response.link;
                            } else {
                                $('#login').val('Login');

                                swal({
                                    title: response.title,
                                    text: response.text,
                                    icon: response.type,
                                    button: response.button,
                                });
                            }
                        }
                    })
                }
            });
        }();
    </script>
</body>

</html>