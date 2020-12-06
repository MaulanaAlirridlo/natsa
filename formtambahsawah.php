<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/navbar.css">
  <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
  <title>Form Tambah Sawah</title>
</head>

<body>
  <?php include './layouts/navbar.php' ?>
  <div class="container mt-3">
    <h1>Form Tambah Sawah</h1>
    <form action="" class="form-group">
      <label for="jenis">Jenis</label>
      <select name="jenis" id="jenis" class="form-control">
        <option value="jual">Jual</option>
        <option value="sewa">Sewa</option>
      </select>
      <label for="harga">Harga</label>
      <input type="text" class="form-control" nama="harga" id="harga">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control"></textarea>
      <label for="luas">Luas</label>
      <input type="text" class="form-control" nama="luas" id="luas">
      <label for="jumlah-panen">Jumlah panen</label>
      <input type="text" class="form-control" nama="jumlah-panen" id="jumlah-panen">
      <label for="bekas-sawah">Bekas sawah</label>
      <input type="text" class="form-control" nama="bekas-sawah" id="bekas-sawah">
      <label for="tipe-sawah">Tipe sawah</label>
      <input type="text" class="form-control" nama="tipe-sawah" id="tipe-sawah">
      <label for="irigasi-sawah">Irigasi sawah</label>
      <input type="text" class="form-control" nama="irigasi-sawah" id="irigasi-sawah">
      <label for="deskripsi">Deskripsi</label>
      <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
      <label for="foto-sawah">Foto sawah</label> <br>
      <input type="file" nama="foto-sawah" id="foto-sawah"> <br>
      <input type="submit" value="Tambah" class="btn btn-secondary float-right mb-5">
    </form>
  </div>
</body>

</html>