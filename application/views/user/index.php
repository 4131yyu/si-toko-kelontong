<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span>Manajemen User</span>
        <a href="<?= base_url('User/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah User
        </a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Role</th>
                    <th>Dibuat</th>
                    <th style="width:140px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                    <tr><td colspan="6" class="text-center text-muted py-3">Belum ada user</td></tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($users as $u): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u->username ?></td>
                        <td><?= $u->nama_lengkap ?></td>
                        <td>
                            <span class="badge <?= $u->role === 'admin' ? 'bg-primary' : 'bg-secondary' ?>">
                                <?= ucfirst($u->role) ?>
                            </span>
                        </td>
                        <td><?= date('d-m-Y', strtotime($u->created_at)) ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('User/edit/' . $u->id_user) ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="<?= base_url('User/hapus/' . $u->id_user) ?>" class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus user ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>