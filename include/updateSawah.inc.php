<?php

// echo "aneh sesi anda tidak ada  <p>";
// return false;
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

echo "berhasil update sawah";
