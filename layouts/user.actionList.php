<div class="sidebar">
  <a class="contact info" href="./userprofil.php">contact info</a>
  <a href="./user.infosetting.php">ubah info</a>
  <a href="./user.changePassword.php">ubah password</a>
  <a href="./jual.php">jual/sewa sawah</a>
  <a href="<?php echo $_SERVER['REQUEST_URI']."?logout=true"?>" onclick="return confirm('anda akan logout?')"> logout</a>
  <a href="# hapus akun"> hapus akun</a>
</div>
<?php

  if (isset($_GET['logout'])) {
    logout();
  }

?>