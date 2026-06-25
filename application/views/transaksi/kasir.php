<div class="card shadow-sm">
    <div class="card-header bg-white">
        Form Transaksi Penjualan
    </div>
    <div class="card-body">
        <form action="<?= base_url('Transaksi/proses') ?>" method="post" id="form-transaksi">
            <table class="table table-bordered align-middle" id="tabel-item">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th style="width:120px;">Stok</th>
                        <th style="width:120px;">Jumlah</th>
                        <th style="width:160px;">Harga Satuan</th>
                        <th style="width:160px;">Subtotal</th>
                        <th style="width:60px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="item-row">
                        <td>
                            <select name="id_produk[]" class="form-select select-produk" required>
                                <option value="">-- Pilih Produk --</option>
                                <?php foreach ($produk as $p): ?>
                                    <option value="<?= $p->id_produk ?>"
                                            data-harga="<?= $p->harga_jual ?>"
                                            data-stok="<?= $p->stok ?>">
                                        <?= $p->nama_produk ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="text-end stok-cell">-</td>
                        <td>
                            <input type="number" name="jumlah[]" class="form-control input-jumlah" min="1" value="1" required>
                        </td>
                        <td class="text-end harga-cell">Rp 0</td>
                        <td class="text-end subtotal-cell">Rp 0</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm btn-hapus-row">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-outline-primary btn-sm mb-3" id="btn-tambah-row">
                <i class="bi bi-plus-lg"></i> Tambah Item
            </button>

            <div class="row justify-content-end">
                <div class="col-md-4">
                    <table class="table">
                        <tr>
                            <th>Total Belanja</th>
                            <td class="text-end" id="total-belanja">Rp 0</td>
                        </tr>
                        <tr>
                            <th>Bayar</th>
                            <td>
                                <input type="number" name="bayar" id="input-bayar" class="form-control text-end" min="0" step="0.01" required>
                            </td>
                        </tr>
                        <tr>
                            <th>Kembalian</th>
                            <td class="text-end" id="kembalian">Rp 0</td>
                        </tr>
                    </table>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Proses Transaksi
            </button>
            <button type="button" class="btn btn-outline-danger btn mx-3" id="btn-reset-row">
                <i class="bi bi-arrow-counterclockwise"></i> Reset Pilihan
            </button>
        </form>
    </div>
</div>

