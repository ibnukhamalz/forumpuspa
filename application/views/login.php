<!DOCTYPE html>
<html lang="en" style="--theme-deafult:#00b9f2;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('template/') ?>assets/images/logo/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('template/') ?>assets/images/logo/logo.png" type="image/x-icon">
    <title>Login Forum Puspa</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/') ?>assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/') ?>assets/css/vendors/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/') ?>assets/css/vendors/themify.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/') ?>assets/css/vendors/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/') ?>assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/') ?>assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/') ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url('template/') ?>assets/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/') ?>assets/css/responsive.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?= base_url('template/') ?>assets/images/login/2.jpg" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo text-center" href="<?= base_url() ?>">
                                <img class="img-fluid for-light mb-3" src="<?= base_url('template/') ?>assets/images/logo/logo.png" width="70px" alt="looginpage">
                                <h3>
                                    Forum Puspa
                                </h3>
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="post" action="<?= base_url('login/ceklogin') ?>">
                                <h4>Login</h4>
                                <p>Masukan Email Dan Password Anda</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" name="email" type="email" required="" placeholder="nama@domain.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" type="submit">Masuk</button>
                                </div>
                                <p class="mt-4 mb-0">Belum punya akun?<a class="ms-2" href="<?= base_url('login/register') ?>">Buat Akun</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= base_url('template/') ?>assets/js/jquery-3.5.1.min.js"></script>
        <script src="<?= base_url('template/') ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('template/') ?>assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="<?= base_url('template/') ?>assets/js/icons/feather-icon/feather-icon.js"></script>
        <script src="<?= base_url('template/') ?>assets/js/config.js"></script>
        <script src="<?= base_url('template/') ?>assets/js/script.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
        if ($this->session->notif) {
            $icon = $this->session->notif['icon'];
            $title = $this->session->notif['title'];
            $pesan = $this->session->notif['pesan'];
        ?>
            <script>
                Swal.fire({
                    icon: '<?= $icon ?>',
                    title: '<?= $title ?>',
                    text: '<?= $pesan ?>',
                    showConfirmButton: false,
                    timer: 1750
                })
            </script>
        <?php
        }
        ?>
    </div>
</body>

</html>