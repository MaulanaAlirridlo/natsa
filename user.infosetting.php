<?php
session_start();
include './include/script.php';

$id = $_SESSION['id_pengguna'];
$query = "SELECT * from pengguna where id_pengguna='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/userinfosetting.css">
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
      <div class="row p-3">
        <div class="col p-0">
          <div class="photo-profile">
            <img src="./assets/img/<?php echo $row['nama_foto'];?>" alt="profile">
            <input type="file" name="foto" id="foto" class="pl-2">
          </div>
        </div>
      </div>
      <div class="row mt-2">
          <div class="col-2">
            <label for="fnama">Nama</label>
          </div>
          <div class="col-75 d-flex">
            <input class="form-control w-50 nama-depan" type="text" id="nama-depan" name="nama-depan" placeholder="Nama depan" value="<?php echo $row['nama_depan'];?>">         
            <input class="form-control w-50" type="text" id="nama-belakang" name="nama-belakang" placeholder="Nama belakang" value="<?php echo $row['nama_belakang'];?>">
         </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fnohp">No HP</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="number" id="fnohp" name="nohp" placeholder="No hp" value="<?php echo $row['no_hp'];?>">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fwa">WhatsApp</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="number" id="fwa" name="nowa" placeholder="No wa" value="<?php echo $row['wa'];?>">
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Alamat">Alamat</label>
          </div>
          <div class="col-75">
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat""><?php echo $row['alamat'];?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Deskripsi">Deskripsi</label>
          </div>
          <div class="col-75">
            <textarea name="alamat" id="deskripsi" class="form-control" placeholder="Deskripsi anda""><?php echo $row['deskripsi'];?></textarea>
          </div>
        </div>
        <div class="pl-3 row py-3">
          <div class="col-2"></div>
          <div class="col-75">
            <input type="submit" value="Simpan" class="ml-auto">
          </div>
        </div>
      </form>
    </div>
  </div>

</body>
</html>