<div class="row">
  <div class="col">
    <div class="row p-2 pt-4">
      <div class="desc-user bg-white">
        <div class="p-2">
          <a href="#" class="text-decoration-none text-dark">
            <div class="rounded-circle desc-user-image">
              <img src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png" alt="F">
            </div>
            <h5 class="mt-2">Nama Nama Nama</h5>
            <p>data singkat atau rating</p>
          </a>
          <?php if ($user) { ?>
            <div class="border rounded">
              <p class="my-2">0812345678910</p>
            </div>
          <?php } ?>
        </div>
        <?php if ($user) { ?>
          <div class="bg-light border-top desc-account">
            <a href="#">
              <i class="fab fa-whatsapp"></i>
            </a>
            <a href="facebook.com">
              <i class="fab fa-facebook-square"></i>
            </a>
            <a href="instagram.com">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="twitter.com">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>