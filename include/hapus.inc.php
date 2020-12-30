<?php 
    include 'conn.php'; 
   
        
    
         if(isset($_SESSION['id_pengguna'])){
            // mengambil data session
            $id = $_SESSION['id_pengguna'] ;
            $email = $_SESSION['email'] ;
            // cek data session ke databases
            $sql = mysqli_query($conn,"SELECT * FROM `pengguna` WHERE id_pengguna='$id' AND email='$email' " ) ;
            $row = mysqli_num_rows($sql) ;

            if($row = 1){
                $query_hapus = mysqli_query($conn, "DELETE FROM `pengguna` WHERE id_pengguna='$id'") ;
                header("Location:index.php");
            }else {
                echo "Data Tidak Ditemukan" ;
            }

        }
                
            
    

?>