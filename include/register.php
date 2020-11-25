<?php

include 'conn.php' ;

$email = " " ;
$password = " " ;
$errors = array() ;
// mengambil data
if(isset($_POST['register'])){
    $email = mysqli_real_escape_string($_POST['email'] ) ;
    $password =mysqli_real_escape_string($_POST['password']) ;
    //pengecekan saat mengisi
if(empty($email) ){array_push($errors, "Email harus di isi") ;}
if(empty($password)){array_push($errors,"Password wajib di isi");} 

}
//pengecekan di database 
$check_db = "SELECT * FROM pengguna WHERE email='$email' LIMIT 1 " ;
$result = mysqli_query($db, $check_db) ;
$cek = mysqli_fetch_assoc($result);

// if($cek){
//     if($cek['email'] == $email ){
//         array_push($errors, "Email sudah digunakan ")
//     }
// }
// //proses
// if(count($errors) == 0){

//     $query = "INSERT INTO pengguna ("
// }





?>