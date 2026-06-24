<div class="card shadow-sm">
    <div class="card-header bg-white">
        Riwayat Transaksi
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
                    <th class="text-end">Bayar</th>
                    <th class="text-end">Kembalian</th>
                    <th style="width:90px;" class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($transaksi)): ?>
                    <tr><td colspan="8" class="text-center text-muted py-3">Belum ada transaksi</td></tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($transaksi as $t): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $t->kode_transaksi ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($t->tgl_transaksi)) ?></td>
                        <td><?= $t->nama_lengkap ?></td>
                        <td class="text-end">Rp <?= number_format($t->total_harga, 0, ',', '.') ?></td>
                        <td class="text-end">Rp <?= number_format($t->bayar, 0, ',', '.') ?></td>
                        <td class="text-end">Rp <?= number_format($t->kembalian, 0, ',', '.') ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('Transaksi/struk/' . $t->id_transaksi) ?>" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
