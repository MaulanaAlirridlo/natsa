<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/index.css">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./assets/css/filter.css">
  <link rel="stylesheet" href="./assets/css/katalog.css">
  <link rel="stylesheet" href="./assets/css/katalog.desc.css">

<body>
  <?php include('./layouts/user.actionList.php') ?>
  <div class="container">
    <div class="row">



      <div class="col-md-7 ">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>User Profile</h4>
          </div>
          <div class="panel-body">

            <div class="box box-info">

              <div class="box-body">
                <div class="col-sm-6">
                  <div align="center">
                    <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive">

                    <input id="profile-image-upload" class="hidden" type="file">
                    <div style="color:#999;">click here to change profile image</div>
                    <!--Upload Image Js And Css-->







                  </div>

                  <br>

                  <!-- /input-group -->
                </div>
                <div class="col-sm-6">
                  <h4 style="color:#080a0a;">Anju Alicia Johan </h4></span>

                </div>
                <div class="clearfix"></div>
                <hr style="margin:1px 0 1px 0;">


                <div class="col-sm-5 col-xs-6 tital ">No Telepon:</div>
                <div class="col-sm-7 col-xs-6 ">081232230124</div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital ">Whatsapp:</div>
                <div class="col-sm-7"> 081232230124</div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>
                <div class="col-sm-5 col-xs-6 tital ">Email:</div>
                <div class="col-sm-7 col-xs-6 ">anjujohan0@gmail.com</div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>
                <div class="col-sm-5 col-xs-6 tital ">Alamat:</div>
                <div class="col-sm-7 col-xs-6 ">Jl.Dr.Wahidin Balung</div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>
                <div class="col-sm-5 col-xs-6 tital ">Deskripsi:</div>
                <div class="col-sm-7 col-xs-6 ">Menjual dan menyewakan sawah di Jember</div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>




              </div>
            </div>
          </div>
          <script>
            $(function() {
              $('#profile-image1').on('click', function() {
                $('#profile-image-upload').click();
              });
            });
          </script>









        </div>
      </div>





</html>