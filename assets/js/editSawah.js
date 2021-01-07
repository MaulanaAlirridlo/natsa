$("#file-foto-sawah1").change(function (e) {
  var reader = new FileReader();

  reader.onload = function (e) {
    $("#foto-sawah1").attr("src", e.target.result);
  };
  reader.readAsDataURL(this.files[0]);
});
$("#file-foto-sawah2").change(function (e) {
  var reader = new FileReader();

  reader.onload = function (e) {
    $("#foto-sawah2").attr("src", e.target.result);
  };
  reader.readAsDataURL(this.files[0]);
});
$("#file-foto-sawah3").change(function (e) {
  var reader = new FileReader();

  reader.onload = function (e) {
    $("#foto-sawah3").attr("src", e.target.result);
  };
  reader.readAsDataURL(this.files[0]);
});


$('#pesanError').hide();

$("body").on('click', '#editSawah', function () {

  var formData = new FormData();

  var jenis = $('#jenis').val();
  var harga = $('#harga').val();
  var luas = $('#luas').val();
  var jumlahPanen = $('#jumlahPanen').val();
  var kodeDaerah = $('#kodeDaerah').val();
  var bekas = $('#bekas').val();
  var tipe = $('#tipe').val();
  var irigasi = $('#irigasi').val();
  var alamat = $('#alamatSawah').val();
  var deskripsi = $('#deskripsi').val();
  var maps = $('#maps').val();
  var idPengguna = $('#idPengguna').val();
  var idSawah = $('#idSawah').val();
  maps = maps.split(" ").join("+");

  // alert(idPengguna);
  // var fotoSatu = $('#file-foto-sawah1')[0];
  // var fotoDua = $('#file-foto-sawah2')[0];
  // var fotoTiga = $('#file-foto-sawah3')[0];

  // var fileName = "";
  // // fileName = fileName.append('fileName[]', fotoSatu.files[0].name);
  // // fileName = fileName.append('fileName[]', fotoDua.files[0].name);
  // // fileName = fileName.append('fileName[]', fotoTiga.files[0].name);
  // fileName += fotoSatu.files[0].name;
  // fileName += fotoDua.files[0].name;
  // fileName += fotoTiga.files[0].name;
  
  // console.table(fileName);
  // console.table(fotoSatu.files[0].name);


  formData.append('idPengguna', idPengguna);
  formData.append('idSawah', idSawah);
  formData.append('jenis', jenis);
  formData.append('harga', harga);
  formData.append('luas', luas);
  formData.append('jumlahPanen', jumlahPanen);
  formData.append('kodeDaerah', kodeDaerah);
  formData.append('bekas', bekas);
  formData.append('tipe', tipe);
  formData.append('irigasi', irigasi);
  formData.append('alamat', alamat);
  formData.append('deskripsi', deskripsi);
  formData.append('maps', maps);

  $.ajax({
      type: "POST",
      url: "./include/updateSawah.inc.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (data) {
          $("#pesanError").hide();
          window.location.href = "./jual.php";
          alert(data); //=== Show Success Message==

      },
      error: function (data) {
          // alert(data.responseText); //===Show Error Message====
          $("#pesanError").text(data.responseText);
          $("#pesanError").show();
      }

  });

});