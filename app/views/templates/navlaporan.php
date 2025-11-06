<?php
if (!isset($_SESSION['Login'])) {
  SweetAlert::setSwalAlert("Perhatian", "Anda harus login terlebih dahulu", "warning");
  header('Location:' . BASEURL . '/auth');
  exit;
}
?>

<!-- Nav -->
<div class="indigo sticky-top" id="navdashboard" style="z-index:1">
  <div class="container py-1">
    <ul id="no-waves" class="nav md-tabs justify-content-center indigo shadow-none mx-0 mb-0">

      <li class="nav-item mr-2">
        <a class="nav-link indigo accent-2 rounded" href="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>">
          Dashboard
        </a>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Laporan') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>Admin/laporan">
          Home Laporan
        </a>
      </li>

      <?php if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) : ?>

        <li class="nav-item mr-2">
          <a class="nav-link <?php if ($data['judul'] == 'Laporan Transaksi') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/Admin/laporantransaksi">
            Transaksi
          </a>
        </li>

        <li class="nav-item mr-2">
          <a class="nav-link <?php if ($data['judul'] == 'Laporan Arsip Transaksi') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/Laporan/arsip_transaksi">
            Arsip Transaksi
          </a>
        </li>

        <li class="nav-item mr-2">
          <a class="nav-link <?php if ($data['judul'] == 'Laporan Kendaraan') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/Admin/laporankendaraan">
            Kendaraan
          </a>
        </li>

        <li class="nav-item mr-2">
          <a class="nav-link <?php if ($data['judul'] == 'Laporan Sopir') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/Admin/laporansopir">
            Sopir
          </a>
        </li>

        <li class="nav-item mr-2">
          <a class="nav-link <?php if ($data['judul'] == 'Laporan Karyawan') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/Admin/laporankaryawan">
            Karyawan
          </a>
        </li>

        <li class="nav-item mr-2">
          <a class="nav-link <?php if ($data['judul'] == 'Laporan Pelanggan') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/Admin/laporanpelanggan">
            Pelanggan
          </a>
        </li>

      <?php endif; ?>

    </ul>
  </div>
</div>
<!-- Akhir Nav -->