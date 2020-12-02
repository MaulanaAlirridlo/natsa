<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/addpassword.css">
</head>
<body>

<?php include('./layouts/user.actionList.php') ?>

<div class="container">
  <form action="/action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="Password lama">Password lama</label>
      </div>
      <div class="col-75">
        <input type="password" id="Password lama" name="Password lama" placeholder="Your Password lama..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Password baru">Password baru</label>
      </div>
      <div class="col-75">
        <input type="password" id="Password baru" name="Password baru" placeholder="Your Password baru..">
      </div>
    </div>
    
    
   
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>

