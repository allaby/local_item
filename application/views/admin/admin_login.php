<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/backoffice/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/backoffice/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/backoffice/dist/css/adminlte.min.css">
    <script src="<?= base_url() ?>assets/fontoffice/js/jquery.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/backoffice/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>assets/backoffice/plugins/toastr/toastr.min.js"></script>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>assets/backoffice/index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="">
                    <div class="input-group mb-3">
                        <input type="email" id="login_email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="login_password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" id="submitbtn" onclick="admin_connect();return false" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <!-- <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/backoffice/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/backoffice/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/backoffice/dist/js/adminlte.min.js"></script>
    <script>
        function admin_connect() {
            $('#submitbtn').attr('disabled', true);
            $('#submitbtn').html("Connexion en cour...");
            var email = $("#login_email").val();
            var password = $("#login_password").val();
            $.ajax({
                method: "POST",
                url: "<?= base_url() ?>customer/signin",
                data: {
                    email: email,
                    password: password
                },
                success: function(data) {
                    console.log(data);
                    var val = data.split("||");
                    if (val[0] == "true") {
                        $('#submitbtn').attr('disabled', false);
                        $('#submitbtn').html("Connexion avec succes");
                        Toast.fire({
                            icon: 'success',
                            title: 'Redirection en cours...'
                        })
                        if (val[1] == "admin") {
                            window.location.href = "<?= base_url() ?>admin/dashboard"
                        } else if (val[1] == "customer") {
                            window.location.href = "<?= base_url() ?>"
                        }
                    } else if (val[0] == "false") {
                        $('#submitbtn').attr('disabled', false);
                        $('#submitbtn').html("Se connecter");
                        toastr.error(val[1])
                    }
                }
            })
        }
    </script>
</body>

</html>