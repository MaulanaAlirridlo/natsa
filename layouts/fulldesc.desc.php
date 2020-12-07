<div class="wrapper">
  <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="10000">
    <div class="row">
      <div class="col-3 p-0 indicators">
        <ol class="carousel-indicators">
          <li data-target="#carouselIndicators" data-slide-to="0" class="active indicator-list m-0" style="background-image: url(./assets/img/dummy.jpg);">
          <li data-target="#carouselIndicators" data-slide-to="1" class="indicator-list m-0" style="background-image: url(./assets/img/dummy.jpg);">
          <li data-target="#carouselIndicators" data-slide-to="2" class="indicator-list m-0" style="background-image: url(./assets/img/dummy.jpg);">
        </ol>
      </div>
      <div class="col p-0 gallery desc-wrapper">
        <div class="carousel-inner">
          <div class="carousel-item image active">
            <img src="./assets/img/dummy.jpg" alt="">
          </div>
          <div class="carousel-item image">
            <img src="./assets/img/dummy.jpg" alt="">
          </div>
          <div class="carousel-item image">
            <img src="./assets/img/dummy.jpg" alt="">
          </div>
        </div>
        <div class="desc">
          <div class="row">
            <div class="col">
              <h3>Harga : Rp <?php echo $rowSawah['harga'];?></h3>
              <p><?php echo $rowSawah['alamat'];?><p>
              <div class="row">
                <div class="col">
                  <h6>Luas</h6>
                  <p><?php echo $rowSawah['luas'];?> m<sup>2</sup></p>
                  <h6>Jumlah Panen</h6>
                  <p><?php echo $rowSawah['jumlah_panen'];?> kali</p>
                  <h6>Bekas Sawah</h6>
                  <p><?php echo $rowSawah['bekas_sawah'];?></p>
                  <h6>Tipe Sawah</h6>
                  <p><?php echo $rowSawah['tipe_sawah'];?></p>
                  <h6>Irigasi Sawah</h6>
                  <p><?php echo $rowSawah['irigasi_sawah'];?></p>
                </div>
                <div class="col">
                  <h6>Deskripsi</h6>
                  <p><?php echo $rowSawah['deskripsi'];?><p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>