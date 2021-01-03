<?php
// session_start();
if(isset($_SESSION['id_pengguna'])){
  $user = true;
  $id_pengguna = $_SESSION['id_pengguna'];
  $pilihFotoPengguna = "SELECT nama_foto FROM pengguna where id_pengguna='$id_pengguna'";
  $hasilFotoPengguna = mysqli_query($conn, $pilihFotoPengguna);
  $dataFotoPengguna =mysqli_fetch_assoc($hasilFotoPengguna);
}else{
  $user = false;
}


?>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#" id="beli">Beli</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="sewa">Sewa</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 ml-auto mr-auto input-group w-auto" method="GET" action="">
      <input class="form-control search" type="search" name="cari" placeholder="Cari Berdasarkan Daerah" aria-label="Search" list="alamat" autocomplete="off">
      <div class="input-group-append">
        <button type="submit" class="input-group-text" id="basic-addon2">
          <img src="./assets/img/logo.png" alt="C">
        </button>
      </div>
    </form>
    <?php if ($user) { ?>
      <a href="./userprofil.php">
        <div class="rounded-circle user">
          <!-- <img src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png" alt="F"> -->
          <img src="./assets/img/<?php echo $dataFotoPengguna['nama_foto']?>" alt="F">
        </div>
      </a>
    <?php } else { ?>
      <div class="user-btn">
        <a href="./login.php">
          <button class="btn btn-secondary">Login</button>
        </a>
        <a href="./signup.php">
          <button class="btn btn-secondary">Signup</button>
        </a>
      </div>
    <?php } ?>
  </div>
</nav>

<datalist id="alamat">
  <?php 
    $pilihDaerah = "SELECT CONCAT(daerah.provinsi,', ', daerah.kabupaten) as daerah_sawah 
    FROM daerah 
    WHERE EXISTS (SELECT sawah.id_daerah from sawah WHERE daerah.id_daerah=sawah.id_daerah)";
    $hasilDaerah = mysqli_query($conn, $pilihDaerah);
    while ($dataDaerah=mysqli_fetch_assoc($hasilDaerah)) {
  ?>
    <option value="<?= $dataDaerah['daerah_sawah']?>">
  
  <?php
    }
  ?>
</datalist>