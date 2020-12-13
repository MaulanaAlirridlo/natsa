<div class="filter">
  <div class="row text-center">

    <form method="post" action="">
      <div class="form-group">
        <div class="luas-picker form-item-slider-margin text-left">
          <div class="picker">
            <label for="customRange1">Luas</label>
            <div class="justify-content-center d-flex pl-1">
                <input
                  type="text"
                  class="custom-range d-inline-block range-left form-control bg-white"
                  id="customRange11"
                  name="luas-min"
                />
                <input
                  type="text"
                  class="custom-range d-inline-block range-right form-control bg-white"
                  id="customRange12"
                  name="luas-max"
                />
              <span
                class="font-weight-bold text-primary ml-2 valueSpan2"
              ></span>
            </div>
          </div>
        </div>
        <div class="harga-picker form-item-slider-margin text-left pl-1">
          <div class="picker">
            <label for="customRange2">Harga</label>
            <div class="justify-content-center d-flex">
                <input
                  type="text"
                  class="custom-range d-inline-block range-left form-control bg-white"
                  id="customRange21"
                  name="harga-min"
                />
                <input
                  type="text"
                  class="custom-range d-inline-block range-right form-control bg-white"
                  id="customRange22"
                  name="harga-max"
                />
              <span
                class="font-weight-bold text-primary ml-2 valueSpan2"
              ></span>
            </div>
          </div>
        </div>
        <div class="bekas-picker form-item-margin text-left">
          <label for="bekas">Bekas Sawah</label>
          <select name="bekas" id="bekas" class="form-control">
            <option value="">----</option>
            <?php echo referenceDropdown($conn, "bekas_sawah") . "<br>"; ?>
          </select>
        </div>
        <div class="tipe-picker form-item-margin text-left">
          <label for="tipe">Tipe Sawah</label>
          <select name="tipe" id="tipe" class="form-control">
            <option value="">----</option>
            <?php echo referenceDropdown($conn, "tipe_sawah")."<br>"; ?>
          </select>
        </div>
        <div class="irigasi-picker form-item-margin text-left">
          <label for="irigasi">Irigasi Sawah</label>
          <select name="irigasi" id="irigasi" class="form-control">
            <option value="">----</option>
            <?php echo referenceDropdown($conn, "irigasi_sawah")."<br>"; ?>
          </select>
        </div>
        <div class="filter-search">
          <button class="btn btn-secondary float-right mt-2 rounded-pill" name="filter" type="filter">Filter</button>
        </div>
      </div>
    </form>

  </div>
</div>