<?php
session_start();
include './include/conn.php';
include './include/script.php';

if (!isset($_SESSION['id_pengguna'])) {
  $id = "";
  kickUser($id);
}

//get data sawah
$id = $_GET['idSawah'];
$query = "SELECT *, (SELECT CONCAT(daerah.kabupaten, ', ', daerah.provinsi) FROM daerah WHERE daerah.id_daerah = sawah.id_daerah) as daerah
          from sawah where id_sawah='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

//get foto sawah
$namaFoto = [];$idFoto = []; $a = 0;
$queryGambar = "SELECT * from foto_sawah where id_sawah='$id'";
$resultGambar = mysqli_query($conn, $queryGambar);
while ($rowGambar = mysqli_fetch_assoc($resultGambar)) {
  $namaFoto[$a] = $rowGambar['nama_foto'];
  $idFoto[$a] = $rowGambar['id_foto_sawah'];
  $a++;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./vendor/components/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./assets/css/editsawah.css">

  <script src="./vendor/components/jquery/jquery.min.js"></script>
  <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
  <title>Edit Sawah | natsa</title>
</head>

<body>
  <script>
    function myFunction(val) {
        val = val.trim()
        val = val.split(" ").join("+");
        // console.log(val);
        document.getElementById("frameMaps").src = "https://maps.google.com/maps?q="+val+"&output=embed";
    }
  </script>
  <?php include './layouts/navbar.php' ?>
  <form action="" class="form-group" method="post" enctype="multipart/form-data">
    <div class="container mt-3">
      <div class="row">
          <div class="col">
              <div class="col alert alert-danger" role="alert" id="pesanError">error</div>
          </div>
      </div>
      <div class="row">
        <div class="col">
          <h1>Ubah Data Sawah</h1>

          <label for="foto-sawah">Foto sawah</label> <br>
          <div class="row">
            <div class="col edit-image pr-0">
              <div class="border p-1">
                <div class="upload-button border">
                  <input type="file" name="foto1" id="file-foto-sawah1" class="d-none" id-foto="<?php echo $idFoto[0];?>">
                  <label for="file-foto-sawah1"><i class="fas fa-pencil-alt upload"></i></label>
                </div>
                <div class="image-view">
                  <img id="foto-sawah1" src="./assets/img/<?php echo $namaFoto[0];?>" alt="">
                </div>
              </div>
            </div>
            <div class="col edit-image pl-0 pr-0">
              <div class="border p-1">
                <div class="upload-button border">
                  <input type="file" name="foto2" id="file-foto-sawah2" class="d-none" id-foto="<?php echo $idFoto[1];?>">
                  <label for="file-foto-sawah2"><i class="fas fa-pencil-alt upload"></i></label>
                </div>
                <div class="image-view">
                  <img id="foto-sawah2" src="./assets/img/<?php echo $namaFoto[1];?>"  alt="">
                </div>
              </div>
            </div>
            <div class="col edit-image pl-0">
              <div class="border p-1">
                <div class="upload-button border right-15">
                  <input type="file" name="foto3" id="file-foto-sawah3" class="d-none" id-foto="<?php echo $idFoto[2];?>">
                  <label for="file-foto-sawah3"><i class="fas fa-pencil-alt upload"></i></label>
                </div>
                <div class="image-view">
                  <img id="foto-sawah3" src="./assets/img/<?php echo $namaFoto[2];?>"  alt="">
                </div>
              </div>
            </div>
          </div>
          <br>
          <label for="jenis">Jenis</label>
          <select name="jenis" id="jenis" class="form-control" required>
            <option value="">jenis ----</option>
            <?php echo enumDropdown($conn, "sawah", "jenis", $row['jenis']) . "<br>"; ?>
          </select>
          <div class="row">
            <div class="col">
              <label for="luas">Luas</label>
              <div class="input-group">
                <input type="number" class="form-control" name="luas" id="luas" placeholder="400" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="8" required value="<?php echo $row['luas'] ?>">
                <div class="input-group-append">
                  <span class="input-group-text">m<span style="font-size: 10px;">2</span></span>
                </div>
              </div>
            </div>
            <div class="col">
              <label for="harga">Harga</label>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">Rp</span>
                </div>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="12000000" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="12" required value="<?php echo $row['harga'] ?>">
              </div>
            </div>
            <div class="col">
              <label for="jumlahPanen">Jumlah panen</label>
              <div class="input-group">
                <input type="number" class="form-control" name="panen" id="jumlahPanen" placeholder="12" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="3" required value="<?php echo $row['jumlah_panen'] ?>">
                <div class="input-group-append">
                  <span class="input-group-text">kali</span></span>
                </div>
              </div>
            </div>
          </div>
          <label for="daerah">Daerah</label>
          <input type="text" name="daerah" id="daerah" class="form-control" required list="listDaerah" oninput="console.log(this.value);" value="<?php echo $row['daerah'] ?>">
          <datalist id="listDaerah" >
            <?php echo referenceDropdown($conn, "daerah") . "<br>"; ?>
          </datalist>
          <div class="row">
            <div class="col">
              <label for="bekas-sawah">Bekas sawah</label>
              <select name="bekas" id="bekas" class="form-control" required>
                <option value="">bekas ----</option>
                <?php echo referenceDropdown($conn, "bekas_sawah", $row['id_bekas_sawah']) . "<br>"; ?>
              </select>
            </div>
            <div class="col">
              <label for="tipe-sawah">Tipe sawah</label>
              <select name="tipe" id="tipe" class="form-control" required>
                <option value="">tipe ----</option>
                <?php echo referenceDropdown($conn, "tipe_sawah", $row['id_tipe_sawah']) . "<br>"; ?>
              </select>
            </div>
            <div class="col">
              <label for="irigasi-sawah">Irigasi sawah</label>
              <select name="irigasi" id="irigasi" class="form-control" required>
                <option value="">irigasi ----</option>
                <?php echo referenceDropdown($conn, "irigasi_sawah", $row['id_irigasi_sawah']) . "<br>"; ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <label for="alamatSawah">alamat</label>
              <textarea name="alamat" id="alamatSawah" class="form-control" required><?php echo $row['alamat']?></textarea>
            </div>
            <div class="col">
              <label for="deskripsi">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" class="form-control" required><?php echo $row['deskripsi']?></textarea>
            </div>
          </div>

        </div>
        <div class="col">
          <h1>&nbsp;</h1>

          <label for="maps">Maps</label>
          <input type="text" name="maps" id="maps" class="form-control mb-2" placeholder="alamat rinci Kota, daerah, desa" required oninput="myFunction(this.value)" value="<?php echo $row['maps'] ?>">

          <!-- <iframe width="100%" height="430" id="frameMaps" src="https://maps.google.com/maps?q=<?php echo $row['maps']?>&output=embed" frameborder="0"></iframe> -->

          <input type="button" value="Simpan" class="btn btn-secondary float-right mt-3 editsawah" name="editSawah" id="editSawah">
        </div>
        <input type="hidden" name="id_pengguna" id="idPengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">
        <input type="hidden" name="id_sawah" id="idSawah" value="<?php echo $row['id_sawah'] ?>">
        <input type="hidden" name="kodeDaerah" id="kodeDaerah" value="<?php echo $row['id_daerah'] ?>">
      </div>
    </div>
  </form>
  <script>
    var inp = document.getElementById('daerah');
    inp.addEventListener('input', function() {
      var value = this.value;
      var opt = [].find.call(this.list.options, function(option) {
        return option.value === value;
      });
      if (opt) {
        this.value = opt.textContent;
      }
      document.getElementById('kodeDaerah').value = value;
    });
  </script>
  <script src="./assets/js/editSawah.js"></script>
</body>

</html>