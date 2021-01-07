<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception ;

// Load Composer's autoloader
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

// require './vendor/autoload.php';
// $senderMail = "naturalsawah@gmail.com";
// $senderPassword = "natsa123";
// $senderName = "Natural Sawah";
// $reciever = "irhasalif@gmail.com";
// $subject = '
//         <h2> terbaru </h2>
//         <a href="#"> Klik disini untuk verifikasi </a>
//         ini yang benar-benar terbaru
//         ' ;

function sendMail($senderMail,$senderPassword,$senderName,$reciever,$subject){
// Instantiation and passing `true` enables exceptions

    $mail = new PHPMailer(true);
    
    try {
        //konfigurasi SMPT
        $mail -> isSMTP() ;
        $mail -> Host = 'smtp.gmail.com' ;
        $mail -> SMTPAuth = true ;
        $mail -> Username = $senderMail;
        $mail -> Password = $senderPassword;
        $mail -> SMTPSecure = 'tls' ;
        $mail -> Port ='587' ;
    
        $mail -> setFrom($senderMail,$senderName) ;
    
        // penerima
        $mail -> addAddress($reciever) ;
        //subjek
        $mail -> Subject = 'Verifikasi Email NatSa' ;
        // set email format hmtl
        $mail ->isHTML(true) ;
    
        $mailContent = $subject;
        
        $mail -> Body = $mailContent ;
    
        $mail -> send();
        
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;

    }
}
