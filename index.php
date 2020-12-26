<?php
session_start();
include './include/script.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/index.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./assets/css/filter.css">
  <link rel="stylesheet" href="./assets/css/katalog.css">
  <link rel="stylesheet" href="./assets/css/katalog.desc.css">
  <title>NatSa</title>
</head>

<body>

  <?php include './layouts/navbar.php'?>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-2 filter-container p-0">
      <?php include './layouts/filter.php'?>
    </div>
    <div class="col katalog-container">
      <?php include './layouts/katalog.php'?>
    </div>
  </div>


  <script src="./vendor/jquery/jquery-3.5.1.min.js"></script>
  <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="./assets/js/index.js"></script>

</body>

</html>