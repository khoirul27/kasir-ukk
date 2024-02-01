<?= $this->session->flashdata('notif') ?>
<button type="button" class="btn btn-primary mx-5 mt-4 rounded-pill" data-toggle="modal" data-target="#primary-header-modal">Pilih pelanggan</button>

<!-- Modal tambah pengguna -->
<div id="primary-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">Pilih pelanggan
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('produk/simpan') ?>" method="post">
                <div class="modal-body">
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
                                            <button class="btn btn-warning btn-sm rounded-pill"><a class="text-light" href="<?= base_url('penjualan/transaksi/' . $pelanggan['id_pelanggan']) ?>">Pilih</a></button>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="card m-5">
    <div class="card-body">
        <h4 class="card-title">Tabel Produk</h4>
        <div class="input-group col-4 p-0">
            <form action="<?= base_url('penjualan/index') ?>" method="post">
                <input type="date" class="form-control" name="tanggal">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tampilkan</button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No nota</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($penjualan as $penjualan) { ?>
                    <tr>
                        <th><?= $no ?></th>
                        <th><?= $penjualan['kode_penjualan'] ?></th>
                        <th>Rp.<?= number_format($penjualan['total_harga']) ?></th>
                        <th><?= $penjualan['nama'] ?></th>
                        <th><a class="btn btn-sm btn-warning text-light" href="<?= base_url('penjualan/invoice/' . $penjualan['kode_penjualan']) ?>">Invoice</a></th>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</div>