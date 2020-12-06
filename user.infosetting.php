<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/adduser.css">
  <link rel="stylesheet" href="./assets/css/userlist.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
</head>

<body style="overflow-x: hidden;">
  <?php include './layouts/navbar.php' ?>
  <div class="row">
    <div class="col-2">
      <?php include('./layouts/user.actionList.php') ?>
    </div>
    <div class="col">
      <form action="/action_page.php" class="form-group">
      <input class="form-control" type="text" id="fnama" name="nama" placeholder="Your full name..">
      <div class="row mt-2">
          <div class="col-2">
            <label for="fnama">Nama</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="text" id="fnama" name="nama" placeholder="Your first name..">
            <div class="col-75">
            <input class="form-control" type="text" id="fnama" name="nama" placeholder="Your last name..">
          </div>
         </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fnohp">No HP</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="number" id="fnohp" name="nohp" placeholder="Your number hanphone..">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-2">
            <label for="fwa">WhatsApp</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="number" id="fwa" name="nowa" placeholder="Your number whatsapp ..">
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Alamat">Alamat</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="text" id="Alamat" name="Alamat" placeholder="Your Alamat..">
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <label for="Deskripsi">Deskripsi</label>
          </div>
          <div class="col-75">
            <input class="form-control" type="text" id="Deskripsi" name="Deskripsi" placeholder="Your Deskripsi..">
          </div>
        </div>


        <div class="pl-3 row">
          <input type="submit" value="Simpan">
        </div>
      </form>
    </div>
  </div>

</body>

</html>