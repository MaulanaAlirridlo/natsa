<?php

// header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
// echo "coba error";
// return false;

include 'conn.php';
include 'script.php';
include 'sendMail.php';

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

//cek apakah email sudah ada yang pakai
$checkEmail = "SELECT email FROM pengguna WHERE email='$email'";
$resultEmail = mysqli_query($conn, $checkEmail);
$count = mysqli_num_rows($resultEmail);

if ($count != 0) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "email telah terdaftar, silahkan gunakan email yang lain";
    return false;
}

$brokeEmail = explode("@", $email);//ambil username dari nama local
$id = generateKeyPrimary("pengguna");
$username = $brokeEmail[0];
$password = md5($password);
$level = "user";
$vkey = md5(time().$username);

//masukkan data pengguna
$query = "INSERT INTO pengguna (`id_pengguna`, `username`, `password`,`email`, `level`, `vkey`) 
value ('$id','$username','$password','$email','$level', '$vkey')";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (!$result) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "terjadi kesalahan saat proses pendaftaran";
    return false;
}

//kirim email
$senderMail = "naturalsawah@gmail.com";
$senderPassword = "natsa123";
$senderName = "Natural Sawah";
$reciever = $email;
// $url = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/verifikasi.php?vkey=$vkey";
$url = "localhost/natsa/natsa/verifikasi.php?vkey=$vkey";//untuk sementara
$subject = "
<h2> Verifikasi Email </h2>

Hi $email,<p>

Terimakasih telah mendaftar di website kami NatSa.<p>

Untuk menyelesaikan pendaftaran kita perlu verfikasi alamat email anda bahwa ini diri anda sendiri dan bukan orang lain.<p>

Klik link dibawah ini untuk memverifikasi alamat email anda :<p>

<a href='".$url."'>$url</a><p>

Jika anda tidak bisa klik link diatas tolong salin dan temple URL link pada kotak URL anda.<p>" ;

$mail = sendMail($senderMail, $senderPassword, $senderName, $reciever, $subject);

if (!$mail) {
    $error .= " || email verfikasi tidak dapat dikirim<br>";
}else{
    echo "selamat anda sudah mendaftar, email verfikasi telah dikirimkan ke email anda";
}



// echo "silahkan cek email anda untuk konfirmasi";