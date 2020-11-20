<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./assets/css/fulldesc.desc.css">
  <link rel="stylesheet" href="./assets/css/fulldesc.kontak.css">
  <link rel="stylesheet" href="./assets/css/fulldesc.css">
  <title>Judul Sawah</title>
</head>

<body>
  <?php include('./layouts/navbar.php') ?>
  <div class="row fulldesc">
    <div class="col-7 p-0">
      <?php include('./layouts/fulldesc.desc.php') ?>
    </div>
    <div class="col-2 p-0 kontak">
      <?php include('./layouts/fulldesc.kontak.php') ?>
    </div>
    <div class="col-3 p-0">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7443154.79590166!2d5.93717945410757!3d76.83672901074213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x45a1cfdc4fa3c049%3A0x2bf373e71b35e875!2sSvalbard!5e0!3m2!1sid!2sid!4v1605783149885!5m2!1sid!2sid"
        allowfullscreen class="map"></iframe>
    </div>
  </div>
  <script src="./vendor/jquery/jquery-3.5.1.min.js"></script>
  <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="./vendor/fontawesome/fontawesome.js" crossorigin="anonymous"></script>
</body>

</html>