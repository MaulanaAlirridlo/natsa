<?php
$filter = null;
if(isset($_GET['filter'])){
  $minLuas=$_GET['luas-min'];
  $maxLuas=$_GET['luas-max'];
  $minHarga=$_GET['harga-min'];
  $maxHarga=$_GET['harga-max'];
  $bekas=$_GET['bekas'];
  $tipe=$_GET['tipe'];
  $irigasi=$_GET['irigasi'];
  
  $filter = "WHERE luas BETWEEN '$minLuas' AND '$maxLuas'  OR
  harga BETWEEN '$minHarga' AND '$maxHarga'  OR
  id_bekas_sawah='$bekas' OR 
  id_tipe_sawah='$tipe' OR 
  id_irigasi_sawah='$irigasi'";
}
$query = "SELECT *, FORMAT(harga, 0) as harga from sawah $filter";
$result = mysqli_query($conn, $query);

$dummy = array();
$katalogKey = 0;
while ($row = mysqli_fetch_assoc($result)) {

    array_push($dummy, (object) array(
        'harga' => $row['harga'],
        'alamat' => $row['alamat'],
        'img' => './assets/img/dummy.jpg'
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