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

        </div>

    </div>

</div>