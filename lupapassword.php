<?php
session_start();
include './include/script.php';

?>
<html>
<head>
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/lupapassword.css">
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
  <title>Lupa password | natsa</title>
</head>

<body>
  <?php include './layouts/navbar.php'?>
  <div class="container">
    <div class="form-group w-50 mx-auto mt-5 border p-5 rounded">
      <h1 class="text-center">Lupa password</h1>
      <p class="text-center">Masukkan email anda di kolom dibawah</p>
      <form method="POST" action="">
        <label>Email</label><br>
        <input type="email" class="form-control" name="email"><br>
        <p>
        <input class="btn btn-primary active" type="submit" value="Minta" name="mintaResetPassword">
      </form>
      <?php
      
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'sukses') {
                echo "<p>link untuk reset password telah dikirim ke email yang anda masukkan<p>";
            }
        }

        if (isset($_POST['mintaResetPassword'])) {
          //token selector
          $selector = bin2hex(random_bytes(8));
          //saat di resetPassword token ini akan diubah kembali ke binary dengan hex2bin
          
          //token yang mengidentifikasi bahwa ini adalah user yang asli
          $token = random_bytes(32);
  
          //url yang akan dikirimkan ke email si pengguna
          $url = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/ubah_password.php?selector=".$selector."&validator=".bin2hex($token);
          // $url = "/ubah_password.php?selector=".$selector."&validator=".bin2hex($token);
  
          //toke expired setelah satu jam
          $expires = date("U") + 1800;
          
          $email = $_POST['email'];
  
          $queryDeleteToken = "DELETE FROM pwd_reset where pwd_reset_email='$email'";
          $resultDeleteToken = mysqli_query($conn, $queryDeleteToken);
          if (!$resultDeleteToken) {
              echo "ada yang salah".mysqli_error($conn);
              exit();
          }else{
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
                    <h2> Reset Password </h2>
                    <p>Kami menerima permintaan untuk mengubah password dari anda, jika anda merasa tidak meminta hal ini anda bisa mengabaikan pesan ini</p>
                    link anda untuk mengubah password <a href='".$url."'>".$url."</a>
                    " ;
    
            $mail = sendMail($senderMail, $senderPassword, $senderName, $receiver, $subject);
    
            header("Location: ./lupapassword.php?pesan=sukses");
          }
  

  
        }else{
            //kalau tidak meminta diapakan
        }

      ?>
    </div>
  </div>
</body>

</html>