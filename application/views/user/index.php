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