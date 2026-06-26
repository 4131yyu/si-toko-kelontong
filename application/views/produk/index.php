<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span>Daftar Produk</span>
        <a href="<?= base_url('Produk/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th class="text-end">Stok</th>
                    <th class="text-end">Harga Beli</th>
                    <th class="text-end">Harga Jual</th>
                    <th style="width:140px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($produk)): ?>
                    <tr><td colspan="7" class="text-center text-muted py-3">Belum ada produk</td></tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($produk as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama_produk ?></td>
                        <td><?= $p->nama_kategori ?></td>
                        <td class="text-end">
                            <?php if ($p->stok <= 10): ?>
                                <span class="badge bg-danger"><?= $p->stok ?></span>
                            <?php else: ?>
                                <?= $p->stok ?>
                            <?php endif; ?>
                        </td>
                        <td class="text-end">Rp <?= number_format($p->harga_beli, 0, ',', '.') ?></td>
                        <td class="text-end">Rp <?= number_format($p->harga_jual, 0, ',', '.') ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('Produk/edit/' . $p->id_produk) ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="<?= base_url('Produk/hapus/' . $p->id_produk) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>