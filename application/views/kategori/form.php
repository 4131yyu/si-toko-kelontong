<?php $is_edit = isset($kategori) && $kategori; ?>
<div class="card shadow-sm" style="max-width:600px;">
    <div class="card-header bg-white">
        <?= $is_edit ? 'Edit Kategori' : "Tambah Kategori" ?>
    </div>
    <div class="card-body">
        <form action="<?= $is_edit ? base_url('Kategori/update/' . $kategori->id_kategori->id_kategori) : base_url('Kategori/simpan') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="<?= $is_edit ? $kategori->nama_kategori : '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"><?= $is_edit ? $kategori->deskripsi : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="<?= base_url('Kategori') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>