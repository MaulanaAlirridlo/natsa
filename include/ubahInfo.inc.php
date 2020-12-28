<?php

include 'conn.php';

$file = "";
$fileName = "";
$fileTmp = "";
$fileSize = "";
$fileError = "";
$fileType = "";
$updateFoto = false;

//cek apakah ada file yang diupload
if (isset($_FILES['foto'])) {
    $file = $_FILES['foto'];
    $fileName = $_FILES['foto']['name'];
    $fileTmp = $_FILES['foto']['tmp_name'];
    $fileSize = $_FILES['foto']['size'];
    $fileError = $_FILES['foto']['error'];
    $fileType = $_FILES['foto']['type'];
    $updateFoto = true;
}

//ambil data yang dikirim
$username = $_POST['username'];
$nama_depan = $_POST['namaDepan'];
$nama_belakang = $_POST['namaBelakang'];
$no_hp = $_POST['nohp'];
$wa = $_POST['wa'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$deskripsi = $_POST['deskripsi'];
$id = $_POST['idPengguna'];

if ($updateFoto) {
    // echo $fileName.$username.$nama_belakang.$nama_depan.$no_hp.$wa.$email.$alamat.$deskripsi.$id;

    //ambil nama_foto pengguna dari database
    $query = "SELECT nama_foto from pengguna where id_pengguna='$id' limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    //hapus foto sebelumnya jika foto bukan default foto
    if ($row['nama_foto'] != "default_user.jpg") {
        unlink("../assets/img/".$row['nama_foto']);
    }
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = null;
    $allow = array('jpg', 'jpeg', 'png');

    //cek ekstensi file
    if (!in_array($fileActualExt, $allow)) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "file hanya boleh JPG, JPEG dan PNG";
        return false;
    }

    //cek apakah ada error di file
    if (!$fileError == 0) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "Terjadi error saat upload file";
        return false;
    }

    //cek ukuran file
    if ($fileSize >= 2097152) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "Harap uplaod file yang berukuran kurang dari 2 MB";
        return false;
    }

    $fileNameNew = uniqid('PGN-', true) . "." . $fileActualExt;
    $fileDestination = '../assets/img/' . $fileNameNew;
    $result = move_uploaded_file($fileTmp, $fileDestination);

    if (!$result) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "terjadi kesalah saat upload file";
        return false;
    }

    $sql = "UPDATE pengguna SET
    username='$username',
    nama_depan='$nama_depan',
    nama_belakang='$nama_belakang',
    no_hp='$no_hp',
    wa='$wa',
    email='$email',
    alamat='$alamat',
    deskripsi='$deskripsi',
    nama_foto='$fileNameNew'
    where id_pengguna = '$id' ";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "terjadi masalah : " . mysqli_error($conn);
    } else {
        echo "Data berhasil diupdate";
    }

} else {
    // echo $username.$nama_belakang.$nama_depan.$no_hp.$wa.$email.$alamat.$deskripsi.$id;

    $sql = "UPDATE pengguna SET
                    username='$username',
                    nama_depan='$nama_depan',
                    nama_belakang='$nama_belakang',
                    no_hp='$no_hp',
                    wa='$wa',
                    email='$email',
                    alamat='$alamat',
                    deskripsi='$deskripsi'
                    where id_pengguna = '$id' ";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        echo "terjadi masalah : " . mysqli_error($conn);
    } else {
        echo "Data berhasil diupdate";
    }
}
