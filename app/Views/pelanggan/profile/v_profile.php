<div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('AdminLTE') ?>/dist/img/user2-160x160.jpg" alt=" User profile picture">
            </div>

            <h3 class="profile-username text-center"><?= session()->get('nama_pelanggan') ?></h3>

            <p class="text-muted text-center">Pelanggan</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Username</b> <a class="float-right"><?= session()->get('username') ?></a>
                </li>
                <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right"><?php
                                                                if (session()->get('jenis_kelamin') == 'l') {
                                                                    echo 'Laki - Laki';
                                                                } else {
                                                                    echo 'Perempuan'; // Handle invalid status values if needed
                                                                }
                                                                ?></a>
                </li>
                <li class="list-group-item">
                    <b>No. Handphone</b> <a class="float-right"><?= session()->get('no_hp') ?></a>
                </li>
                <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?= session()->get('alamat') ?></a>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="card card-primary card-outline">
        <div class="card-header p-2">
            <div>
                <h4 class="text-muted text-center">Ubah Identitas</h4>


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

                <form action="/Profile/UpdateProfile/<?php echo session()->get('id_pelanggan'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="nama_pelanggan" id="nama" class="form-control" value="<?= session()->get('nama_pelanggan') ?>" placeholder="Nama">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" value="<?= session()->get('username') ?>" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" value="<?= session()->get('password') ?>" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="repassword" id="repassword" class="form-control" value="<?= session()->get('password') ?>" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select name="jenis_kelamin" class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="l" <?= session()->get('jenis_kelamin') == 'l' ? 'Selected' : '' ?>>Laki - Laki</option>
                            <option value="p" <?= session()->get('jenis_kelamin') == 'p' ? 'Selected' : '' ?>>Perempuan</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-venus-mars"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?= session()->get('no_hp') ?>" placeholder="No. Telepon">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="alamat" id="alamat" class="form-control" value="<?= session()->get('alamat') ?>" placeholder="Alamat">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-solid fa-map"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>
<!-- /.card -->

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