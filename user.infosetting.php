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
      <form action="" class="form-group" method="POST">
      <div class="row p-3">
        <div class="photo-profile">
          <img src="./assets/img/<?php echo $row['nama_foto'];?>" alt="profile">
          <input type="file" name="foto" id="foto" class="pl-2">
        </div>
      </div>
      <div class="row mt-2">
          <div class="col-2">
            <label for="fnama">Nama </label>
          </div>
          <div class="col-75 d-flex">
            <input class="form-control w-50 nama-depan" type="text" id="nama_depan" name="nama-depan" placeholder="Nama depan" value="<?php echo $row['nama_depan'];?>" required maxlength="20">         
            <input class="form-control w-50" type="text" id="nama_belakang" name="nama-belakang" placeholder="Nama belakang" value="<?php echo $row['nama_belakang'];?>" required maxlength="20">
         </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fnohp">No HP</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="number" id="fnohp" name="no_hp" placeholder="No hp" value="<?php echo $row['no_hp'];?>" required oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="13">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fwa">WhatsApp</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="number" id="fwa" name="wa" placeholder="No wa" value="<?php echo $row['wa'];?>" required oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="13">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fwa">Email</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="email" id="fwa" name="email" placeholder="Email" value="<?php echo $row['email'];?>" required maxlength="30">
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Alamat">Alamat</label>
          </div>
          <div class="col-75">
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required><?php echo $row['alamat'];?></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Deskripsi">Deskripsi</label>
          </div>
          <div class="col-75">
            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi anda" required><?php echo $row['deskripsi'];?></textarea>
          </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id_pengguna'];?>">
        <div class="pl-3 row py-3">
          <div class="col-2"></div>
          <div class="col-75">
            <input type="submit" value="Simpan" name="updateInfo" class="ml-auto">
          </div>
        </div>
      </form>
    </div>
  </div>
<?php
  
  if (isset($_POST['updateInfo'])) {
      $nama_depan = $_POST['nama_depan'];
      $nama_belakang = $_POST['nama_belakang'];
      $no_hp = $_POST['no_hp'];
      $wa = $_POST['wa'];
      $email = $_POST['email'];
      $alamat = $_POST['alamat'];
      $deskripsi = $_POST['deskripsi'];
      $id = $_POST['id'];

      $sql = "UPDATE pengguna SET 
          nama_depan='$nama_depan', 
          nama_belakang='$nama_belakang', 
          no_hp='$no_hp', 
          wa='$wa', 
          email='$email', 
          alamat='$alamat',
          deskripsi='$deskripsi',
          verfikasi='terverifikasi'
          where id_pengguna = '$id' ";

      $result = mysqli_query($conn, $sql) or die(mysqli_error());
      if (!$result) {
          ?>
          <script>
              alert("gagal update");
              window.location.href = "<?php echo $_SERVER['REQUEST_URI']?>";
          </script>

          <?php
      }else{
          ?>
          <script>
              alert("berhasil update info");
              window.location.href = "<?php echo $_SERVER['REQUEST_URI']?>";
          </script>

          <?php
      }
  }

?>
</body>
</html>