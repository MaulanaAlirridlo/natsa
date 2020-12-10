<?php
session_start();
include './include/script.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login</title>
  </head>
  <body>
    <div class="row">
      <div class="col-6 login">
        <h2>LOGIN</h2>
        <div class="form-group my-5 d-block">
          <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" class="form-control my-2" required value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']?>"/>
            <input type="password" name="password" placeholder="Password" class="form-control my-2" required value="<?php if (isset($_SESSION['password'])) echo $_SESSION['password']?>"/>
            <input type="submit" class="btn btn-primary float-right my-2" value="Log In" name="login"/>
          </form>
        </div>
        <?php 

          if (isset($_GET['pesan'])) {
            if ($_GET['pesan']) {
        ?>
          <div class="col-6 alert alert-danger" role="alert">
            Password atau email salah
          </div>
        <?php
            }
          }

        ?>

        
        <div class="ask mt-2 w-100 d-inline-block">
          <p>
            <a href="#" class="float-left">Lupa Password</a>
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
  </body>
<?php
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  login($conn, $email, $password);
}

?>
</html>