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
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/userinfosetting.css">
  <link rel="stylesheet" href="./assets/css/userlist.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
  <title>Pengaturan informasi pengguna | natsa</title>

  <script src="./vendor/components/jquery/jquery.min.js"></script>
</head>

<body style="overflow-x: hidden;">
  <?php include './layouts/navbar.php' ?>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-2">
      <?php include './layouts/user.actionList.php' ?>
    </div>
    <div class="row border width">
      <div class="col">
        <form action="" class="form-group" method="POST" enctype="multipart/form-data">
          <div class="row p-3">
            <div class="photo-profile">
              <img src="./assets/img/<?php echo $row['nama_foto']; ?>" alt="profile">
              <input type="file" name="foto" class="pl-2" id="fotoProfil">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-2">
              <label for="username">Username</label>
            </div>
            <div class="col-75 col">
              <input class="form-control" type="text" id="username" name="username" placeholder="Masukkan username" value="<?php echo $row['username']; ?>" required>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-2">
              <label for="fnama">Nama </label>
            </div>
            <div class="col-75 col d-flex">
              <input class="form-control w-50 nama-depan" type="text" id="namaDepan" name="nama_depan" placeholder="Nama depan" value="<?php echo $row['nama_depan']; ?>" required maxlength="20">
              <input class="form-control w-50" type="text" id="namaBelakang" name="nama_belakang" placeholder="Nama belakang" value="<?php echo $row['nama_belakang']; ?>" required maxlength="20">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-2">
              <label for="fnohp">No HP</label>
            </div>
            <div class="col-75 col">
              <input class="form-control" type="number" id="fnohp" name="no_hp" placeholder="No hp" value="<?php echo $row['no_hp']; ?>" required oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="13">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-2">
              <label for="fwa">WhatsApp</label>
            </div>
            <div class="col-75 col">
              <input class="form-control" type="number" id="fwa" name="wa" placeholder="No wa" value="<?php echo $row['wa']; ?>" required oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="13">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-2">
              <label for="email">Email</label>
            </div>
            <div class="col-75 col">
              <input class="form-control" type="email" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required maxlength="30" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-2">
              <label for="alamatPengguna">Alamat</label>
            </div>
            <div class="col-75 col">
              <textarea name="alamat" id="alamatPengguna" class="form-control" placeholder="Alamat" required><?php echo $row['alamat']; ?></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-2">
              <label for="deskripsi">Deskripsi</label>
            </div>
            <div class="col-75 col">
              <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi anda" required><?php echo $row['deskripsi']; ?></textarea>
            </div>
          </div>
          <input type="hidden" name="id" id="idPengguna" value="<?php echo $row['id_pengguna']; ?>">
  
          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-75 col">
              <div class="col alert alert-danger" role="alert" id="pesanError">error</div>
            </div>
          </div>
  
          <div class="pl-3 row py-3">
            <div class="col-2"></div>
            <div class="col-75 col">
              <input type="button" value="Simpan" name="updateInfo" class="float-right" id="updateInfo">
            </div>
  
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="assets/js/ubahInfo.js"></script>
</body>

</html>