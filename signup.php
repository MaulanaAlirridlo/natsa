<?php
include './include/conn.php';
// include './include/sendMail.php';
include './include/script.php';

// if (isset($_POST['signup'])) {
//   $email = $_POST['email'];
//   $password = $_POST['password'];

//   signUp($conn, $email, $password);
// }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/signup.css">
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">

    <script src="./vendor/components/jquery/jquery.min.js"></script>

    <title>Daftar | natsa</title>
  </head>
  <body>
    <div class="row">
      <div class="col-6 login">
        <h2>SIGN UP</h2>

        <div class="form-group my-5 d-block">
          <form action="" method="post">
            <input type="email" id="email" placeholder="Email" class="form-control my-2" />
            <input type="password" id="password" placeholder="Password" class="form-control my-2" />
            <div class="alert alert-danger mt-2" role="alert" id="pesanError">error</div>
            <div class="alert alert-success mt-2" role="alert" id="pesanTunggu">mohon tunggu beberpapa saat</div>

            <input type="button" class="btn btn-primary float-right my-2" value="Sign Up" id="btnSignup"/>
          </form>
        </div>


        <div class="ask mt-2 w-100 d-inline-block">
          <p>
            <a href="login.php" class="float-left">sudah punya akun?</a>
          </p>
        </div>

        <h2 class="mt-5 or">Atau</h2>
        <div class="mt-3">
          <a href="#">
            <button class="btn btn-secondary">Google</button>
          </a>
          <a href="#">
            <button class="btn btn-secondary">Facebook</button>
          </a>
        </div>

      </div>
      <div class="col-6 picture"></div>
    </div>
    <div class="row">
        
      </div>

    <script src="./assets/js/signup.js"></script>

  </body>
</html>
