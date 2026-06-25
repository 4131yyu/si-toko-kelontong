<?php $is_edit = isset($user) && $user; ?>
<div class="card shadow-sm" style="max-width:600px;">
    <div class="card-header bg-white">
        <?= $is_edit ? 'Edit User' : 'Tambah User' ?>
    </div>
    <div class="card-body">
        <form action="<?= $is_edit ? base_url('User/update/' . $user->id_user) : base_url('User/simpan') ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control"
                       value="<?= $is_edit ? $user->username : '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control"
                value="<?= $is_edit ? $user->nama_lengkap : ''?>" required>
</div>