<?php
session_start();
include './include/script.php';

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
        <div class="photo-profile">
          <img 
          src="https://sps.widyatama.ac.id/wp-content/uploads/2020/08/dummy-profile-pic-male1-300x300.jpg"
          alt="profile">
        <input type="file" name="foto" id="foto" class="pl-2">
        </div>
      </div>
      <div class="row mt-2">
          <div class="col-2">
            <label for="fnama">Nama</label>
          </div>
          <div class="col-75 d-flex">
            <input class="form-control w-50 nama-depan" type="text" id="nama-depan" name="nama-depan" placeholder="Nama depan">         
            <input class="form-control w-50" type="text" id="nama-belakang" name="nama-belakang" placeholder="Nama belakang">
         </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fnohp">No HP</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="number" id="fnohp" name="nohp" placeholder="No hp">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fwa">WhatsApp</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="number" id="fwa" name="nowa" placeholder="No wa">
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Alamat">Alamat</label>
          </div>
          <div class="col-75">
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat""></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Deskripsi">Deskripsi</label>
          </div>
          <div class="col-75">
            <textarea name="alamat" id="deskripsi" class="form-control" placeholder="Deskripsi anda""></textarea>
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