<?php
session_start();
include './include/script.php';

?>
<html>
<head>
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/lupapassword.css">
  <title>lupa password</title>
</head>

<body>
  <?php include './layouts/navbar.php'?>
  <div class="container">
    <div class="form-group w-50 mx-auto mt-5 border p-5 rounded">
      <h1>Lupa password</h1>
      <form method="POST">
        <label>Email</label><br>
        <input type="email" class="form-control"><br>
        <p>
          <button>Submit</button>
      </form>
    </div>
  </div>
</body>

</html>