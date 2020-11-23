<div class="row mt-3 bg-light p-3 desc-wrapper">
  <div class="col-5 pl-0 pr-0">
    <div id="carouselIndicators<?= $key ?>" class="carousel slide" data-ride="carousel" data-interval="99999999">
      <div class="carousel-inner">
        <div class="carousel-item desc-image active">
          <img src="https://images.unsplash.com/photo-1526773109852-8467aff022cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="">
        </div>
        <div class="carousel-item desc-image">
          <img src="https://images.unsplash.com/photo-1526773109852-8467aff022cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="">
        </div>
        <div class="carousel-item desc-image">
          <img src="https://images.unsplash.com/photo-1526773109852-8467aff022cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="">
        </div>
      </div>
      <ol class="carousel-indicators">
        <li 
          data-target="#carouselIndicators<?= $key ?>" 
          data-slide-to="0" 
          class="active indicator-list"
          style="background-image: url(https://images.unsplash.com/photo-1526773109852-8467aff022cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);"
        >
        <li 
          data-target="#carouselIndicators<?= $key ?>" 
          data-slide-to="1" class="indicator-list"
          style="background-image: url(https://images.unsplash.com/photo-1526773109852-8467aff022cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);"
        >
        <li 
          data-target="#carouselIndicators<?= $key ?>" 
          data-slide-to="2" class="indicator-list"
          style="background-image: url(https://images.unsplash.com/photo-1526773109852-8467aff022cf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);"
        >
      </ol>
    </div>
  </div>
  <div class="col">
    <div class="desc-description">
      <h4 class="desc-harga">Harga</h4>
      <p class="desc-alamat">desc</p>
    </div>
    <div class="filter-search">
      <button class="btn btn-secondary float-right mt-5 rounded-pill">Detail</button>
    </div>
  </div>
</div>