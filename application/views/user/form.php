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
<div class="mb-3">
                <label class="form-label">
                    Password <?= $is_edit ? '(kosongkan jika tidak ingin mengubah)' : '' ?>
                </label>
                <input type="password" name="password" class="form-control" <?= $is_edit ? '' : 'required' ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="kasir" <?= ($is_edit && $user->role === 'kasir') ? 'selected' : '' ?>>Kasir</option>
                    <option value="admin" <?= ($is_edit && $user->role === 'admin') ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="<?= base_url('User') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
