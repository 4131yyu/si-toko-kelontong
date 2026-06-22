<?php $is_edit = isset($produk) && $produk; ?>
<div class="card shadow-sm" style="max-width:600px;">
    <div class="card-header bg-white">
        <?= $is_edit ? 'Edit Produk' : 'Tambah Produk' ?>
    </div>
    <div class="card-body">
        <form action="<?= $is_edit ? base_url('Produk/update/' . $produk->id_produk) : base_url('Produk/simpan') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" value="<?= $is_edit ? $produk->nama_produk : '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="id_kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k->id_kategori ?>"
                            <?= ($is_edit && $produk->id_kategori == $k->id_kategori) ? 'selected' : '' ?>>
                            <?= $k->nama_kategori ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" min="0" value="<?= $is_edit ? $produk->stok : 0 ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Beli</label>
                    <input type="number" name="harga_beli" class="form-control" min="0" step="0.01" value="<?= $is_edit ? $produk->harga_beli : '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control" min="0" step="0.01" value="<?= $is_edit ? $produk->harga_jual : '' ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="<?= base_url('Produk') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>