<?php
$dummy = array();
$katalogKey = 0;

for ($i = 0; $i < 9; $i++) {
  array_push($dummy, (object)array(
    'harga' => $i,
    'alamat' => 'Konoha'
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
        <img src="https://images.unsplash.com/photo-1526773109852-8467aff022cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="">
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $key ?></h5>
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