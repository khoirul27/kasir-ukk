<div class="card m-5 p-3">
    <h2><strong>Invoice pembelian</strong></h2>
    <div class="row align-items-start mt-2">
        <div class="col-4">
            <span>From :</span>
            <h4><strong><?= $this->session->userdata('nama') ?></strong></h4>
            <h4>Jl.gatot no 50,kra</h4>
            <h4>087767676767</h4>
        </div>
        <div class="col-4">
            <span>To :</span>
            <h4><strong><?= $penjualan->nama ?></strong></h4>
            <h4><?= $penjualan->alamat ?></h4>
            <h4><?= $penjualan->telp ?></h4>
        </div>
        <div class="col-4">
            <span>No nota :</span>
            <h4><strong><?= $penjualan->kode_penjualan ?></strong></h4>
        </div>
    </div>

    <div class="table-responsive mt-2">
        <span>Detail produk :</span>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode produk</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
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
</div>