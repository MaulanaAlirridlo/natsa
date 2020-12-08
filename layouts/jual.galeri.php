<?php
$dummy = array();
$katalogKey = 0;

$id=$_SESSION['id_pengguna'];
$query = "SELECT *, FORMAT(harga, 0) as harga, 
(SELECT CONCAT(d.provinsi,', ', d.kabupaten) FROM daerah d WHERE sawah.id_daerah=d.id_daerah) as daerah_sawah
from sawah where id_pengguna='$id'";
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
<div class="row mt-3 katalog-wrapper justify-content-center pb-3">
  <?php
  foreach ($dummy as $key => $v) {
  ?>
    <div class="card" >
      <div class="card-image">
        <img src="<?= $v->img ?>" alt="">
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $v->harga ?></h5>
        <p class="card-text"><?= $v->alamat ?></p>
      </div>
    </div>
  <?php } ?>
</div>