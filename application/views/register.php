<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('template/') ?>assets/images/logo/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('template/') ?>assets/images/logo/logo.png" type="image/x-icon">
    <title>Register Forum Puspa</title>
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
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/select2.css">
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo" href="<?= base_url() ?>">
                                <img class="img-fluid for-light mb-3" src="<?= base_url('template/') ?>assets/images/logo/logo.png" width="70px" alt="looginpage">
                                <h3>
                                    Forum Puspa
                                </h3>
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="post">
                                <h4>Membuat Akun</h4>
                                <?php
                                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $token = substr(str_shuffle($permitted_chars), 0, 10);

                                $role = base64_decode($encrypt);
                                $role = explode("-", $role);
                                ?>
                                <p class="mb-4">Masukkan data Anda untuk membuat akun</p>
                                <input type="hidden" name="link" value="<?= uri_string(); ?>">
                                <input type="hidden" name="encrypt" value="<?= $encrypt ?>">
                                <input type="hidden" name="token" value="<?= $token ?>">
                                <?php
                                $readonly = "";
                                $valuenamaasingkat = "";
                                $titleinput = "Anggota";
                                if (in_array("admin", $role)) {
                                    if (in_array("pusat", $role)) {
                                        $valuenamaasingkat = "Admin Forum Pusat";
                                    } else {
                                        $valuenamaasingkat = "Admin Forum ";
                                    }
                                    $readonly = "readonly style=\"background-color: #ddd;\"";
                                    $titleinput = "Forum";
                                }
                                echo "<input type='hidden' value='" . $valuenamaasingkat . "' name='nama_singkat'>";
                                ?>
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Nama Lengkap <?= $titleinput ?></label>
                                    <input id="namalengkapforum" name="nama_lengkap" class="form-control" type="text" required="" value="<?= $valuenamaasingkat ?>" placeholder="Nama Lengkap <?= $titleinput ?>" <?= $readonly ?>>
                                </div>
                                <?php if (in_array("admin", $role)) { ?>
                                    <?php if (!in_array("pusat", $role)) { ?>
                                        <?php
                                        $detaildaerah = "";
                                        if(in_array("provinsi", $role)){
                                            $detaildaerah = "prov";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">Provinsi</label>
                                            <select class="select2filter col-sm-12 form-control" name="kode_wilayah" onchange="kabupatenkota(this.value, <?=$detaildaerah;?>);">
                                                <option value></option>
                                                <?php
                                                foreach ($qprovinsi as $keyQp => $valueQp) {
                                                    if ($valueQp->name == "DKI JAKARTA") {
                                                        $nmwilayah = "DKI Jakarta";
                                                    } else if ($valueQp->name == "DI YOGYAKARTA") {
                                                        $nmwilayah = "DI Yogyakarta";
                                                    } else {
                                                        $nmwilayah = ucwords(strtolower($valueQp->name));
                                                    }
                                                    echo "<option value='" . $valueQp->id . "'>" . $nmwilayah . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <?php } ?>
                                    <?php if (in_array("pemda", $role)) { ?>
                                        <div class="form-group">
                                            <label class="col-form-label pt-0">Kabupaten/Kota</label>
                                            <select class="select2filter col-sm-12 form-control" name="kode_wilayah" id="kabupatenkotanya" onchange="kabupatenkota(this.value, 'kabkot');">
                                            </select>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label class="col-form-label pt-0">Forum Induk</label>
                                        <select class="select2filter col-sm-12 form-control" name="id_parent" onchange="kabupatenkota(this.value);">
                                            <option value></option>
                                            <?php
                                            foreach ($qinduk as $keyQp => $valueQp) {
                                                echo "<option value='" . $valueQp->mitra_id . "'>" . $valueQp->nama_lengkap . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <div class="form-input position-relative">
                                        <input name="email" class="form-control" type="email" required="" placeholder="Nama@domain.com" onkeyup="cekemail(this.value)">
                                        <div id="statuscekemail" class="show-hide" style="top: 24px!important;"></div>
                                    </div>
                                    <div class="invalid-feedback" id="notifcekemail">*Email sudah terdaftar</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input name="password" class="form-control" type="password" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" required>
                                        <label class="text-muted" for="checkbox1">Setuju dengan <a class="ms-1" href="#">Kebijakan Privasi</a></label>
                                    </div>
                                    <button id="btnsubmit" class="btn btn-primary btn-block w-100" type="submit">Buat Akun</button>
                                </div>
                                <p class="mt-4 mb-0">Sudah memiliki akun?<a class="ms-2" href="<?= base_url('login') ?>">Masuk</a></p>
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

        <script src="<?= base_url('template/'); ?>assets/js/select2/select2.full.min.js"></script>
        <script>
            $(".select2filter").select2({
                placeholder: "Pilih Data",
                allowClear: true
            });

            function kabupatenkota(params, detail = '') {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('login/daerah') ?>",
                    data: {
                        id: params,
                        status: detail
                    },
                    success: function(msg) {
                        if(detail != "prov" && detail != "kabkot"){
                            var kabkot = JSON.parse(msg);
                            var cekarray = Array.isArray(kabkot);
                            var tampilin = "<option value></option>";
                            if (cekarray == true) {
                                for (let index = 0; index < kabkot.length; index++) {
                                    var str = kabkot[index]['name'];
                                    str = str.toLowerCase().replace(/^[\u00C0-\u1FFF\u2C00-\uD7FF\w]|\s[\u00C0-\u1FFF\u2C00-\uD7FF\w]/g, function(letter) {
                                        return letter.toUpperCase();
                                    });
                                    tampilin += "<option value='" + kabkot[index]['id'] + "'>" + str + "</option>";
                                }
                                document.getElementById('kabupatenkotanya').innerHTML = tampilin;
                            } else {
                                document.getElementById('kabupatenkotanya').innerHTML = tampilin;
                            }
                        } else {
                            var detaildaerah = JSON.parse(msg);

                            var str = detaildaerah['name'];
                            str = str.toLowerCase().replace(/^[\u00C0-\u1FFF\u2C00-\uD7FF\w]|\s[\u00C0-\u1FFF\u2C00-\uD7FF\w]/g, function(letter) {
                                return letter.toUpperCase();
                            });
                            document.getElementById('namalengkapforum').value = "<?=$valuenamaasingkat;?>"+str;
                        }
                    }
                });
            }
        </script>
        <script>
            function cekemail(email) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('login/cekemail') ?>",
                    data: {
                        value: email
                    },
                    success: function(msg) {

                        if (msg == 1) {
                            document.getElementById("notifcekemail").style.display = "block";
                            document.getElementById("statuscekemail").innerHTML = "<i class='fa fa-times text-danger'></i>";
                            document.getElementById("btnsubmit").setAttribute("disabled", "disabled");
                        } else {
                            document.getElementById("btnsubmit").removeAttribute("disabled");
                            if (msg != '') {
                                document.getElementById("notifcekemail").style.display = "none";
                                document.getElementById("statuscekemail").innerHTML = "<i class='fa fa-check text-success'></i>";
                            } else {
                                document.getElementById("notifcekemail").style.display = "none";
                                document.getElementById("statuscekemail").innerHTML = "";
                            }
                        }
                    }
                });
            }
        </script>
    </div>
</body>

</html>