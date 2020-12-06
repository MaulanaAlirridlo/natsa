<?php

    $cari = null;
    $filter = null;

    if(isset($_POST['lakukanCari'])) $cari = $_POST['cariDaerah'];;
    if(isset($_POST['lakukanFilter'])) $filter = $_POST['filterDaerah'];;

?>
cari adalah <?php echo $cari?>
<br>
filter adalah <?php echo $filter?>
<!-- $namaGambarDiDatabase = "gambar.jpg";
<img src="folderGambar/<?php echo $namaGambarDiDatabase?>" alt=""> -->