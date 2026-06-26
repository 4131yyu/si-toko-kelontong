<div class="card shadow-sm mb-3">
    <div class="card-body">
        <form action="<?= base_url('laporan') ?>" method="get">
            <div class="col-md-3">
                <label class="form-label">Tanggal Awal</label>
                <input type="date" name="tgl_awal" class="form-control" value="<?= $tgl_awal ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" class="form-control" value="<?= $tgl_akhir ?>">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Tampilkan
                </button>
                <a href="<?= base_url('Laporan/pdf?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir) ?>" target="_blank" class="btn btn-danger">
                    <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                </a>
            </div>
        </form>
    </div>
</div>
<div class="card shadow-sm">
    <div class="card-header bg-white">
        Laporan Penjualan: <?= date('d-m-Y', strtotime($tgl_awal)) ?> s/d <?= date('d-m-Y', strtotime($tgl_akhir)) ?>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($transaksi)): ?>
                    <tr><td colspan="5" class="text-center text-muted py-3">Tidak ada transaksi pada periode ini</td></tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($transaksi as $t): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t->kode_transaksi ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($t->tgl_transaksi)) ?></td>
                        <td><?= $t->nama_lengkap ?></td>
                        <td class="text-end">Rp <?= number_format($t->total_harga, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <?php if (!empty($transaksi)): ?>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total Keseluruhan</th>
                    <th class="text-end">Rp <?= number_format($total_keseluruhan, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>
</div>