<?php
session_start();
include './include/script.php';

$id = $_GET['id'];

$querySawah = "SELECT *,FORMAT(harga, 0) as harga,
          (SELECT nama_bekas_sawah from bekas_sawah where sawah.id_bekas_sawah=bekas_sawah.id_bekas_sawah) as bekas_sawah,
          (SELECT nama_irigasi_sawah from irigasi_sawah where sawah.id_irigasi_sawah=irigasi_sawah.id_irigasi_sawah) as irigasi_sawah,
          (SELECT nama_tipe_sawah from tipe_sawah where sawah.id_tipe_sawah=tipe_sawah.id_tipe_sawah) as tipe_sawah
          from sawah
          where id_sawah='$id'";

$resultSawah = mysqli_query($conn, $querySawah);
$rowSawah = mysqli_fetch_assoc($resultSawah);

$queryPemilik = "SELECT nama_foto, concat(nama_depan, ' ', nama_belakang) as nama_pemilik,
                no_hp
                from pengguna
                INNER JOIN sawah on sawah.id_pengguna=pengguna.id_pengguna
                where sawah.id_sawah='$id'";

$resultPemilik = mysqli_query($conn, $queryPemilik);
$rowPemilik = mysqli_fetch_assoc($resultPemilik);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./assets/css/fulldesc.desc.css">
  <link rel="stylesheet" href="./assets/css/fulldesc.kontak.css">
  <link rel="stylesheet" href="./assets/css/fulldesc.css">
  <title>Judul Sawah</title>
</head>

<body>
  <?php include './layouts/navbar.php'?>
  <div class="row fulldesc">
    <div class="col-7 p-0">
      <?php include './layouts/fulldesc.desc.php'?>
    </div>
    <div class="col-2 p-0 kontak">
      <?php include './layouts/fulldesc.kontak.php'?>
    </div>
    <div class="col-3 p-0">
      <iframe
        src="https://maps.google.com/maps?q=<?php echo $rowSawah['maps'];?>&output=embed"
        allowfullscreen class="map"></iframe>
    </div>
  </div>
  <script src="./vendor/jquery/jquery-3.5.1.min.js"></script>
  <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="./vendor/fontawesome/fontawesome.js" crossorigin="anonymous"></script>
</body>

</html>