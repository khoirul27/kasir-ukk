<?= $this->session->flashdata('notif') ?>

<button type="button" class="btn btn-primary mx-5 mt-4 rounded-pill" data-toggle="modal" data-target="#tambah">Tambah produk</button>
<button type="button" class="btn btn-primary mt-4 rounded-pill" data-toggle="modal" data-target="#kategori">kategori produk</button>

<!-- Modal tambah pengguna -->
<div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Tambah produk
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('produk/simpan') ?>" method="post">
                <div class="modal-body">
                    <h4>Nama produk</h4>
                    <input type="text" class="form-control" name="nama">
                    <div class="mt-3">
                        <h4>Nama kategori</h4>
                        <select class="custom-select mr-sm-2" name="id_kategori">
                            <?php foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <h4>Kode produk</h4>
                            <input type="text" class="form-control" name="kode_produk">
                        </div>
                        <div class="col-5">
                            <h4>Harga</h4>
                            <input type="number" class="form-control" name="harga">
                        </div>
                        <div class="col-3">
                            <h4>Stok</h4>
                            <input type="number" class="form-control" name="stok">
                        </div>
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

<!-- Modal tambah pengguna -->
<div id="kategori" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Tambah produk
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('produk/simpan_kategori') ?>" method="post">
                <div class="modal-body">
                    <h4>Kategori produk</h4>
                    <input type="text" class="form-control" name="kategori">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row m-5">
    <div class="card col-7 mx-2">
        <div class="card-body">
            <h4 class="card-title">Tabel Produk</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode produk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $produk) { ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $produk['kode_produk'] ?></td>
                            <td><?= $produk['nama'] ?></td>
                            <td><?= $produk['kategori'] ?></td>
                            <td><?= $produk['stok'] ?></td>
                            <td>Rp.<?= number_format($produk['harga']) ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm rounded-pill"><a class="text-light" href="<?= base_url('produk/hapus/' . $produk['id_produk']) ?>">Hapus</a></button>
                                <button class="btn btn-warning btn-sm rounded-pill text-light" data-toggle="modal" data-target="#edit<?= $produk['id_produk'] ?>">Edit</button>
                                <!-- Modal edit pengguna -->
                                <div id="edit<?= $produk['id_produk'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">z
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-primary">
                                                <h4 class="modal-title" id="primary-header-modalLabel">Tambah pengguna
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form action="<?= base_url('produk/edit') ?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" value="<?= $produk['id_produk'] ?>" name="id_produk">
                                                    <h4>Nama produk</h4>
                                                    <input type="text" class="form-control" name="nama" value="<?= $produk['nama'] ?>">
                                                    <div class="mt-3">
                                                        <h4>Nama kategori</h4>
                                                        <select class="custom-select mr-sm-2" name="id_kategori">
                                                            <?php foreach ($kategori as $k) { ?>
                                                                <option class="text-dark" value="<?= $k['id_kategori'] ?>" <?php if ($k['id_kategori'] == $produk['id_kategori']) { echo "selected";}  ?>><?= $k['kategori'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-4">
                                                            <h4>Kode produk</h4>
                                                            <input type="text" class="form-control" name="kode_produk" value="<?= $produk['kode_produk'] ?>">
                                                        </div>
                                                        <div class="col-5">
                                                            <h4>Harga</h4>
                                                            <input type="number" class="form-control" name="harga" value="<?= $produk['harga'] ?>">
                                                        </div>
                                                        <div class="col-3">
                                                            <h4>Stok</h4>
                                                            <input type="number" class="form-control" name="stok" value="<?= $produk['stok'] ?>">
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
    <div class="card col-4" style="height: 100%;">
        <div class="card-body">
            <h4 class="card-title">Tabel Kategori</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $kategori) { ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $kategori['kategori'] ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm rounded-pill"><a class="text-light" href="<?= base_url('produk/hapus_kategori/' . $kategori['id_kategori']) ?>">Hapus</a></button>
                                <button class="btn btn-warning btn-sm rounded-pill text-light" data-toggle="modal" data-target="#edit<?= $kategori['id_kategori'] ?>">Edit</button>
                                <!-- Modal edit pengguna -->
                                <div id="edit<?= $kategori['id_kategori'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">z
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-primary">
                                                <h4 class="modal-title" id="primary-header-modalLabel">Tambah pengguna
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form action="<?= base_url('produk/edit_kategori') ?>" method="post">
                                                <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori'] ?>">
                                                <div class="modal-body">
                                                    <h4>Kategori produk</h4>
                                                    <input type="text" class="form-control" name="kategori" value="<?= $kategori['kategori'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
</div>