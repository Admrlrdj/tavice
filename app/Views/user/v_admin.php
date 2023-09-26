<?php if (session()->get('level') == 'admin' || session()->get('level') == 'owner') { ?>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><span id="userCount"><?= count($usertotal) ?></span></h3>

                <p>User</p>
            </div>
            <div class="icon">
                <i class="nav-icon far fa-solid fa-user"></i>
            </div>
            <a href="<?= base_url('User') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><span id="userCount"><?= count($pelanggantotal) ?></span></h3>

                <p>Pelanggan</p>
            </div>
            <div class="icon">
                <i class="nav-icon far fa-solid fa-user"></i>
            </div>
            <a href="<?= base_url('User') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><span id="userCount"><?= count($mejatotal) ?></span></h3>

                <p>Meja</p>
            </div>
            <div class="icon">
                <i class="nav-icon far fa-solid fa-user"></i>
            </div>
            <a href="<?= base_url('Meja') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
<?php } ?>
<?php if (session()->get('level') == 'admin' || session()->get('level') == 'waiter' || session()->get('level') == 'owner') { ?>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><span id="categoryCount"><?= count($kategoritotal) ?></span></h3>

                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-solid fa-bars"></i>
            </div>
            <a href="<?= base_url('Kategori') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><span id="productCount"><?= count($menutotal) ?></span></h3>

                <p>Menu</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-solid fa-boxes"></i>
            </div>
            <a href="<?= base_url('Menu') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><span id="unitCount"><?= count($pesanantotal) ?></span></h3>

                <p>Pesanan</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-solid fa-tag"></i>
            </div>
            <a href="<?= base_url('Pesanan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
<?php } ?>
<?php if (session()->get('level') == 'admin' || session()->get('level') == 'kasir' || session()->get('level') == 'owner') { ?>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><span id="unitCount"><?= count($transaksitotal) ?></span></h3>

                <p>Transaksi</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-solid fa-tag"></i>
            </div>
            <a href="<?= base_url('Transaksi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>