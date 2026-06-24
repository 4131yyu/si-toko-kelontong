<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white text-center">
                <i class="bi bi-check-circle"></i> Transaksi Berhasil!
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless mb-3">
                    <tr>
                        <th style="width:140px;">Kode Transaksi</th>
                        <td>: <?= $transaksi->kode_transaksi ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>: <?= date('d-m-Y H:i', strtotime($transaksi->tgl_transaksi)) ?></td>
                    </tr>
                    <tr>
                        <th>Kasir</th>
                        <td>: <?= $transaksi->nama_lengkap ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
