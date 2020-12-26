
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
    <title>Verifikasi | natsa</title>
</head>
<body>
    
</body>
<?php
    include "./include/conn.php";

    if (isset($_GET['vkey'])) {
        $vkey = $_GET['vkey'];

        $queryData = "SELECT verifikasi, vkey from pengguna where verifikasi='0' and vkey='$vkey' LIMIT 1";
        $resultData = mysqli_query($conn, $queryData);
        $countData = mysqli_num_rows($resultData);

        if ($countData == 1) {
            //verfikasi email
            $queryUpdate = "UPDATE pengguna set verifikasi='1', vkey=null where vkey='$vkey' limit 1";
            $resultUpdate = mysqli_query($conn, $queryUpdate);
            if ($resultUpdate) {
                echo "selamat, sekarang anda bisa login di <a href='./login.php'>Login</a>";
            }else{        
                echo mysqli_error($conn);
            }
        }else{
            // echo "you expected a back door, but it was me DIO!!!";
            echo "<center><img src='./assets/img/dio.jpg'>";
        }
    }else{
        echo "<center><img src='./assets/img/somethingWrong.jpg'>";
        // die("Something wrong i can feel it");
    }
?>
</html>
