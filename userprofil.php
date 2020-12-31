<?php
session_start();
include './include/conn.php';

$id = $_SESSION['id_pengguna'];
$query = "SELECT * from pengguna where id_pengguna='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/userlist.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./assets/css/userprofile.css">
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
  <title>Profil pengguna | natsa</title>

<body>
  <?php include './layouts/navbar.php' ?>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-2">
      <?php include('./layouts/user.actionList.php') ?>
    </div>

    <div class="col p-0 mt-3 border">

    <div class="col p-0 border konten-profil">

      <div class="row">
        <div class="col ">
          <div class="row pl-2">
            <div class="col-3">
              <div class="w-100 rounded-circle">
                <img alt="User Pic" src="./assets/img/<?php echo $row['nama_foto'];?>" id="profile-image1" class="w-100">
              </div>
            </div>
            <div class="col user-name">
              <h1 style="color:#080a0a;"><?php echo $row['username'];?></h1></span>
            </div>
          </div>
          <div class="col">
            <div class="row mt-5">
              <div class="col-2">
                <p>No Telepon</p>
              </div>
              <div class="col-1">
                <p class="text-center">:</p>
              </div>
              <div class="col">
                <p><?php echo $row['no_hp'];?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <p>Whatsapp</p>
              </div>
              <div class="col-1">
                <p class="text-center">:</p>
              </div>
              <div class="col">
                <p><?php echo $row['wa'];?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <p>Email</p>
              </div>
              <div class="col-1">
                <p class="text-center">:</p>
              </div>
              <div class="col">
                <p><?php echo $row['email'];?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <p>Alamat</p>
              </div>
              <div class="col-1">
                <p class="text-center">:</p>
              </div>
              <div class="col">
                <p><?php echo $row['alamat'];?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <p> Deskripsi </p>
              </div>
              <div class="col-1">
                <p class="text-center">:</p>
              </div>
              <div class="col">
                <p><?php echo $row['deskripsi'];?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>