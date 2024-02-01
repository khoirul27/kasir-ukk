<?= $this->session->flashdata('notif') ?>
<button type="button" class="btn btn-primary mx-5 mt-4 rounded-pill" data-toggle="modal" data-target="#primary-header-modal">Tambah pelanggan</button>

<!-- Modal tambah pengguna -->
<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Tambah pelanggan
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('pelanggan/simpan') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <h4>Nama pelanggan</h4>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="col-6">
                            <h4>No hp</h4>
                            <input type="text" class="form-control" name="telp">
                        </div>
                    </div>
                    <h4 class="mt-3">Alamat</h4>
                    <textarea class="form-control" rows="3" name="alamat"></textarea>
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
                    <th scope="col">Nama pelanggan</th>
                    <th scope="col">No telp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($pelanggan as $pelanggan) { ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $pelanggan['nama'] ?></td>
                        <td><?= $pelanggan['alamat'] ?></td>
                        <td><?= $pelanggan['telp'] ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm rounded-pill"><a class="text-light" href="<?= base_url('pelanggan/hapus/' . $pelanggan['id_pelanggan']) ?>">Hapus</a></button>
                            <button class="btn btn-warning btn-sm rounded-pill text-light" data-toggle="modal" data-target="#edit<?= $pelanggan['id_pelanggan'] ?>">Edit</button>
                            <!-- Modal edit pengguna -->
                            <div id="edit<?= $pelanggan['id_pelanggan'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">z
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-primary">
                                            <h4 class="modal-title" id="primary-header-modalLabel">Tambah pengguna
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="<?= base_url('pelanggan/edit') ?>" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h4>Nama pelanggan</h4>
                                                        <input type="text" class="form-control" name="nama" value="<?= $pelanggan['nama'] ?>">
                                                    </div>
                                                    <div class="col-6">
                                                        <h4>No hp</h4>
                                                        <input type="text" class="form-control" name="telp" value="<?= $pelanggan['telp'] ?>">
                                                    </div>
                                                </div>
                                                <h4 class="mt-3">Alamat</h4>
                                                <textarea class="form-control" rows="3" name="alamat"><?= $pelanggan['alamat'] ?></textarea>
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