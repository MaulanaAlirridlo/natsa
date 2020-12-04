<?php

include "./include/conn.php";

/*
jenis table dan codenya
 *utama
- pengguna  : PGN
- sawah     : SWH

 *penghubung
- foto sawah    : FSW
- pemilik sawah : PSW

 *referensi
- bekas sawah   : BSW
- tipe sawah    : TSW
- irigasi       : ISW

 */

// generate id untuk tabel utama

function generateKeyPrimary($table){
    /*
    key : code-tanggal-hurufAcak-jam

    logikanya
    1 cek create untuk tabel yang mana
    2 jika pengguna codenya PGN
    3 jika sawah codoenya SWH
    4 nanti key akan jadi code-tanggal-hurufAcak-jam

     */
    // konfigurasi
    // hurufnya apaan
    $str = "1234567890abcdefghijklmnopqrstuvwxyz";
    //batas maksimal huruf randonmnya
    $keyLenght = 6;

    //Tentukan code
    if ($table == "pengguna") {
        $code = "PGN";
    } elseif ($table == "sawah") {
        $code = "SWH";
    }

    $date = date('ymd');
    $randStr = substr(str_shuffle($str), 0, $keyLenght);
    $hours = date('his');

    $key = $code . "-" . $date . "-" . $randStr . "-" . $hours;

    return $key;
}

function generateKeyReference($table, $conn){
    /*

    key : code-3 angka urut
    logikanya
    1 cek create untuk tabel yang mana
    2 jika bekas sawah codenya BSW
    3 jika tipe sawah codoenya TSW
    4 jika irigasi codoenya ISW
    5 ambil id angka urut dari id terakhir
    6 tambah 1
    7 jadikan key code-3 angka urut ditambah 1
     */

    //ambil id terakhir di database lalu ditambah 1 untuk nomor

    //Tentukan code dan pilih id di table
    if ($table == "tipe_sawah") {
        $code = "TSW";
        $sql = "select id_tipe_sawah from tipe_sawah ORDER BY id_tipe_sawah DESC LIMIT 1";
    } elseif ($table == "bekas_sawah") {
        $code = "BSW";
        $sql = "select id_bekas_sawah from bekas_sawah ORDER BY id_bekas_sawah DESC LIMIT 1";
    } elseif ($table == "irigasi_sawah") {
        $code = "ISW";
        $sql = "select id_irigasi_sawah from irigasi_sawah ORDER BY id_irigasi_sawah DESC LIMIT 1";
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($table == "tipe_sawah") {
        $mykey = $row['id_tipe_sawah'];
    } elseif ($table == "bekas_sawah") {
        $mykey = $row['id_bekas_sawah'];
    } elseif ($table == "irigasi_sawah") {
        $mykey = $row['id_irigasi_sawah'];
    }

    $breake = explode("-", $mykey);

    $num = $breake[1] + 1;
    $threeNum = sprintf("%03d", $num);

    $key = $code . "-" . $threeNum;

    // echo $key;
    return $key;
}

function generateKeySecond($table, $conn){
    /*
    key : code-12 angka urut
    logikanya
    1 cek create untuk tabel yang mana
    2 jika foto sawah codenya FSW
    3 jika pemilik sawah codoenya PSW
    4 ambil id angka urut dari id terakhir
    5 tambah 1
    6 jadikan key code-12 angka urut ditambah 1
     */
    //Tentukan code dan pilih id di table
    if ($table == "foto_sawah") {
        $code = "FSW";
        $sql = "select id_foto_sawah from foto_sawah ORDER BY id_foto_sawah DESC LIMIT 1";
    } elseif ($table == "pemilik_sawah") {
        $code = "PSW";
        $sql = "select id_pemilik_sawah from pemilik_sawah ORDER BY id_pemilik_sawah DESC LIMIT 1";
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($table == "foto_sawah") {
        $mykey = $row['id_foto_sawah'];
    } elseif ($table == "pemilik_sawah") {
        $mykey = $row['id_pemilik_sawah'];
    }

    $breake = explode("-", $mykey);

    $num = $breake[1] + 1;
    $threeNum = sprintf("%012d", $num);

    $key = $code . "-" . $threeNum;

    return $key;
}

function generateKey($conn, $table){
    $hasil = null;
    if ($table == "pengguna" || $table == "sawah") {
        $hasil = generateKeyPrimary($table);
    }elseif ($table == "foto_sawah" || $table == "pemilik_sawah") {
        $hasil = generateKeySecond($table, $conn);
    }elseif ($table == "bekas_sawah" || $table == "tipe_sawah" || $table == "irigasi_sawah") {
        $hasil = generateKeyReference($table,$conn);
    }
    
    return $hasil;
}

function enumDropdown($conn, $table_name, $column_name, $item, $echo = false){
    $selectDropdown = "";
    $result = mysqli_query($conn, "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
           WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
    or die(mysqli_error());

    $row = mysqli_fetch_array($result);
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE']) - 6))));

    foreach ($enumList as $value) {
        $select = ($value == $item) ? "selected" : "";
        $selectDropdown .= "<option $select value=\"$value\">$value</option>";
    }
    $selectDropdown .= "";

    if ($echo) {
        echo $selectDropdown;
    }

    return $selectDropdown;
}

function referenceDropdown($conn, $table_name, $item = null, $echo = false){
    $selectDropdown = "";
    $option;
    $query = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $query) or die(mysqli_error());

    if ($table_name == "bekas_sawah") {
        $option = ["id_bekas_sawah", "nama_bekas_sawah"];
    }

    if ($table_name == "irigasi_sawah") {
        $option = ["id_irigasi_sawah", "nama_irigasi_sawah"];
    }

    if ($table_name == "tipe_sawah") {
        $option = ["id_tipe_sawah", "nama_tipe_sawah"];
    }

    $optionID = $option[0];
    while ($row = mysqli_fetch_assoc($result)) {
        $select = ($row[$option[0]] == $item) ? "selected" : "";
        $selectDropdown .= "<option " . $select . " value='" . $row[$option[0]] . "'" . ">" . $row[$option[1]] . "</option>";
    }
    $selectDropdown .= "";

    if ($echo) {
        echo $selectDropdown;
    }

    return $selectDropdown;
    echo $row[$option[0]];
}

function pemilikSawahDropdown($conn, $table_name, $echo = false){
    $selectDropdown = "";
    $option;
    $query = "SELECT * FROM $table_name";

    if ($table_name == "pengguna") {
        $option = ["id_pengguna", "username"];
        $query = "SELECT * FROM $table_name where `level`='user'";
    }
    if ($table_name == "sawah") {
        $option = ["id_sawah", "id_sawah"];
        $query = "SELECT B.* FROM $table_name B WHERE NOT EXISTS (SELECT A.id_sawah FROM pemilik_sawah A WHERE A.id_sawah = B.id_sawah)";
    }
    $result = mysqli_query($conn, $query) or die(mysqli_error());

    while ($row = mysqli_fetch_assoc($result)) {
        $selectDropdown .= "<option value=" . $row[$option[0]] . ">" . $row[$option[1]] . "</option>";
    }
    $selectDropdown .= "";

    if ($echo) {
        echo $selectDropdown;
    }

    return $selectDropdown;
}

function pickReference($conn, $table_name, $id, $echo = false){

    $field;
    if ($table_name == "bekas_sawah") {
        $field = ["id_bekas_sawah", "nama_bekas_sawah"];
    }

    if ($table_name == "irigasi_sawah") {
        $field = ["id_irigasi_sawah", "nama_irigasi_sawah"];
    }

    if ($table_name == "tipe_sawah") {
        $field = ["id_tipe_sawah", "nama_tipe_sawah"];
    }

    $fieldID = $field[0];
    $fieldName = $field[1];

    $query = "SELECT * FROM $table_name where $fieldID='$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);

    $namePick = $row[$fieldName];

    if ($echo) {
        echo $namePick;
    }

    return $namePick;
}

function luasMinMax($conn, $hitung){
    if ($hitung == "max") $query = "SELECT max(luas) as luas from sawah";
    if ($hitung == "min") $query = "SELECT min(luas) as luas from sawah";

    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);

    $luas = $row['luas'];

    return $luas;
}

function hargaMinMax($conn, $hitung){
    if ($hitung == "max") $query = "SELECT format(max(harga),0) as harga from sawah";
    if ($hitung == "min") $query = "SELECT format(min(harga),0) as harga from sawah";

    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);

    $harga = $row['harga'];

    return $harga;
}

function login($conn, $email, $password){
    session_start();
    //pengecekan
    $query = "SELECT email, `password`, id_pengguna FROM pengguna WHERE email='$email' AND `password`='$password'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);
  
    if ($rows == 1) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['id_pengguna'] = $data['id_pengguna'];
        echo "berhasil";
        ?>
        <script>
            alert("Berhasil Login");
            window.location.href = "index.php";
        </script>
        <?php
    } else {
        echo "gagal";
  
        ?>
        <script>
            alert("Gagal Login");
            window.location.href = "<?php echo $_SERVER['REQUEST_URI']?>";
        </script>
        <?php
    }
    // echo $_SERVER['REQUEST_URI']."login.php";
}

function signUp($conn, $email, $password){
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $checkEmail = "SELECT email FROM pengguna WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmail);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        ?>
        <script>
            alert("Email sudah sudah digunakan");
            window.location.href;
        </script>
        <?php
    } else {
        $brokeEmail = explode("@", $email);

        $id = generateKeyPrimary("pengguna");
        $username = $brokeEmail[0];
        $level = "user";


        $query = "INSERT INTO pengguna (`id_pengguna`, `username`, `password`,`email`,`level`) value ('$id','$username','$password','$email','$level')";
        $result = mysqli_query($conn, $query) or die(mysqli_error());
        if (!$result) {
            ?>
            <script>
                alert("gagal sign up");
                window.location.href;
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("berhasil sign up <?php echo $id." ".$username." ".$password." ".$email." ".$level." "?>");
                window.location.href;
            </script>
            <?php
        }
    }
}

function logout(){
    session_start();
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_SESSION["id_pengguna"]);
    session_destroy();
    header("Location: index.php");
}