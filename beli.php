<?php
session_start();
include './include/conn.php';
include './include/script.php';
$jenis = "jual";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/index.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./assets/css/filter.css">
  <link rel="stylesheet" href="./assets/css/katalog.css">
  <link rel="stylesheet" href="./assets/css/katalog.desc.css">
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
  <title>NatSa</title>
</head>

<body onload="">

  <?php include './layouts/navbar.php'?>
  <div class="row">
    <div class="col-1"></div>

    <div class="col-2 filter-container p-0">
      <?php include './layouts/filter.php'?>
    </div>
    <div class="col katalog-container" id="dataSawah">
      <?php include './layouts/katalog.php'?>
    </div>
  </div>

  <div class="row align-items-center mt-2 mb-2">
    <div class="col-6 mr-3"></div>
    <div class="col pl-5">
      <button class="btn btn-primary font-weight-bold" id="loadMore" current="">LOAD MORE</button>
    </div>
    <div style="col">
    </div>
  </div>


  <script src="./vendor/components/jquery/jquery.min.js"></script>
  <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="./assets/js/index.js"></script>

</body>

</html>