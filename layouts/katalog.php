<?php
$filter = null;
$cari = null;
if(isset($_POST['filter'])){
  $minLuas=$_POST['luas-min'];
  $maxLuas=$_POST['luas-max'];
  $minHarga=$_POST['harga-min'];
  $maxHarga=$_POST['harga-max'];
  $bekas=$_POST['bekas'];
  $tipe=$_POST['tipe'];
  $irigasi=$_POST['irigasi'];
  
  $filter = "WHERE luas BETWEEN '$minLuas' AND '$maxLuas'  OR
  harga BETWEEN '$minHarga' AND '$maxHarga'  OR
  id_bekas_sawah='$bekas' OR 
  id_tipe_sawah='$tipe' OR 
  id_irigasi_sawah='$irigasi'";
}
if (isset($_GET['cari'])) {
  $keyword = $_GET['cari'];
  $cari = "HAVING daerah_sawah LIKE '%$keyword%'";
}

$query = "SELECT *, FORMAT(harga, 0) as harga, 
(SELECT CONCAT(d.provinsi,', ', d.kabupaten) FROM daerah d WHERE sawah.id_daerah=d.id_daerah) as daerah_sawah
from sawah $filter $cari";
$result = mysqli_query($conn, $query);

$dummy = array();
$katalogKey = 0;
while ($row = mysqli_fetch_assoc($result)) {

    array_push($dummy, (object) array(
        'harga' => $row['harga'],
        'alamat' => $row['daerah_sawah'],
        'img' => './assets/img/dummy.jpg',
        'id' => $row['id_sawah']
    ));

}

?>
<div class="row mt-3 katalog-wrapper">
  <?php
  foreach ($dummy as $key => $v) {
  ?>
    <?php if ($key % 3 == 0) { ?>
      <div class="desc" id="desc<?= $katalogKey ?>">
        <?php include('./layouts/katalog.desc.php') ?>
      </div>
    <?php $katalogKeyEnd = $key + 2;
    } ?>
    <div class="card"
      data-harga="<?= $v->harga ?>" 
      data-alamat="<?= $v->alamat ?>" 
      data-cardid="<?= $key ?>"
      data-descid="<?= $katalogKey ?>"
    >
      <div class="card-image">
        <img src="<?= $v->img ?>" alt="">
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $v->harga ?></h5>
        <p class="card-text"><?= $v->alamat ?></p>
      </div>
    </div>
  <?php
    if ($key == $katalogKeyEnd) {
      $katalogKey++;
    }
  }
  ?>
</div>