<html>
    <head>
        <title>Ubah password</title>
		<link rel="stylesheet" href="assets/css/ubah_password.css">
    </head>
   
    <body>
        <div class="container">
            <h1>Ubah password</h1>
            <?php
                $selector = (isset($_GET['selector'])) ? $_GET['selector'] : "" ;
                $validator = (isset($_GET['validator'])) ? $_GET['validator'] : "" ;

                if (empty($selector) || empty($validator)) {
                    echo "tidak bisa memverfikasi permintaan anda";
                }else{
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>
            <form action="" method="post">
                <input type="hidden" name="selector" value="<?= $selector?>">
                <input type="hidden" name="validator" value="<?= $validator?>">
                <input type="password" name="pwd" placeholder="Password baru" id="" required>
                <input type="password" name="pwdRepeat" placeholder="ketik password lagi" id="" required>
                <button type="submit" value="ubah" name="ubahPasswordSubmit">ubah</button>
                <!-- <input type="submit" value="ubah" name="ubahPasswordSubmit"> -->
            </form>
            <?php
                    }else{
                        echo "data salah";
                    }
                }

            ?>
        </div>
    <?php
        include "./include/conn.php";

        if (isset($_POST['ubahPasswordSubmit'])) {
            //ambil data dari form
            $selector = $_POST['selector'];
            $validator = $_POST['validator'];
            $pwd = $_POST['pwd'];
            $pwdRepeat = $_POST['pwdRepeat'];

            //cek apakah password yang dimasukkan sama atau tidak
            if ($pwd !== $pwdRepeat) {
                echo "password tidak sama";
            }else{
                // cek apakah selector benar dan waktu reset password sudah habis
                $tanggalSekarang = date('U');
                $queryDataPwd = "SELECT * FROM pwd_reset 
                                WHERE pwd_reset_selector='$selector' and 
                                pwd_reset_expires >= '$tanggalSekarang'";
                $resultDataPwd = mysqli_query($conn, $queryDataPwd) or die(mysqli_error($conn));
                $rowDataPwd = mysqli_fetch_assoc($resultDataPwd);

                $countDataPwd = mysqli_num_rows($resultDataPwd);
                //jika data bukan 1 data maka masuk if
                if ($countDataPwd != 1) {
                    echo "harap request kembali permintaan anda 1";
                    exit();
                }
                //jika data cuma 1 maka masuk else
                else{
                    //cek apakah validator/token yang ada di link sama dengan yang ada di database
                    $tokenBin = hex2bin($validator);//ubah token dari bilangan hex ke bin
                    $tokenCheck = password_verify($tokenBin, $rowDataPwd['pwd_reset_token']);//cek

                    //jika calah maka masuk ke sini
                    if ($tokenCheck === false) {
                        echo "harap request kembali permintaan anda 2";
                        exit();
                    }
                    //jika benar maka masuk sini
                    elseif($tokenCheck === true){
                        // echo "selamat";
                        //ambil email pengguna sebagai referensi ubah password
                        $tokenEmail = $rowDataPwd['pwd_reset_email'];
                        
                        //ambil data pengguna berdasarkan email untuk mengecek apakah pengguna itu ada
                        $queryDataPengguna = "SELECT email, `password` from pengguna where email='$tokenEmail'";
                        $resultDataPengguna = mysqli_query($conn, $queryDataPengguna) or die(mysqli_error($conn));
                        $rowDataPengguna = mysqli_fetch_assoc($resultDataPengguna);
                        $countDataPengguna = mysqli_num_rows($resultDataPengguna);

                        //jika datanya bukan 1 maka masuk sini
                        if ($countDataPengguna != 1) {
                            echo "Terjadi masalah";
                            exit();
                        }
                        //jika datanya memang benar 1 maka masuk sini
                        else{
                            
                            $password = md5($pwd);//ubah password menjadi md5
                            
                            //update password pengguna
                            $queryUpdatePwd = "UPDATE pengguna set password='$password' where email='$tokenEmail'";
                            $resultUpdatePwd = mysqli_query($conn, $queryUpdatePwd) or die(mysqli_error($conn));

                            if (!$resultUpdatePwd) {
                                echo "ada masalah";
                            }else{
                                $queryDeleteToken = "DELETE FROM pwd_reset where pwd_reset_email='$tokenEmail'";
                                $resultDeleteToken = mysqli_query($conn, $queryDeleteToken) or die(mysqli_error($conn));
                                if (!$resultDeleteToken) {
                                    echo "ada masalah";
                                }else{
                                    header("Location: login.php?pesan=berhasilUbahPassword");
                                }
                            }

                        }
                        
                    }
                }

            }
        }else{
            //kalau salah ngapain
        }
    
    ?>     
    </body>
</html>