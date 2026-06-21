<div>
    <div>
        <form action="<?= base_url('laporan') ?>" method="get">
            <div class="col-md-3">
                <label class="form-label">Tanggal Awal</label>
                <input type="date" name="tgl_awal" class="form-control" value="<?= $tgl_awal ?>">
            </div>
            <div>
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" class="form-control" value="<?= $tgl_akhir ?>">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Tampilkan
                </button>
                <a href="<?= base_url('Laporan/pdf?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir) ?>" target="_blank" class="btn btn-danger">
                    <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
                </a>
            </div>
        </form>
    </div>
</div>