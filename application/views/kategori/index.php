<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span>Daftar Kategori</span>
        <a href="<?= base_url('Kategori/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Kategori
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:60px;">No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th style="width:140px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($kategori)): ?>
                    <tr><td colspan="4" class="text-center text-muted py-3">Belum ada kategori</td></tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($kategori as $k): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k->nama_kategori ?></td>
                        <td><?= $k->deskripsi ?: '-' ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('Kategori/edit/' . $k->id_kategori) ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="<?= base_url('Kategori/hapus/' . $k->id_kategori) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
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
