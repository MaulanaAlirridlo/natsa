<?php
session_start();
include './include/script.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <title>Form Tambah Sawah</title>
</head>

<body>
  <?php include './layouts/navbar.php'?>
  <div class="container mt-3">
    <h1>Form Tambah Sawah</h1>
    <form action="" class="form-group" method="post">

      <label for="jenis">Jenis</label>
      <select name="jenis" id="jenis" class="form-control" required>
        <option value="">jenis ----</option>
        <?php echo enumDropdown($conn, "sawah", "jenis") . "<br>"; ?>
      </select>

      <label for="luas">Luas</label>
      <input type="number" class="form-control" name="luas" id="luas" placeholder="400" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="8" required>

      <label for="harga">Harga</label>
      <input type="number" class="form-control" name="harga" id="harga" placeholder="12000000" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="13" required>

      <label for="jumlah-panen">Jumlah panen</label>
      <input type="number" class="form-control" name="panen" id="jumlah-panen" placeholder="12" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="3" required>

      <label for="daerah">Daerah</label>
      <select name="daerah" id="daerah" class="form-control" required>
          <option value="">daerah ----</option>
          <?php echo referenceDropdown($conn, "daerah") . "<br>"; ?>
      </select>


      <label for="bekas-sawah">Bekas sawah</label>
      <select name="bekas" id="bekas" class="form-control" required>
        <option value="">bekas ----</option>
        <?php echo referenceDropdown($conn, "bekas_sawah") . "<br>"; ?>
      </select>

      <label for="tipe-sawah">Tipe sawah</label>
      <select name="tipe" id="tipe" class="form-control" required>
        <option value="">tipe ----</option>
        <?php echo referenceDropdown($conn, "tipe_sawah") . "<br>"; ?>
      </select>

      <label for="irigasi-sawah">Irigasi sawah</label>
      <select name="irigasi" id="irigasi" class="form-control" required>
        <option value="">irigasi ----</option>
        <?php echo referenceDropdown($conn, "irigasi_sawah") . "<br>"; ?>
      </select>

      <label for="alamat">alamat</label>
      <textarea name="alamat" id="alamat" class="form-control" required></textarea>

      <label for="deskripsi">Deskripsi</label>
      <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>

      <label for="maps">Maps</label>
      <textarea name="maps" id="maps" class="form-control" placeholder="link iframe google maps" required></textarea>

      <label for="foto-sawah">Foto sawah</label> <br>
      <input type="file" nama="foto-sawah" id="foto-sawah"> <br>

      <input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">

      <input type="submit" value="Tambah" class="btn btn-secondary float-right mb-5" name="tambahSawah">
    </form>
  </div>
<?php

if (isset($_POST['tambahSawah'])) {
    $id = generateKeyPrimary("sawah");
    $id_pengguna = $_POST['id_pengguna'];
    $luas = $_POST['luas'];
    $harga = $_POST['harga'];
    $bekas = $_POST['bekas'];
    $tipe = $_POST['tipe'];
    $irigasi = $_POST['irigasi'];
    $panen = $_POST['panen'];
    $daerah = $_POST['daerah'];
    $alamat = $_POST['alamat'];
    $maps = $_POST['maps'];
    $deskripsi = $_POST['deskripsi'];
    $jenis = $_POST['jenis'];
    // $status = $_POST['status'];

    $sql = "INSERT INTO sawah
    (`id_sawah`, `id_pengguna`, `luas`, `harga`, `id_bekas_sawah`, `id_tipe_sawah`, `id_irigasi_sawah`, `jumlah_panen`, `id_daerah`, `alamat`, `maps`, `deskripsi`, `jenis`)
    value 
    ('$id','$id_pengguna','$luas','$harga','$bekas','$tipe','$irigasi','$panen','$daerah','$alamat','$maps','$deskripsi','$jenis')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (!$result) {
      JSMassage("data gagal masuk");
    } else {
      JSMassage("data berhasil masuk");
    }
}

?>
</body>

</html>