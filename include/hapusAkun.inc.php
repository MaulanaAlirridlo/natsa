<?php
include 'conn.php';
session_start();
echo "hello anda akan hapus akun <p>";

//cek apakah ada sesi
if (isset($_SESSION['id_pengguna']) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
    echo "sesi anda ada  <p>";
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $id_pengguna = $_SESSION['id_pengguna'];
} else {
    echo "aneh sesi anda tidak ada  <p>";
    return false;
}

$password = md5($password);//ubah password jadi md5

//ambil data yang mirip dengan semua sesi
$query = "SELECT * FROM pengguna where id_pengguna='$id_pengguna' and email='$email' and `password` = '$password' limit 1";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
//apakah memang ada
if ($count == 1) {
    echo "akun anda terdaftar  <p>";
}else {
    echo "aneh akun anda tidak terdaftar  <p>";
    return false;
}
//hapus akun
$query = "DELETE FROM `pengguna` WHERE id_pengguna='$id_pengguna'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "terjadi masalah saat menghapus akun anda ".mysqli_error($conn);
    return false;
}
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION["id_pengguna"]);
session_destroy();
echo "akun anda sudah terhapus";




// if (isset($_SESSION['id_pengguna'])) {
//     // mengambil data session
//     $id = $_SESSION['id_pengguna'];
//     $email = $_SESSION['email'];
//     // cek data session ke databases
//     $sql = mysqli_query($conn, "SELECT * FROM `pengguna` WHERE id_pengguna='$id' AND email='$email' ");
//     $row = mysqli_num_rows($sql);

//     if ($row = 1) {
//         $query_hapus = mysqli_query($conn, "DELETE FROM `pengguna` WHERE id_pengguna='$id'");
//         header("Location:index.php");
//     } else {
//         echo "Data Tidak Ditemukan";
//     }

// }
?>
<script>
    alert("akun anda sudah terhapus");
    window.location.href = "../index.php";

</script>