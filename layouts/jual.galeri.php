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
<div class="row mt-3 katalog-wrapper justify-content-center pb-3">
  <?php
  foreach ($dummy as $key => $v) {
  ?>
    <div class="card" >
      <div class="card-image">
        <img src="https://images.unsplash.com/photo-1526773109852-8467aff022cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="">
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $v->harga ?></h5>
        <p class="card-text"><?= $v->alamat ?></p>
      </div>
    </div>
  <?php } ?>
</div>