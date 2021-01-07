<?php

include 'conn.php';
include 'script.php';

$idSawah = $_POST['idSawah'];
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
$fotId = $_POST['fotoId'];
 $fileName = $_FILES['fotoSawah']['name'];


// header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');

// print_r($fotId);
// print_r($fileName);
// echo "terjadi kesalahan saat menambah sawah" . mysqli_error($conn);
// return false;

//====update sawah
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

//update sawah
$query = "UPDATE `sawah` SET 
            `luas`= '$luas',
            `harga`= '$harga',
            `id_bekas_sawah`= '$bekas',
            `id_tipe_sawah`= '$tipe',
            `id_irigasi_sawah`= '$irigasi',
            `jumlah_panen`= '$jumlahPanen',
            `id_daerah`= '$kodeDaerah',
            `alamat`= '$alamat',
            `maps`= '$maps',
            `deskripsi`= '$deskripsi',
            `jenis`= '$jenis'
            where `id_sawah`='$idSawah' and `id_pengguna`='$idPengguna'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (!$result) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "terjadi kesalahan saat menambah sawah" . mysqli_error($conn);
    return false;
}


//====update gambar
$fileLength = count($_FILES['fotoSawah']['name']);

//cek file
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

    //upload file
    $fileNameNew = uniqid('FSW-', true) . "." . $fileActualExt;
    $fileDestination = '../assets/img/' . $fileNameNew;
    $result = move_uploaded_file($fileTmp, $fileDestination);

    if (!$result) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "terjadi kesalah saat upload file";
        break;
        return false;
    }

    $id = $fotId[$i];

    //ambil nama_foto pengguna dari database
    $query = "SELECT nama_foto from foto_sawah where id_foto_sawah='$id' limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    //hapus foto yang dulu
    if ($row['nama_foto'] != "dummy.jpg") {
        unlink("../assets/img/".$row['nama_foto']);
    }

    $sql = "UPDATE foto_sawah SET
            nama_foto='$fileNameNew'
            where id_foto_sawah = '$id' ";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "terjadi masalah : " . mysqli_error($conn);
        break;
        return false;
    }
}


echo "berhasil update sawah";