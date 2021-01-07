<?php

include 'conn.php';
include 'script.php';
include 'sendMail.php';

//token selector
$selector = bin2hex(random_bytes(8));
//saat di resetPassword token ini akan diubah kembali ke binary dengan hex2bin

//token yang mengidentifikasi bahwa ini adalah user yang asli
$token = random_bytes(32);

//url yang akan dikirimkan ke email si pengguna
// $url = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/ubah_password.php?selector=" . $selector . "&validator=" . bin2hex($token);
$url = "localhost/natsa/natsa/ubah_password.php?selector=" . $selector . "&validator=" . bin2hex($token);//untuk sementara
// $url = "/ubah_password.php?selector=".$selector."&validator=".bin2hex($token);

//toke expired setelah satu jam
$expires = date("U") + 1800;

$email = $_POST['email'];

$queryDeleteToken = "DELETE FROM pwd_reset where pwd_reset_email='$email'";
$resultDeleteToken = mysqli_query($conn, $queryDeleteToken);

if (!$resultDeleteToken) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    echo "ada yang salah" . mysqli_error($conn);
    exit();
    return false;
} else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    $queryInsertData = "INSERT INTO pwd_reset (pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expires)
                        values ('$email','$selector','$hashedToken','$expires')";
    $resultInsertdata = mysqli_query($conn, $queryInsertData);

    mysqli_close($conn);

    $senderMail = "naturalsawah@gmail.com";
    $senderPassword = "natsa123";
    $senderName = "Natural Sawah";
    $receiver = $email;
    $subject = "
                      <h2>$email,</h2>
                      <p>seseorang meminta untuk mereset password dari akun anda</p>
                      Klik link ini <a href='" . $url . "'>reset password</a> untuk masuk ke halaman reset password<p>
                      <p>
                      copy link ini <a href='" . $url . "'>" . $url . "</a> jika link diatas tidak bisa diklik <p>
                      <p>
                      link ini bisa digunakan selama satu jam dari sekarang<p>
                      <p>
                      jika anda tidak meminta ini, anda bisa abaikan email ini. Password anda tidak akan berubah sampai anda membuat password baru.<p>

                      ";

    $mail = sendMail($senderMail, $senderPassword, $senderName, $receiver, $subject);

    echo "silahkan cek email anda untuk ubah password";
}
