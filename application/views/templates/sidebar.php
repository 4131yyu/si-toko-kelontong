<?php
$role = $this->session->userdata('role');
$current_controller = strtolower($this->uri->segment(1) ?: 'dashboard');
$current_method = strtolower($this->uri->segment(2) ?: 'index');

if (!function_exists('sidebar_active')) {
    function sidebar_active($controller, $method = null)
    {
        $CI =& get_instance();
        $current_controller = strtolower($CI->uri->segment(1) ?: 'dashboard');
        $current_method = strtolower($CI->uri->segment(2) ?: 'index');
        $controller = strtolower($controller);
        $method = $method !== null ? strtolower($method) : null;

        if ($method !== null) {
            return $current_controller === $controller && $current_method === $method ? 'active' : '';
        }
        return $current_controller === $controller ? 'active' : '';
    }
}
?>
<nav class="sidebar bg-secondary" style="width:240px; min-height:calc(100vh - 56px);">
    <div class="d-flex flex-column p-3">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="<?= base_url('Dashboard') ?>" class="nav-link text-white <?= sidebar_active('Dashboard') ?>">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <?php if ($role === 'admin'): ?>
            <li>
                <a href="<?= base_url('Kategori') ?>" class="nav-link text-white <?= sidebar_active('Kategori') ?>">
                    <i class="bi bi-tags me-2"></i> Kategori
                </a>
            </li>
            <li>
                <a href="<?= base_url('Produk') ?>" class="nav-link text-white <?= sidebar_active('Produk') ?>">
                    <i class="bi bi-box-seam me-2"></i> Produk
                </a>
            </li>
            <?php endif; ?>
            <li>
                <a href="<?= base_url('Transaksi') ?>" class="nav-link text-white <?= $current_controller === 'transaksi' && $current_method !== 'riwayat' ? 'active' : '' ?>">
                    <i class="bi bi-cart-plus me-2"></i> Transaksi
                </a>
            </li>
            <li>
                <a href="<?= base_url('Transaksi/riwayat') ?>" class="nav-link text-white <?= sidebar_active('Transaksi', 'riwayat') ?>">
                    <i class="bi bi-clock-history me-2"></i> Riwayat Transaksi
                </a>
            </li>
            <?php if ($role === 'admin'): ?>
            <li>
                <a href="<?= base_url('Laporan') ?>" class="nav-link text-white <?= sidebar_active('Laporan') ?>">
                    <i class="bi bi-file-earmark-pdf me-2"></i> Laporan
                </a>
            </li>
            <li>
                <a href="<?= base_url('User') ?>" class="nav-link text-white <?= sidebar_active('User') ?>">
                    <i class="bi bi-people me-2"></i> Manajemen User
                </a>
            </li>
            <?php endif; ?>   
        </ul>
    </div>
    </nav>
    <main class="flex-fill p-4" style="background:#f4f6f9; min-height:calc(100vh - 56px);">
        <h4 class="mb-4"><?= isset($title) ? $title : '' ?></h4>
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>