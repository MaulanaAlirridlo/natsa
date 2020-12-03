<?php
$user = true;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Beli</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sewa</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 ml-auto mr-auto" method="GET" action="">
      <input class="form-control mr-sm-2 search" type="search" name="cari" placeholder="Cari Berdasarkan Daerah" aria-label="Search">
    </form>
    <?php if ($user) { ?>
      <a href="./userprofil.php">
        <div class="rounded-circle user">
          <img src="https://www.kindpng.com/picc/m/252-2524695_dummy-profile-image-jpg-hd-png-download.png" alt="F">
        </div>
      </a>
    <?php } else { ?>
      <div class="user-btn">
        <a href="./login.html">
          <button class="btn btn-secondary">Login</button>
        </a>
        <a href="./signup.html">
          <button class="btn btn-secondary">Signup</button>
        </a>
      </div>
    <?php } ?>
  </div>
</nav>