<div class="row">
  <div class="col">
    <div class="row p-2 pt-4">
      <div class="desc-user bg-white">
        <div class="p-2">
          <a href="#" class="text-decoration-none text-dark">
            <div class="rounded-circle desc-user-image">
              <img src="./assets/img/<?php echo $rowPemilik['foto_pemilik'];?>" alt="F">
            </div>
            <h5 class="mt-2"><?php echo $rowPemilik['nama_pemilik'];?></h5>
            <p>&nbsp;</p>
          </a>
          <?php if ($user) { ?>
            <div class="border rounded">
              <p class="my-2"><?php echo $rowPemilik['no_hp'];?></p>
            </div>
          <?php } ?>
        </div>
        <?php if ($user) { ?>
          <div class="bg-light border-top desc-account">
            <a href="#">
              <i class="fab fa-whatsapp"></i>
            </a>
            <a href="http://www.facebook.com">
              <i class="fab fa-facebook-square"></i>
            </a>
            <a href="http://www.instagram.com">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="http://www.twitter.com">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>