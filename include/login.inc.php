<?php

include 'conn.php';

//bersihkan email dan password
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

$email = trim($email);
$password = trim($password);

//cek apakah email dan password kosong
if ($email == "" || empty($email) || $password == "" || empty($password)) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "harap isi email dan password";
    return false;
}

//cek apakah format email sudah benar
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "email tidak valid";
    return false;
}

//enkripsi password
$passwordEnkripsi = md5($password);

//ambil data
$queryLogin = "SELECT email, `password`, id_pengguna, verifikasi, username FROM pengguna WHERE email='$email' AND `password`='$passwordEnkripsi' limit 1";
$resultLogin = mysqli_query($conn, $queryLogin);
$rowsLogin = mysqli_num_rows($resultLogin);
$dataLogin = mysqli_fetch_assoc($resultLogin);

//cek apakah email dan password ada di db
if ($rowsLogin == 0) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "email atau password yang anda masukkan salah";
    return false;
}

$id_pengguna = $dataLogin['id_pengguna'];

//cek apakah sudah verfikasi
if ($dataLogin['verifikasi'] == 1) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['id_pengguna'] = $id_pengguna;
    echo "Selamat datang ".$dataLogin['username'];

} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "Harap verfikasi akun anda";
    return false;
}
