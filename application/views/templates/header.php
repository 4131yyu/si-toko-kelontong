<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - Toko Kelontong' : 'Toko Kelontong' ?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"> -->
    <link href="<?= base_url('assets/css/bootstrap-icons/bootstrap-icons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    </head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('Dashboard') ?>">
            <i class="bi bi-shop"></i> Toko Kelontong
        </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item d-flex align-items-center text-white me-3">
                    <i class="bi bi-person-circle me-1"></i>
                    <?= $this->session->userdata('nama_lengkap') ?>
                    <span class="badge bg-light text-dark ms-2"><?= ucfirst($this->session->userdata('role')) ?></span>
                </li>
       <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm" href="<?= base_url('Auth/logout') ?>"
                       onclick="return confirm('Anda yakin ingin keluar?')">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div class="d-flex" style="margin-top:56px;">  