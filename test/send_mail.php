<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception ;



require 'PHPMailer/Exception.php' ;
require 'PHPMailer/PHPMailer.php' ;
require 'PHPMailer/SMTP.php' ;


$mail = new PHPMailer ;


//konfigurasi SMPT

$mail -> isSMTP() ;
$mail -> Host = 'smtp.gmail.com' ;
$mail -> SMTPAuth = true ;
$mail -> Username = 'naturalsawah@gmail.com' ;
$mail -> Password = 'natsa123' ;
$mail -> SMTPSecure = 'tls' ;
$mail -> Port ='587' ;

$mail -> setFrom('naturalsawah@gmail.com','natural sawah') ;

// penerima

$mail -> addAddress('naufalfarros05@gmail.com') ;
//subjek
$mail -> Subject = 'Verivikasi Email NatSa' ;
// set email format hmtl
$mail ->isHTML(true) ;

$mailContent = '
<h2> VERIFIKASI EMAIL ANDA </h2>
<a href="#"> Klik disini untuk verifikasi </a>
' ;
$mail -> Body = $mailContent ;

if(!$mail -> send() ){
        echo 'Pesan tidak dapat dikirim ' ;
        echo 'Mailer Error'.$mail->ErrorInfo ;


}else {
    echo 'Gmail Sudah dikirim, silahkan cek email anda ' ;
}












?>