<div class="row mt-3 bg-light p-3 desc-wrapper">
  <div class="col-5 pl-0 pr-0">
    <div id="carouselIndicators<?= $key ?>" class="carousel slide" data-ride="carousel" data-interval="99999999">
      <div class="carousel-inner">
        <div class="carousel-item desc-image active">
          <img src="<?= $v->img ?>" alt="">
        </div>
        <div class="carousel-item desc-image">
          <img src="<?= $v->img ?>" alt="">
        </div>
        <div class="carousel-item desc-image">
          <img src="<?= $v->img ?>" alt="">
        </div>
      </div>
      <ol class="carousel-indicators">
        <li data-target="#carouselIndicators<?= $key ?>" data-slide-to="0" class="active indicator-list" style="background-image: url(<?= $v->img ?>);">
        <li data-target="#carouselIndicators<?= $key ?>" data-slide-to="1" class="indicator-list" style="background-image: url(<?= $v->img ?>);">
        <li data-target="#carouselIndicators<?= $key ?>" data-slide-to="2" class="indicator-list" style="background-image: url(<?= $v->img ?>);">
      </ol>
    </div>
  </div>
  <div class="col">
    <div class="desc-description">
      <h4 class="desc-harga">Harga</h4>
      <p class="desc-alamat">desc</p>
    </div>
    <div class="filter-search">
      <a href="./fulldesc.php?id=<?= $v->id ?>">
        <button class="btn btn-secondary float-right mt-5 rounded-pill">Detail</button>
      </a>
    </div>
  </div>
</div>