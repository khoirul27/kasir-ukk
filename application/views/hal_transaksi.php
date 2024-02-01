<?= $this->session->flashdata('notif') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="row m-3">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('penjualan/tambahkeranjang') ?>" method="post" class="mt-3">
                    <h4 class="card-title">No nota</h4>
                    <input class="form-control" type="text" name="kode_penjualan" id="" value="<?= $nota ?>" readonly>
                    <input class="form-control" type="hidden" name="id_pelanggan" id="" value="<?= $pelanggan->id_pelanggan  ?>" readonly>
                    <h4 class="card-title mt-2">Nama pembeli</h4>
                    <input type="text" name="" class="form-control" value="<?= $pelanggan->nama  ?>" readonly>
                    <h4 class="card-title">Produk</h4>
                    <input type="hidden" name="kode_penjualan" value="<?= $nota ?>">
                    <select class="custom-select mr-sm-2"  name="id_produk">
                        <?php foreach ($produk as $produk) { ?>
                            <option value="<?= $produk['id_produk'] ?>"><?= $produk['nama'] ?> - <?= $produk['kode_produk'] ?> (<?= $produk['stok'] ?>) </option>
                        <?php } ?>
                    </select>

                    <h4 class="card-title mt-2">Jumlah beli</h4>
                    <input type="number" name="jumlah" class="form-control col-6" required>
                    <button type="submit" class="btn btn-primary rounded-pill mt-4">Tambah keranjang</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode produk</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $total = 0;
                        foreach ($detail as $detail) { ?>
                            <tr>
                                <th><?= $no ?></th>
                                <th><?= $detail['kode_produk']  ?></th>
                                <th><?= $detail['nama']  ?></th>
                                <th><?= $detail['jumlah']  ?></th>
                                <th>Rp.<?= number_format($detail['harga'])  ?></th>
                                <th>Rp.<?= number_format($detail['harga'] * $detail['jumlah'])  ?></th>
                                <th>
                                    <a href="<?= base_url('penjualan/hapuskeranjang/') . $detail['id_detail'] ?>" class="btn btn-danger btn-sm rounded-pill">hapus</a>
                                </th>
                            </tr>
                        <?php $no++;
                            $total = $total + $detail['harga'] * $detail['jumlah'];
                        } ?>
                        <tr>
                            <td colspan="3">Total harga = Rp.<?= number_format($total) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form class="m-3" action="<?= base_url('penjualan/bayar') ?>" method="post">
                <input type="hidden" name="kode_penjualan" value="<?= $nota ?>">
                <input type="hidden" name="total_harga" value="<?= $total ?>">
                <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                <?php if ($detail != null) { ?>
                    <button type="submit" class="btn btn-primary rounded-pill">Bayar</button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>


<script>
    function formatState(state) {
        if (!state.id) {
            return state.text;
        }

        var baseUrl = "/user/pages/images/flags";
        var $state = $(
            '<span><img class="img-flag" /> <span></span></span>'
        );

        // Use .text() instead of HTML string concatenation to avoid script injection issues
        $state.find("span").text(state.text);
        $state.find("img").attr("src", baseUrl + "/" + state.element.value.toLowerCase() + ".png");

        return $state;
    };

    $(".js-example-templating").select2({
        templateSelection: formatState
    });
</script>