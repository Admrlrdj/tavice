<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tavice | Registration Page</title>

    <!-- STYLES -->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

    <!-- SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

    <script>
        // Fungsi untuk menutup alert secara otomatis
        function closeAlert() {
            $('.alert').fadeOut('slow'); // Menggunakan jQuery untuk fade out alert
        }

        // Fungsi untuk memanggil closeAlert() setelah beberapa detik (misal: 5 detik)
        function setupAlertTimer() {
            setTimeout(closeAlert, 2000); // 5000 milidetik (5 detik)
        }

        // Panggil fungsi setupAlertTimer() saat dokumen siap (selesai di-load)
        $(document).ready(function() {
            setupAlertTimer();
        });
    </script>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>Tav</b>ice</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <?php $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible mb-4">
                        <ul>
                            <?php foreach ($errors as $key => $error) { ?>
                                <li><?= esc($error) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <?php if (session()->getFlashdata('gagal')) {
                    echo '<div class="alert alert-danger alert-dismissible"> <i class="icon fas fa-times"></i>';
                    echo session()->getFlashdata('gagal');
                    echo '</div>';
                } ?>
                <?php if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible"> <h5><i class="icon fas fa-check"></i>';
                    echo session()->getFlashdata('pesan');
                    echo '</h5></div>';
                } ?>

                <form action="SaveRegister" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="Nama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-solid fa-address-card"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select name="jenis_kelamin" class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="l">Laki - Laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-venus-mars"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="no_hp" id="no_hp" class="form-control" placeholder="No. Handphone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="alamat" id="alamat" class="form-control" placeholder="Alamat">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-solid fa-map"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="<?= base_url('Home/Login') ?>" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</body>

</html>