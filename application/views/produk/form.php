<?php $is_edit = isset($produk) && $produk; ?>
<div>
    <div class="card-header bg-white">
        <?= $is_edit ? 'Edit Produk' : 'Tambah Produk' ?>
    </div>
</div>