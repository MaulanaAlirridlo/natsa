<?php
session_start();
include './include/conn.php';
include './include/script.php';

$id = $_SESSION['id_pengguna'];
$query = "SELECT * from pengguna where id_pengguna='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!isset($_SESSION['id_pengguna'])) {
  $id = "";
  kickUser($id);
}

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
    <div class="col">
      <div class="row">
        <h1 class="username" style="color:#080a0a;"><?php echo $row['username']; ?></h1></span>
      </div>
      <div class="row  border info-wrapper">
        <div class="col p-30">
          <div class="row pl-2">
            <div class="col-5">
              <div class="rounded-circle photo-profile">
                <img alt="User Pic" src="./assets/img/<?php echo $row['nama_foto']; ?>" id="profile-image1" class="w-100">
              </div>
            </div>
            <div class="col info-content">
              <p class="font-weight-bold">Data diri</p>
              <div class="row">
                <div class="col-3">
                  <p>No Telepon</p>
                </div>
                <div class="col">
                  <p><?php echo $row['no_hp']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <p>Whatsapp</p>
                </div>
                <div class="col">
                  <p><?php echo $row['wa']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <p>Email</p>
                </div>
                <div class="col">
                  <p><?php echo $row['email']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <p>Alamat</p>
                </div>
                <div class="col">
                  <p><?php echo $row['alamat']; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-3">
                  <p> Deskripsi </p>
                </div>
                <div class="col">
                  <p><?php echo $row['deskripsi']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</body>

</html>