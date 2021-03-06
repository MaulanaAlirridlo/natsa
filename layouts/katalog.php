<?php
$filter = null;
$cari = null;
$beli_sawah = null ;
// if (isset($_POST['filter'])) {
//     $minLuas = $_POST['luas-min'];
//     $maxLuas = $_POST['luas-max'];
//     $minHarga = $_POST['harga-min'];
//     $maxHarga = $_POST['harga-max'];
//     $bekas = $_POST['bekas'];
//     $tipe = $_POST['tipe'];
//     $irigasi = $_POST['irigasi'];

//     $filter = "WHERE luas BETWEEN '$minLuas' AND '$maxLuas'  OR
//     harga BETWEEN '$minHarga' AND '$maxHarga'  OR
//     id_bekas_sawah='$bekas' OR
//     id_tipe_sawah='$tipe' OR
//     id_irigasi_sawah='$irigasi'";
// }

// if (isset($_GET['cari'])) {
//     $keyword = $_GET['cari'];
//     $cari = "HAVING daerah_sawah LIKE '%$keyword%'";
// }

//set filter halaman, filter yang dikiri dan daerah
// if(isset($_POST['jenisSawah'])){
//   $jenis = $_POST['jenisSawah'] ;
//   $filter = "WHERE jenis like '%$jenis%' OR harga > 500000"; 
// }

$filter = "WHERE jenis like '%$jenis%'";

$limit = 6 ;
if(isset($_POST['tambahData_Baru'])){
    $limit = $_POST['tambahData_Baru'] ;
}

if (isset($_POST["filterSawah"])) {
    $minLuas = $_POST['luasMin'];
    $maxLuas = $_POST['luasMax'];
    $minHarga = $_POST['hargaMin'];
    $maxHarga = $_POST['hargaMax'];
    $bekas = $_POST['bekas'];
    $tipe = $_POST['tipe'];
    $irigasi = $_POST['irigasi'];
    
    if (empty($maxHarga) || $maxHarga=="" || $maxHarga==0) $maxHarga = 9999999999999999999999999999999;
    if (empty($maxLuas) || $maxLuas=="" || $maxLuas==0) $maxLuas = 9999999999999999999999999999999;
    if (empty($minHarga) || $minHarga=="") $minHarga = 0;
    if (empty($minLuas) || $minLuas=="") $minLuas = 0;

    $filter .= " AND 
              luas BETWEEN '$minLuas' AND '$maxLuas'  AND
              harga BETWEEN '$minHarga' AND '$maxHarga'  AND
              id_bekas_sawah like '%$bekas%' AND
              id_tipe_sawah like '%$tipe%' AND
              id_irigasi_sawah like '%$irigasi%'";

}

if (isset($_POST["cariDaerah"])) {
  $keyword = $_POST["cariDaerah"];
  $filter .= "HAVING daerah_sawah LIKE '%$keyword%'";
}

$querySawah = "SELECT *, FORMAT(harga, 0) as harga,
                (SELECT CONCAT(d.provinsi,', ', d.kabupaten) FROM daerah d WHERE sawah.id_daerah=d.id_daerah) as daerah_sawah
                from sawah 
                $filter 
                LIMIT $limit ";
$resultSawah = mysqli_query($conn, $querySawah) or die(mysqli_error($conn));

$dummy = array();
$katalogKey = 0;
while ($rowSawah = mysqli_fetch_assoc($resultSawah)) {
    $id_sawah = $rowSawah['id_sawah'];

    $foto = [];
    $a = 0;
    $queryFoto = "SELECT nama_foto FROM foto_sawah where id_sawah='$id_sawah' limit 3";
    $resultFoto = mysqli_query($conn, $queryFoto);

    while ($rowFoto = mysqli_fetch_assoc($resultFoto)) {
        $foto[$a] = $rowFoto['nama_foto'];
        $a++;
    }

    array_push($dummy, (object) array(
        'harga' => $rowSawah['harga'],
        'alamat' => $rowSawah['daerah_sawah'],
        'id' => $rowSawah['id_sawah'],
        'luas' => $rowSawah['luas'],
        'panen' => $rowSawah['jumlah_panen'],
        'jenis' => $rowSawah['jenis'],
        'deskripsi' => $rowSawah['deskripsi'],
        'img' => './assets/img/' . $foto[0],
        'img1' => './assets/img/' . $foto[0],
        'img2' => './assets/img/' . $foto[1],
        'img3' => './assets/img/' . $foto[2]
        
    ));

}

?>
<div class="row mt-3 katalog-wrapper">
  <?php
foreach ($dummy as $key => $v) {
    ?>
    <?php if ($key % 3 == 0) {?>
      <div class="desc" id="desc<?=$katalogKey?>">
        <?php include './layouts/katalog.desc.php'?>
      </div>
    <?php $katalogKeyEnd = $key + 2;
    }?>
    <div class="card"
      data-harga="<?=$v->harga?>"
      data-alamat="<?=$v->alamat?>"
      data-cardid="<?=$key?>"
      data-descid="<?=$katalogKey?>"
      data-img1="<?=$v->img1?>"
      data-img2="<?=$v->img2?>"
      data-img3="<?=$v->img3?>"
      data-id="<?=$v->id?>"
      data-luas="<?=$v->luas?>"
      data-jumlah-panen="<?=$v->panen?>"
      data-jenis = "<?=$v->jenis?>"
      data-deskripsi = "<?=$v->deskripsi?>"
    >
      <div class="jenis-label rounded">
        <h5 class="mb-0">
          <?php if($v->jenis=="jual") { echo "Dijual"; } else { echo "Disewakan"; }; ?>
        </h5>
      </div>
      <div class="card-image">
        <img src="<?=$v->img?>" alt="">
      </div>
      <div class="card-body">
        <h5 class="card-title"><?=$v->harga?></h5>
        <p class="card-text"><?=$v->alamat?></p>
      </div>
    </div>
  <?php
if ($key == $katalogKeyEnd) {
        $katalogKey++;
    }
}
?>
</div>

