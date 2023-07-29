<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/select2.min.css")?>" />
    <script src="<?= base_url("assets/js/jquery.min.js")?>"></script>
    <script src="<?= base_url("assets/js/select2.min.js")?>"></script>
    <title>Minimarket</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
  <a class="navbar-brand" href="#">Minimarket</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          File
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item bg-danger text-white" href="<?= base_url("auth/logout")?>">Keluar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Master
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?= base_url("kasir")?>">Kasir</a>
          <a class="dropdown-item" href="<?= base_url("barang")?>">Barang</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Kasir
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?= base_url("shift/buka")?>">Buka Shift</a>
          <a class="dropdown-item" href="<?= base_url("shift/lihat")?>">Lihat Shift</a>
          <a class="dropdown-item" href="<?= base_url("shift/tutup")?>">Tutup Shift</a>
        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url("penjualan")?>">Penjualan</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url("laporan")?>">Laporan</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<main>
