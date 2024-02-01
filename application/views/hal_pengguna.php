<?= $this->session->flashdata('notif') ?>
<button type="button" class="btn btn-primary mx-5 mt-4 rounded-pill" data-toggle="modal" data-target="#primary-header-modal">Tambah pengguna</button>

<!-- Modal tambah pengguna -->
<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">z
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Tambah pengguna
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('pengguna/simpan') ?>" method="post">
                <div class="modal-body">
                    <h4>Username</h4>
                    <input type="text" class="form-control" name="username">
                    <div class="row mt-3">
                        <div class="col-6">
                            <h4>Password</h4>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col-6">
                            <h4>Level</h4>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level">
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h4>Nama</h4>
                        <input type="text" class="form-control" name="nama">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="card m-5">
    <div class="card-body">
        <h4 class="card-title">Tabel pengguna</h4>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Level</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $user) { ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['level'] ?></td>
                        <td><?= $user['nama'] ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm rounded-pill"><a class="text-light" href="<?= base_url('pengguna/hapus/' . $user['id_user']) ?>">Hapus</a></button>
                            <button class="btn btn-primary btn-sm rounded-pill"><a class="text-light" href="<?= base_url('pengguna/reset/' . $user['id_user']) ?>">Reset</a></button>
                            <button class="btn btn-warning btn-sm rounded-pill text-light" data-toggle="modal" data-target="#edit<?= $user['id_user'] ?>">Edit</button>
                            <!-- Modal edit pengguna -->
                            <div id="edit<?= $user['id_user'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">z
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-primary">
                                            <h4 class="modal-title" id="primary-header-modalLabel">Tambah pengguna
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="<?= base_url('pengguna/edit') ?>" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" value="<?= $user['id_user'] ?>" name="id_user">
                                                <h4>Username</h4>
                                                <input type="text" class="form-control" name="username" readonly value="<?= $user['username'] ?>">
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <h4>Nama</h4>
                                                        <input type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>">
                                                    </div>
                                                    <div class="col-6">
                                                        <h4>Level</h4>
                                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level">
                                                            <option value="admin" <?php if ($user['level'] == "admin" ) { echo "selected"; }?> >Admin</option>
                                                            <option value="kasir" <?php if ($user['level'] == "kasir" ) { echo "selected"; }?> >Kasir</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Keluar</button>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</div>