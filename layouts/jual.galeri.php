<?php
$dummy = array();
$katalogKey = 0;

for ($i = 0; $i < 9; $i++) {
  array_push($dummy, (object)array(
    'harga' => $i,
    'alamat' => 'Konoha',
    'img' => './assets/img/dummy.jpg'
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