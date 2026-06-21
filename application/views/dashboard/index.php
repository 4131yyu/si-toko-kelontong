<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 small">Transaksi Hari Ini</p>
                        <h3 class="mb-0"><?= $total_transaksi ?></h3>
                    </div>
                    <i class="bi bi-receipt" style="font-size:2rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 small">Omzet Hari Ini</p>
                        <h5 class="mb-0">Rp <?= number_format($omzet_hari_ini, 0, ',', '.') ?></h5>
                    </div>
                    <i class="bi bi-cash-coin" style="font-size:2rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 small">Total Produk</p>
                        <h3 class="mb-0"><?= $total_produk ?></h3>
                    </div>
                    <i class="bi bi-box-seam" style="font-size:2rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-secondary shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 small">Total Kategori</p>
                        <h3 class="mb-0"><?= $total_kategori ?></h3>
                    </div>
                    <i class="bi bi-tags" style="font-size:2rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6"> 
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <i class="bi bi-exclamation-triangle text-warning"></i> Stok Menipis (&le; 10)
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <thead>
                        <tr><th>Produk</th><th class="text-end">Stok</th></tr>
                    </thead>
                    <tbody>
                        <?php if (empty($stok_menipis)): ?>
                            <tr><td colspan="2" class="text-center text-muted py-3">Semua stok aman</td></tr>
                        <?php else: ?>
                            <?php foreach ($stok_menipis as $p): ?>
                            <tr>
                                <td><?= $p->nama_produk ?></td>
                                <td class="text-end">
                                    <span class="badge bg-danger"><?= $p->stok ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <i class="bi bi-trophy text-success"></i> Produk Terlaris
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <thead>
                        <tr><th>Produk</th><th class="text-end">Terjual</th></tr>
                    </thead>
                    <tbody>
                        <?php if (empty($produk_terlaris)): ?>
                            <tr><td colspan="2" class="text-center text-muted py-3">Belum ada data transaksi</td></tr>
                        <?php else: ?>
                            <?php foreach ($produk_terlaris as $p): ?>
                            <tr>
                                <td><?= $p->nama_produk ?></td>
                                

    </div>

</div>