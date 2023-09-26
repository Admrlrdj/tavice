<div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('AdminLTE') ?>/dist/img/user2-160x160.jpg" alt=" User profile picture">
            </div>

            <h3 class="profile-username text-center"><?= session()->get('nama_user') ?></h3>

            <p class="text-muted text-center"><?php
                                                if (session()->get('level') == 'admin') {
                                                    echo 'Admin';
                                                } elseif (session()->get('level') == 'kasir') {
                                                    echo 'Kasir';
                                                } elseif (session()->get('level') == 'waiter') {
                                                    echo 'Waiter';
                                                } elseif (session()->get('level') == 'owner') {
                                                    echo 'Owner';
                                                }
                                                ?></p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Username</b> <a class="float-right"><?= session()->get('username') ?></a>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->