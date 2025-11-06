<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
   <!-- Memuat jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
    <!-- Memuat Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Memuat Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/MaterialBootstrap/font/fontawesome/css/all.css">
  <!-- BS4 CORE -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/MaterialBootstrap/css/bootstrap.min.css">
  <!-- MATERIAL DESIGN -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/MaterialBootstrap/css/mdb.min.css">
  <!-- DATATABLES -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/MaterialBootstrap/css/addons/datatables.css">
  <!-- ANIMATE.CSS -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/vendor/Animate.css/animate.css">
  <!-- MY STYLE -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
  <!-- CUSTOM COLOR -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/colors.css">
  <!-- FAVICON -->
  <link rel="shortcut icon" href="<?= BASEURL; ?>/img/assets/icon.png" type="image/x-icon">

  <title><?= $data['judul']; ?></title>
</head>

<body class="bg-gray">
<script>
$(document).ready(function() {
    // Fungsi untuk menginisialisasi Select2
    function initSelect2() {
        $('.select2').select2();
    }

    // Event handler untuk menampilkan modal
    $('.tambahkan').on('shown.bs.modal', function (e) {
        // Panggil fungsi inisialisasi Select2 setelah modal ditampilkan
        initSelect2();
    });
});
</script>