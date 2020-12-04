<?php
session_start();
include './include/script.php';

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/addpassword.css">
  <link rel="stylesheet" href="./assets/css/userlist.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
</head>

<body style="overflow-x: hidden;">
  <?php include './layouts/navbar.php' ?>
  <div class="row">
    <div class="col-2">
      <?php include('./layouts/user.actionList.php') ?>
    </div>
    <div class="col">
      <form action="/action_page.php" class="form-group">
        <div class="row mt-2">
          <div class="col-2">
            <label for="Password lama">Password lama</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="password" id="Password lama" name="Password lama" placeholder="Your Password lama..">
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Password baru">Password baru</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="password" id="Password baru" name="Password baru" placeholder="Your Password baru..">
          </div>
        </div>

        <div class="row pl-3">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>

</body>

</html>