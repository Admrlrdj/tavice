<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-body">
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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="100px">No</th>
                        <th>Menu</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Nomor Meja</th>
                        <th>Total Harga</th>
                        <th>Waiter</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pesanan as $key => $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_menu'] ?></td>
                            <td><?= $value['nama_pelanggan'] ?></td>
                            <td><?= $value['jumlah'] ?></td>
                            <td><?= $value['nomor_meja'] ?></td>
                            <td><?= $value['total'] ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#apply-pesanan<?= $value['id_pesanan'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#tolak-pesanan<?= $value['id_pesanan'] ?>"><i class="fas fa-trash"></i></button>
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

<?php foreach ($pesanan as $key => $value) { ?>
    <!-- /add-modal -->
    <div class="modal fade" id="apply-pesanan<?= $value['id_pesanan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Buat Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Pesanan/ApplyData/' . $value['id_pesanan']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ID Pesanan</label>
                        <input name="id_pesanan" class="form-control" value="<?= $value['id_pesanan'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input name="nama_pelanggan" class="form-control" value="<?= session()->get('nama_pelanggan') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input name="jenis_kelamin" class="form-control" value="<?= session()->get('jenis_kelamin') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">No. Handphone</label>
                        <input name="no_hp" class="form-control" value="<?= session()->get('no_hp') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input name="alamat" class="form-control" value="<?= session()->get('alamat') ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Menu</label>
                        <select name="id_menu" class="form-control" disabled>
                            <option value="" selected disabled> ---Pilih Menu--- </option>
                            <?php foreach ($produk as $key => $p) { ?>
                                <option value="<?= $p['id_menu'] ?>" <?= $value['id_menu'] == $p['id_menu'] ? 'selected' : '' ?>><?= $p['nama_menu'] ?> | Rp<?= number_format($p['harga'], 0) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Meja</label>
                        <select name="id_meja" class="form-control" disabled>
                            <option value="" selected disabled> ---Pilih Meja--- </option>
                            <?php foreach ($meja as $key => $m) { ?>
                                <option value="<?= $m['id_meja'] ?>" <?= $value['id_meja'] == $m['id_meja'] ? 'selected' : '' ?>><?= $m['nomor_meja'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" value="<?= $value['jumlah'] ?>" class="form-control" placeholder="Jumlah" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Waiter</label>
                        <input name="id_user" class="form-control" value="<?= session()->get('nama_user') ?>" placeholder="Waiter" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" name="total" class="form-control" placeholder="Total" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- /delete-modal -->
<?php foreach ($pesanan as $key => $value) { ?>
    <div class="modal fade" id="tolak-pesanan<?= $value['id_pesanan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Tolak Pesanan..?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Pesanan/DeleteData' . $value['id_pesanan']) ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>