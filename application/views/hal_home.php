<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<div class="card-group px-5 mb-0 mt-5">
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h4 class="text-dark mb-1 font-weight-medium">Rp <?= number_format($penjualan_hari_ini) ?></h4>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Penjualan hari ini</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                            <path d="M6.445 11.688V6.354h-.633A13 13 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23" />
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h4 class="text-dark mb-1 w-100 text-truncate font-weight-medium">Rp <?= number_format($penjualan_bulan_ini) ?></h4>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Penjualan bulan ini
                    </h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-day" viewBox="0 0 16 16">
                            <path d="M4.684 11.523v-2.3h2.261v-.61H4.684V6.801h2.464v-.61H4v5.332zm3.296 0h.676V8.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a2 2 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43m.094 5.093h.672V7.418h-.672z" />
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium"><?= $transaksi_bulan_ini ?></h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Transaksi bulan ini</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z" />
                        </svg></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium"><?= $jumlah_produk ?></h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah produk</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                        </svg></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row p-5">
    <div class="card-group col-8" style="height: 30%;">
        <div class="card p-4">
            <?php
            $bulan_sekarang = date('M');
            $bulan_1 = date('M', strtotime("-1 Months"));
            $bulan_2 = date('M', strtotime("-2 Months"));
            $bulan_3 = date('M', strtotime("-3 Months"));
            $bulan_4 = date('M', strtotime("-4 Months"));
            $bulan_5 = date('M', strtotime("-5 Months"));

            $tanggal = date('Y-m', strtotime("-1 Months"));
            $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal);
            $total_1 = $this->db->get()->row()->total;

            $tanggal = date('Y-m', strtotime("-2 Months"));
            $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal);
            $total_2 = $this->db->get()->row()->total;

            $tanggal = date('Y-m', strtotime("-3 Months"));
            $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal);
            $total_3 = $this->db->get()->row()->total;

            $tanggal = date('Y-m', strtotime("-4 Months"));
            $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal);
            $total_4 = $this->db->get()->row()->total;

            $tanggal = date('Y-m', strtotime("-5 Months"));
            $this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal);
            $total_5 = $this->db->get()->row()->total;

            if ($total_1 == null) {
                $total_1 = 0;
            }
            if ($total_2 == null) {
                $total_2 = 0;
            }
            if ($total_3 == null) {
                $total_3 = 0;
            }
            if ($total_4 == null) {
                $total_4 = 0;
            }
            if ($total_5 == null) {
                $total_5 = 0;
            }

            ?>
            <canvas id="myChart" style="width:100%;max-width:500px"></canvas>

            <script>
                var xValues = ["<?= $bulan_5 ?>", "<?= $bulan_4 ?>", "<?= $bulan_3 ?>", "<?= $bulan_2 ?>", "<?= $bulan_1 ?>", "<?= $bulan_sekarang ?>"];
                var yValues = [<?= $total_5 ?>, <?= $total_4 ?>, <?= $total_3 ?>, <?= $total_2 ?>, <?= $total_1 ?>, <?= $penjualan_bulan_ini ?>, ];
                var barColors = ["blue", "blue", "blue", "blue", "blue", "blue"];

                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: "Penjualan 6 bulan terakhir"
                        }
                    }
                });
            </script>
        </div>
    </div>
    <div class="card col-4">
        <div class="card-body">
            <h4 class="card-title">Produk best seller</h4>
            <?php foreach ($terlaris as $terlaris) { ?>
            <div class="shadow-sm p-3 mb-2 bg-body-tertiary rounded d-flex justify-content-between align-items-center">
                <div>
                    <?= $terlaris['nama'] ?>
                </div>
                <div class="badge badge-primary rounded">
                <?= $terlaris['jumlah_produk'] ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>