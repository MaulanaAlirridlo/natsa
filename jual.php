<?php
session_start();
include './include/script.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./vendor/components/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./assets/css/jual.galeri.css">
  <link rel="stylesheet" href="./assets/css/buttontambahsawah.css">
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">

  <script src="./vendor/components/jquery/jquery.min.js"></script>
  <title>Galeri penjualan | natsa</title>
</head>
<body>
  <?php include('./layouts/navbar.php') ?>
  <?php include('./layouts/jual.galeri.php') ?>
  <a href="./formtambahsawah.php" class="button-tambah-sawah">
    <?php include('./layouts/buttontambahsawah.php') ?>
  </a>

  <script src="./assets/js/jual.js"></script>
</body>
</html>