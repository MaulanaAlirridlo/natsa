$("#file-foto-sawah1").change(function (e) {
  var reader = new FileReader();

  reader.onload = function (e) {
    $("#foto-sawah1").attr("src", e.target.result);
  };
  reader.readAsDataURL(this.files[0]);
  $('#file-foto-sawah1').attr("up-stat", "true");
});
$("#file-foto-sawah2").change(function (e) {
  var reader = new FileReader();

  reader.onload = function (e) {
    $("#foto-sawah2").attr("src", e.target.result);
  };
  reader.readAsDataURL(this.files[0]);
  $('#file-foto-sawah2').attr("up-stat", "true");

});
$("#file-foto-sawah3").change(function (e) {
  var reader = new FileReader();

  reader.onload = function (e) {
    $("#foto-sawah3").attr("src", e.target.result);
  };
  reader.readAsDataURL(this.files[0]);
  $('#file-foto-sawah3').attr("up-stat", "true");

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
  var fotoSatu = $('#file-foto-sawah1')[0].files[0];
  var fotoDua = $('#file-foto-sawah2')[0].files[0];
  var fotoTiga = $('#file-foto-sawah3')[0].files[0];

  var fotoId = [];
  if ($('#file-foto-sawah1').attr("up-stat") == "true") {
    // fotoId.push($('#file-foto-sawah1').attr('id-foto'));
    formData.append('fotoId[]', $('#file-foto-sawah1').attr('id-foto'));
  }
  if ($('#file-foto-sawah2').attr("up-stat") == "true") {
    formData.append('fotoId[]', $('#file-foto-sawah2').attr('id-foto'));
  }
  if ($('#file-foto-sawah3').attr("up-stat") == "true") {
    formData.append('fotoId[]', $('#file-foto-sawah3').attr('id-foto'));
  }

  // fotoSatu = fotoSatu.join(fotoSatuId);

  console.table(fotoId);
  // console.table(fotoId);

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
  formData.append('fotoSawah[]', fotoSatu);
  formData.append('fotoSawah[]', fotoDua);
  formData.append('fotoSawah[]', fotoTiga);
  // formData.append('fotoId[]', fotoId);

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