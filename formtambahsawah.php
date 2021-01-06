<?php
session_start();
include './include/conn.php';
include './include/script.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/navbar.css">
    <link rel="stylesheet" href="./assets/css/formtambahsawah.css">

    <script src="./vendor/components/jquery/jquery.min.js"></script>
    <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
    <title>Tambah Sawah | natsa</title>
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
    <?php include './layouts/navbar.php'?>
    <form action="" class="form-group" method="post" enctype="multipart/form-data">
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <div class="col alert alert-danger" role="alert" id="pesanError">error</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h1>Form Tambah Sawah</h1>

                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">jenis ----</option>
                            <?php echo enumDropdown($conn, "sawah", "jenis") . "<br>"; ?>
                        </select>
                        <div class="row">
                            <div class="col">
                                <label for="luas">Luas</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="luas" id="luas" placeholder="400" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="8" required>
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
                                    <input type="number" class="form-control" name="harga" id="harga" placeholder="12000000" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="12" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="jumlahPanen">Jumlah panen</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="panen" id="jumlahPanen" placeholder="12" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="3" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">kali</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="daerah">Daerah</label>
                        <input type="text" name="daerah" id="daerah" class="form-control" required list="listDaerah" oninput="console.log(this.value);">
                        <datalist id="listDaerah">
                            <?php echo referenceDropdown($conn, "daerah") . "<br>"; ?>
                            
                        </datalist>
                        <!-- <select name="daerah" id="daerah" class="form-control" required>
                            <option value="">daerah ----</option>
                            <?php //echo referenceDropdown($conn, "daerah") . "<br>"; ?>
                        </select> -->
                        <div class="row">
                            <div class="col">
                                <label for="bekas-sawah">Bekas sawah</label>
                                <select name="bekas" id="bekas" class="form-control" required>
                                    <option value="">bekas ----</option>
                                    <?php echo referenceDropdown($conn, "bekas_sawah") . "<br>"; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="tipe-sawah">Tipe sawah</label>
                                <select name="tipe" id="tipe" class="form-control" required>
                                    <option value="">tipe ----</option>
                                    <?php echo referenceDropdown($conn, "tipe_sawah") . "<br>"; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="irigasi-sawah">Irigasi sawah</label>
                                <select name="irigasi" id="irigasi" class="form-control" required>
                                    <option value="">irigasi ----</option>
                                    <?php echo referenceDropdown($conn, "irigasi_sawah") . "<br>"; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="alamatSawah">alamat</label>
                                <textarea name="alamat" id="alamatSawah" class="form-control" required></textarea>
                            </div>
                            <div class="col">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                            </div>
                        </div>

                        <label for="fotoSawah">Foto sawah</label> <br>
                        <input type="file" name="foto[]" id="fotoSawah" multiple="multiple"> <br>

                        <input type="button" value="Tambah" class="btn btn-secondary float-right mb-5" name="tambahSawah" id="tambahSawah">
                </div>
                <div class="col">
                    <h1>&nbsp;</h1>

                    <label for="maps">Maps</label>
                    <input type="text" name="maps" id="maps" class="form-control mb-2" placeholder="alamat rinci Kota, daerah, desa" required oninput="myFunction(this.value)">

                    <iframe width="100%" height="400" id="frameMaps" src="https://maps.google.com/maps?q=indonesia&output=embed" frameborder="0"></iframe>

                </div>
                
                <input type="hidden" name="id_pengguna" id="idPengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">
                <input type="hidden" name="kodeDaerah" id="kodeDaerah">
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
            if(opt) {
                this.value = opt.textContent;
            }
            document.getElementById('kodeDaerah').value = value;
        });                    

    </script>
    <script src="./assets/js/tambahSawah.js"></script>

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
        $daerah = $_POST['kodeDaerah'];
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
            // echo "data gagal masuk";
        }else {
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