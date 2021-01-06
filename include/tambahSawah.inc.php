<?php

// echo "aneh sesi anda tidak ada  <p>";
// return false;
include 'conn.php';
include 'script.php';

$idSawah = generateKeyPrimary("sawah");
$idPengguna = $_POST['idPengguna'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$luas = $_POST['luas'];
$jumlahPanen = $_POST['jumlahPanen'];
$kodeDaerah = $_POST['kodeDaerah'];
$bekas = $_POST['bekas'];
$tipe = $_POST['tipe'];
$irigasi = $_POST['irigasi'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$maps = $_POST['maps'];

// echo $jenis . " " . $harga . " " . $luas . " " . $jumlahPanen . " " . $kodeDaerah . " " . $bekas . " " . $tipe . " " . $irigasi . " " . $alamat . " " . $deskripsi . " " . $maps;

//cek apakah data ada yang kosong
$inputKosong = "";

if (empty($jenis)) $inputKosong .= "jenis, ";
if ($harga == "") $inputKosong .= "harga, ";
if ($luas == "") $inputKosong .= "luas, ";
if ($jumlahPanen == "") $inputKosong .= "jumlah panen, ";
if (empty($kodeDaerah)) $inputKosong .= "daerah, ";
if (empty($bekas)) $inputKosong .= "bekas sawah, ";
if (empty($tipe)) $inputKosong .= "tipe sawah, ";
if (empty($irigasi)) $inputKosong .= "irigasi sawah, ";
if (empty($alamat)) $inputKosong .= "alamat, ";
if (empty($deskripsi)) $inputKosong .= "deskripsi, ";
if (empty($maps)) $inputKosong .= "maps";

if (!empty($inputKosong)) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');

    echo "harap isi " . $inputKosong . " dengan benar"; 
    return false;

}


$fileLength = count($_FILES['fotoSawah']['name']);

//cek jumlah foto itu 3
if ($fileLength != 3) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "harap berikan 3 foto, foto yang anda berikan " . $fileLength;
    return false;
}

//cek apakah ada error pada file
for ($i=0; $i < $fileLength; $i++) { 
    $fileName = $_FILES['fotoSawah']['name'][$i];
    $fileTmp = $_FILES['fotoSawah']['tmp_name'][$i];
    $fileSize = $_FILES['fotoSawah']['size'][$i];
    $fileError = $_FILES['fotoSawah']['error'][$i];
    $fileType = $_FILES['fotoSawah']['type'][$i];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = null;
    $allow = array('jpg', 'jpeg', 'png');

    //cek ekstensi file
    if (!in_array($fileActualExt, $allow)) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "file hanya boleh JPG, JPEG dan PNG di foto ke-".$i;
        break;
        return false;
    }

    //cek apakah ada error di file
    if (!$fileError == 0) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "Terjadi error saat upload file di foto ke-".$i;
        break;
        return false;
    }

    //cek ukuran file
    if ($fileSize >= 2097152) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "Harap uplaod file yang berukuran kurang dari 2 MB di foto ke-".$i;
        break;
        return false;
    }

}

//tambah sawah
$query = "INSERT INTO sawah
(`id_sawah`, `id_pengguna`, `luas`, `harga`, `id_bekas_sawah`, `id_tipe_sawah`, `id_irigasi_sawah`, `jumlah_panen`, `id_daerah`, `alamat`, `maps`, `deskripsi`, `jenis`)
value
('$idSawah','$idPengguna','$luas','$harga','$bekas','$tipe','$irigasi','$jumlahPanen','$kodeDaerah','$alamat','$maps','$deskripsi','$jenis')";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (!$result) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "terjadi kesalahan saat menambah sawah" . mysqli_error($conn);
    return false;
}

//upload foto dan tambah gambar
for ($i=0; $i < $fileLength; $i++) {
    $fileName = $_FILES['fotoSawah']['name'][$i];
    $fileTmp = $_FILES['fotoSawah']['tmp_name'][$i];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = null;
    $allow = array('jpg', 'jpeg', 'png');

    //upload file
    $fileNameNew = uniqid('FSW-', true) . "." . $fileActualExt;
    $fileDestination = '../assets/img/' . $fileNameNew;
    $result = move_uploaded_file($fileTmp, $fileDestination);

    if (!$result) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "terjadi kesalahan saat upload foto di foto ke-".$i;
        break;
        return false;
    }

    $id_foto_sawah = generateKeySecond("foto_sawah", $conn);

    //tambah sawah
    $query = "INSERT INTO foto_sawah values ('$id_foto_sawah', '$idSawah', '$fileNameNew')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (!$result) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "terjadi kesalahan saat menambah foto di foto ke-".$i . mysqli_error($conn);
        break;
        return false;
    }

}


echo "berhasil menambah sawah";
