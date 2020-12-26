<?php
session_start();
include './include/script.php';
// echo $_SESSION['id_pengguna'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/addpassword.css">
  <link rel="stylesheet" href="./assets/css/userlist.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
  <title>Ubah password | natsa</title>
</head>

<body style="overflow-x: hidden;">
  <?php include './layouts/navbar.php' ?>
  <div class="row">
    <div class="col-2">
      <?php include('./layouts/user.actionList.php') ?>
    </div>
    <div class="col">
      <form action="" class="form-group" method="post">
        <div class="row mt-2">
          <div class="col-2">
            <label for="Password lama">Password lama</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="password" id="Password lama" name="passwordLama" placeholder="Your Password lama.." required>
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Password baru">Password baru</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="password" id="Password baru" name="passwordBaru" placeholder="Your Password baru.." required>
          </div>
        </div>

        <div class="row pl-3">
          <input type="submit" value="Submit" name="ganti">
        </div>
      </form>
    </div>
  </div>

<?php
  if (isset($_POST['ganti'])) {
    $id_pengguna = $_SESSION['id_pengguna'];
    $password_lama = $_POST['passwordLama'];
    $password_baru = $_POST['passwordBaru'];

    $query = "SELECT id_pengguna, email, `password` from pengguna where id_pengguna='$id_pengguna' AND `password`='$password_lama'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);

    if ($rows == 1) {
        $qUpdatePassword = "UPDATE pengguna set `password`='$password_baru' where id_pengguna='$id_pengguna'";
        $result = mysqli_query($conn, $qUpdatePassword);
        if (!$result) {
          ?>
          <script>
              alert("Gagal dalam");
              window.location.href = "<?php echo $_SERVER['REQUEST_URI']?>";
          </script>
          <?php
        } else{
          ?>
          <script>
              alert("Password anda berhasil diubah");
              window.location.href = "<?php echo $_SERVER['REQUEST_URI']?>";
          </script>
          <?php
        }
    } 
    else {

        ?>
        <script>
            alert("Gagal");
            window.location.href = "<?php echo $_SERVER['REQUEST_URI']?>";
        </script>
        <?php
    }
  }

?>
</body>
</html>