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
    <form action="" class="form-group" method="post" enctype="multipart/form-data">
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
      <input type="file" name="foto[]" id="foto-sawah" multiple="multiple"> <br>

      <input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">

      <input type="submit" value="Tambah" class="btn btn-secondary float-right mb-5" name="tambahSawah">
    </form>
  </div>
<?php

if (isset($_POST['tambahSawah'])) {

    $id_sawah = generateKeyPrimary("sawah");
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

    $sql = "INSERT INTO sawah
        (`id_sawah`, `id_pengguna`, `luas`, `harga`, `id_bekas_sawah`, `id_tipe_sawah`, `id_irigasi_sawah`, `jumlah_panen`, `id_daerah`, `alamat`, `maps`, `deskripsi`, `jenis`)
        value
        ('$id_sawah','$id_pengguna','$luas','$harga','$bekas','$tipe','$irigasi','$panen','$daerah','$alamat','$maps','$deskripsi','$jenis')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    // $result = true;
    if (!$result) {
        JSMassage("data gagal masuk");
    } else {
        //cek apakah ada file yang masuk atau tidak
        $fileName = $_FILES['foto']['name'];
        foreach ($fileName as $key => $value) {
            if (empty($value)) {
                unset($fileName[$key]);
            }
        }

        if (!empty($fileName)) {
            // $id_sawah = "SWH-201209-fnbp14-031816";
            $file = $_FILES['foto'];
            $fileNameNew = null;
            $allow = array('jpg', 'jpeg', 'png');
            $total = count($_FILES['foto']['name']);

            echo $id_sawah;
            
                for ($i = 0; $i < $total; $i++) {
                    $id_foto_sawah = generateKeySecond("foto_sawah", $conn);
                    $fileName = $_FILES['foto']['name'][$i];
                    $fileTmp = $_FILES['foto']['tmp_name'][$i];
                    $fileSize = $_FILES['foto']['size'][$i];
                    $fileError = $_FILES['foto']['error'][$i];
                    $fileType = $_FILES['foto']['type'][$i];

                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    if (in_array($fileActualExt, $allow)) {
                        if ($fileError === 0) {
                            if ($fileSize <= 1048576) {
                                $fileNameNew = uniqid('FSW-', true) . "." . $fileActualExt;
                                $sql = "INSERT INTO foto_sawah values ('$id_foto_sawah', '$id_sawah', '$fileNameNew')";

                                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                                if (!$result) {
                                    JSMassage("gagal upload", "here");
                                } else {
                                    $fileDestination = './assets/img/' . $fileNameNew;
                                    $result = move_uploaded_file($fileTmp, $fileDestination);
                                    if ($result) {
                                        JSMassage("berhasil " . ($i + 1));

                                        // echo "berhasil ". ($i + 1);
                                        // JSMassage("berhasil upload data", "here");

                                    } else {
                                        JSMassage("ada yang salah", "here");

                                        // $error_massage = mysqli_error($result);
                                        // echo "gagal ". ($i + 1);

                                    }
                                }

                            } else {
                                JSMassage("ukuran file harus kurang dari 1 MB", "here");
                            }
                        } else {
                            JSMassage("there was an error while uplaoding your file", "here");
                        }
                    } else {
                        JSMassage("upload file dengan ekstensi .jpg/.jpeg/.png", "here");
                    }
                }
            
        } else {
            JSMassage("data berhasil masuk masuk else", "");
        }

    }
}

?>
</body>

</html>