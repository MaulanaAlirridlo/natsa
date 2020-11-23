<div class="bg-light filter">
  <div class="row text-center">
    <form method="post" action="">
      <div class="form-group">
        <div class="luas-picker form-item-slider-margin text-left">
          <div class="picker">
            <label for="customRange1">Luas</label>
            <div class="d-flex justify-content-center">
                <input
                  type="range"
                  class="custom-range"
                  id="customRange11"
                  min="<?php echo luasMinMax($conn, "min"); ?>"
                  max="<?php echo luasMinMax($conn, "max"); ?>"
                />
              <span
                class="font-weight-bold text-primary ml-2 valueSpan2"
              ></span>
            </div>
          </div>
          <div class="ket">
            <p class="float-left"><?php echo luasMinMax($conn, "min"); ?> m <sup>2</sup></p>
            <p class="float-right"><?php echo luasMinMax($conn, "max"); ?> m <sup>2</sup></p>
          </div>
        </div>
        <div class="harga-picker mt-4 form-item-slider-margin text-left">
          <div class="picker">
            <label for="customRange2">Harga</label>
            <div class="d-flex justify-content-center">
                <input
                  type="range"
                  class="custom-range"
                  id="customRange12"
                  min="<?php echo hargaMinMax($conn, "min"); ?>"
                  max="<?php echo hargaMinMax($conn, "max"); ?>"
                />
              <span
                class="font-weight-bold text-primary ml-2 valueSpan2"
              ></span>
            </div>
          </div>
          <div class="ket">
            <p class="float-left"><?php echo hargaMinMax($conn, "min"); ?></p>
            <p class="float-right"><?php echo hargaMinMax($conn, "max"); ?></p>
          </div>
        </div>
        <div class="bekas-picker form-item-margin text-left">
          <label for="bekas">Bekas Sawah</label>
          <select name="cars" id="bekas" class="form-control">
            <option value="">----</option>
            <?php echo referenceDropdown($conn, "bekas_sawah") . "<br>"; ?>
          </select>
        </div>
        <div class="tipe-picker form-item-margin text-left">
          <label for="tipe">Tipe Sawah</label>
          <select name="cars" id="tipe" class="form-control">
            <option value="">----</option>
            <?php echo referenceDropdown($conn, "tipe_sawah")."<br>"; ?>
          </select>
        </div>
        <div class="irigasi-picker form-item-margin text-left">
          <label for="irigasi">Bekas Sawah</label>
          <select name="cars" id="irigasi" class="form-control">
            <option value="">----</option>
            <?php echo referenceDropdown($conn, "irigasi_sawah")."<br>"; ?>
          </select>
        </div>
      </div>
    </form>
  </div>
</div>
