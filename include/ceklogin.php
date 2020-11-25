<?php
include 'conn.php' ;
session_start() ;
//ambil data
    $email = $_POST['email'] ;
    $password =$_POST['password'] ;
//pengecekan

$result = mysqli_query($conn, "SELECT * FROM user WHERE email=$email AND`password`=$password ");
$cek = mysqli_num_rows($result) ;




    if($cek > 0 ){
        session_start();
        $data = mysqli_fetch_assoc($result) ;
        $_SESSION['email']=$email ;
        $_SESSION['password']=$password ;
        header("Location:index.php");
    }else{
        header("Location:login.php") ;
    }
    ?>