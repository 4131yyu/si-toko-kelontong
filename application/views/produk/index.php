<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span>Daftar Produk</span>
        <a href="<?= base_url('Produk/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i>
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
        </table>
    </div>
</div>