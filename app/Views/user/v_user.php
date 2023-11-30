<!-- Data User -->
<div class="col-md-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-user"><i class="fas fa-plus"></i> Add Data User
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan-user')) {
                echo '<div class="alert alert-success alert-dismissible">
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan-user');
                echo '</h5></div>';
            }
            ?>
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td><?= $value['username'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td><?php
                                if ($value['level'] == 'admin') { ?>
                                    <span class="badge bg-success">Admin</span>
                                <?php } elseif ($value['level'] == 'kasir') { ?>
                                    <span class="badge bg-primary">Kasir</span>
                                <?php } elseif ($value['level'] == 'waiter') { ?>
                                    <span class="badge bg-primary">Waiter</span>
                                <?php } elseif ($value['level'] == 'owner') { ?>
                                    <span class="badge bg-success">Owner</span>
                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-user<?= $value['id_user'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-user<?= $value['id_user'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Data Pelanggan -->
<div class="col-md-7">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pelanggan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-pelanggan"><i class="fas fa-plus"></i> Add Data Pelanggan
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan-pelanggan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan-pelanggan');
                echo '</h5></div>';
            }
            ?>
            <table id="example2" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Handphone</th>
                        <th>Alamat</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pelanggan as $key => $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_pelanggan'] ?></td>
                            <td><?= $value['username'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td><?php
                                if ($value['jenis_kelamin'] == 'l') { ?>
                                    <p>Laki - Laki</p>
                                <?php } elseif ($value['jenis_kelamin'] == 'p') { ?>
                                    <p>Laki - Laki</p>
                                <?php } ?>
                            </td>
                            <td><?= $value['no_hp'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-pelanggan<?= $value['id_pelanggan'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-pelanggan<?= $value['id_pelanggan'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /add-user-modal -->
<div class="modal fade" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="User/InsertData" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input name="nama_user" class="form-control" placeholder="Masukkan Nama User" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input name="username" class="form-control" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="kasir" selected>Kasir</option>
                            <option value="waiter">Waiter</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /edit-user-modal -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit-user<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="User/UpdateData/<?php echo session()->get('id_user'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama User</label>
                            <input name="nama_user" class="form-control" value="<?= $value['nama_user'] ?>" placeholder="Masukkan Nama User" required>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input name="username" class="form-control" value="<?= $value['username'] ?>" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" value="<?= $value['password'] ?>" placeholder="Masukkan Password" required>
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            <select name="level" class="form-control">
                                <option value="admin" <?= $value['level'] == 'admin'  ? 'Selected' : '' ?>>Admin</option>
                                <option value="kasir" <?= $value['level'] == 'kasir'  ? 'Selected' : '' ?>>Kasir</option>
                                <option value="waiter" <?= $value['level'] == 'waiter' ? 'Selected' : '' ?>>Waiter</option>
                                <option value="owner" <?= $value['level'] == 'owner'  ? 'Selected' : '' ?>>Owner</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning btn-flat">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- /delete-user-modal -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete-user<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Hapus Data User <b><?= $value['nama_user'] ?></b> ..?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('User/DeleteData/' . $value['id_user']) ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- /add-pelanggan-modal -->
<div class="modal fade" id="add-pelanggan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="/User/InsertDataPelanggan" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama User" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input name="username" class="form-control" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="l">Laki - Laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No. Handphone</label>
                        <input type="number" name="no_hp" class="form-control" placeholder="Masukkan No. Handphone" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /edit-pelanggan-modal -->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="edit-pelanggan<?= $value['id_pelanggan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('User/UpdateDataPelanggan/' . $value['id_pelanggan']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input name="nama_pelanggan" class="form-control" value="<?= $value['nama_pelanggan'] ?>" placeholder="Masukkan Nama pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input name="username" class="form-control" value="<?= $value['username'] ?>" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $value['password'] ?>" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option value="" disabled selected>Jenis Kelamin</option>
                            <option value="l" <?= $value['jenis_kelamin'] == 'l' ? 'Selected' : '' ?>>Laki - Laki</option>
                            <option value="p" <?= $value['jenis_kelamin'] == 'p' ? 'Selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No. Handphone</label>
                        <input type="number" name="no_hp" class="form-control" value="<?= $value['no_hp'] ?>" placeholder="Masukkan No. Handphone" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input name="alamat" class="form-control" value="<?= $value['alamat'] ?>" placeholder="Masukkan Alamat" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-flat">Save</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- /delete-pelanggan-modal -->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="delete-pelanggan<?= $value['id_pelanggan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Hapus Data Pelanggan <b><?= $value['nama_pelanggan'] ?></b> ..?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('User/DeleteDataPelanggan/' . $value['id_pelanggan']) ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "paging": true,
            "info": true,
        })
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "paging": true,
            "info": true,
        })
    });
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