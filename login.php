<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">

    <script src="./vendor/jquery/jquery-3.5.1.min.js"></script>
    <title>Masuk | natsa</title>
  </head>
  <body>
    <div class="row">
      <div class="col-6 login">
        <div class="row">
          <div class="col">
            <h2>LOGIN</h2>
            <div class="form-group my-5 d-block">
              <form method="POST" action="">
                <input type="email" name="email" id="email" placeholder="Email" class="form-control my-2" required value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']?>"/>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control my-2" required value="<?php if (isset($_SESSION['password'])) echo $_SESSION['password']?>"/>
                <input type="button" class="btn btn-primary float-right my-2" value="Log In" name="login" id="buttonLogin"/>
              </form>
            </div> 
          </div>
        </div>


        <div class="row">
          <div class="col alert alert-danger" role="alert" id="pesanError"></div>
        </div>
        

        <div class="ask mt-2 w-100 d-inline-block">
          <p>
            <a href="lupapassword.php" class="float-left">Lupa Password</a>
            <a href="signup.php" class="float-right">Belum punya akun?</a>
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

    <script src="./assets/js/login.js"></script>
  </body>
</html>