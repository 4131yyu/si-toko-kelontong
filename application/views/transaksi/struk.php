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
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Produk</th>
                            <th class="text-end">Jumlah</th>
                            <th class="text-end">Harga</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail as $d): ?>
                        <tr>
                            <td><?= $d->nama_produk ?></td>
                            <td class="text-end"><?= $d->jumlah ?></td>
                            <td class="text-end">Rp <?= number_format($d->harga_satuan, 0, ',', '.') ?></td>
                            <td class="text-end">Rp <?= number_format($d->subtotal, 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total</th>
                            <th class="text-end">Rp <?= number_format($transaksi->total_harga, 0, ',', '.') ?></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-end">Bayar</th>
                            <th class="text-end">Rp <?= number_format($transaksi->bayar, 0, ',', '.') ?></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-end">Kembalian</th>
                            <th class="text-end">Rp <?= number_format($transaksi->kembalian, 0, ',', '.') ?></th>
                        </tr>
                    </tfoot>
                </table>

                <div class="text-center mt-3">
                    <a href="<?= base_url('Transaksi') ?>" class="btn btn-primary">
                        <i class="bi bi-cart-plus"></i> Transaksi Baru
                    </a>
                    <button onclick="window.print()" class="btn btn-outline-secondary">
                        <i class="bi bi-printer"></i> Cetak
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
