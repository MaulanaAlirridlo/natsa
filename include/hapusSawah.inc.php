<?php
include 'conn.php';
session_start();

$id_sawah = $_POST['id_sawah'];

// echo "berhasil id sawah $id_sawah";
//cek apakah ada sesi
if (!isset($_SESSION['id_pengguna']) && !isset($_SESSION['email']) && !isset($_SESSION['password'])) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "aneh sesi anda tidak ada  <p>";
    return false;
}

$email = $_SESSION['email'];
$password = $_SESSION['password'];
$id_pengguna = $_SESSION['id_pengguna'];

$password = md5($password);//ubah password jadi md5

//ambil data yang mirip dengan semua sesi
$query = "SELECT * FROM pengguna where id_pengguna='$id_pengguna' and email='$email' and `password` = '$password' limit 1";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

//cek apakah akun memang ada
if ($count != 1) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "aneh akun anda tidak terdaftar  <p>";
    return false;
}

//ambil data yang mirip dengan semua id_pengguna dan id_sawah
$query = "SELECT * FROM sawah where id_pengguna='$id_pengguna' and id_sawah='$id_sawah' limit 1";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

//cek apakah sawah memang ada
if ($count != 1) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "aneh akun anda tidak terdaftar  <p>";
    return false;
}


// ambil foto sawah
$query = "SELECT nama_foto FROM foto_sawah where id_sawah='$id_sawah'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    unlink('../assets/img/'.$row['nama_foto']);//hapus foto
    $i++;
}

// //hapus sawah
$query = "DELETE FROM `sawah` WHERE id_pengguna='$id_pengguna' and id_sawah='$id_sawah'";
$result = mysqli_query($conn, $query);

if (!$result) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "terjadi masalah saat menghapus akun anda ".mysqli_error($conn);
    return false;
}

echo "sawah dihapus";
