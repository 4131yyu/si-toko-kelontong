<?php $is_edit = isset($user) && $user; ?>
<div class="card shadow-sm" style="max-width:600px;">
    <div class="card-header bg-white">
        <?= $is_edit ? 'Edit User' : 'Tambah User' ?>
    </div>