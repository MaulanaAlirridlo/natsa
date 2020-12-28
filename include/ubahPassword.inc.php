<?php
session_start();

include 'conn.php';

//cek apakah form sudah diisi
if ($_POST['passwordLama'] == "" || empty($_POST['passwordLama']) || $_POST['passwordBaru'] == "" || empty($_POST['passwordBaru'])) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "Harap isi password lama dan password baru";
    return false;
}

//ambil data yang dikirim
$id_pengguna = $_SESSION['id_pengguna'];
$email = $_SESSION['email'];
$password_lama = mysqli_real_escape_string($conn,trim($_POST['passwordLama']));;
$password_baru = mysqli_real_escape_string($conn,trim($_POST['passwordBaru']));;

$password_lama = md5($password_lama);
$password_baru = md5($password_baru);

//cek apakah password lama benar
$query = "SELECT id_pengguna, email, `password` 
            from pengguna 
            where id_pengguna='$id_pengguna' and email='$email' and `password`='$password_lama' limit 1";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);
// $data = mysqli_fetch_assoc($result);

if ($rows != 1) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "Password anda salah";
    return false;
}

//ubah password
$qUpdatePassword = "UPDATE pengguna set `password`='$password_baru' where id_pengguna='$id_pengguna'";
$result = mysqli_query($conn, $qUpdatePassword);

if (!$result) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "Terjadi kesalahan ".mysqli_error($conn);
    return false;
}
echo "Password anda sudah diperbarui";
