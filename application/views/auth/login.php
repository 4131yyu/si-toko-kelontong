<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Toko Kelontong</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-icons/bootstrap-icons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <div class="card shadow-lg border-0" style="width:380px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <i class="bi bi-shop" style="font-size:2.5rem; color:#2E75B6;"></i>
                <h4 class="mt-2 mb-0">Toko Kelontong</h4>
                <p class="text-muted small">Sistem Informasi Manajemen</p>
            </div>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger py-2><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('Auth/login') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>

            <!-- <div class="text-center mt-3 small text-muted">
                <p class="mb-0">Demo akun:</p>
                <p class="mb-0">admin / admin123</p>
                <p class="mb-0">kasir1 / kasir123</p>
            </div> -->
        </div>
    </div>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>" ></script>
</body>
</html>