<?php
session_start();
include './include/conn.php';
include './include/script.php';
// echo $_SESSION['id_pengguna'];

if (!isset($_SESSION['id_pengguna'])) {
  $id = "";
  kickUser($id);
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/userchangepassword.css">
  <link rel="stylesheet" href="./assets/css/userlist.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">

  <script src="./vendor/components/jquery/jquery.min.js"></script>

  <title>Ubah password | natsa</title>
</head>

<body style="overflow-x: hidden;">
  <?php include './layouts/navbar.php' ?>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-2">
      <?php include('./layouts/user.actionList.php') ?>
    </div>
    <div class="row border mt-4 changepassword-wrapper">
      <div class="col">
        <form action="" class="form-group" method="post">
          <div class="row mt-2">
            <div class="col-2">
              <label for="PasswordLama">Password lama</label>
            </div>
            <div class="col-75 col">
              <input class="form-control" type="password" id="passwordLama" name="passwordLama" placeholder="Your Password lama.." required>
            </div>
          </div>
          <div class="row">
            <div class="col-2">
              <label for="Password baru">Password baru</label>
            </div>
            <div class="col-75 col">
              <input class="form-control" type="password" id="passwordBaru" name="passwordBaru" placeholder="Your Password baru.." required>
            </div>
          </div>
          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-75 col">
              <div class="col alert alert-danger" role="alert" id="pesanError">error</div>
            </div>
          </div>
          <div class="row pl-3">
            <div class="col">
              <input type="button" class="btn btn-secondary active float-right" value="Submit" name="ganti" id="gantiPassword">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="./assets/js/ubahPassword.js"></script>
</body>

</html>