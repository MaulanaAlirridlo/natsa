<?php
session_start();

include './include/script.php';

?>
<html>
<head>
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/lupapassword.css">
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">

  <script src="./vendor/components/jquery/jquery.min.js"></script>

  <title>Lupa password | natsa</title>
</head>

<body>
  <?php include './layouts/navbar.php'?>
  <div class="container">
    <div class="form-group w-50 mx-auto mt-5 border p-5 rounded">
      <h1 class="text-center">Lupa password</h1>
      <p class="text-center">Masukkan email anda di kolom dibawah</p>
      <form method="POST" action="">
        <label>Email</label><br>
        <input type="email" class="form-control" id="email"><br>
        <p>
        <input class="btn btn-primary active" type="button" value="Minta" id="mintaResetPassword">
      </form>
      <div class="alert alert-danger mt-2" role="alert" id="pesanError">error</div>
      <div class="alert alert-success mt-2" role="alert" id="pesanTunggu">Mohon tunggu beberapa saat</div>

    </div>
  </div>

  <script src="./assets/js/passwordRequest.js"></script>

</body>

</html>