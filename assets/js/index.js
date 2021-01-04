init()
let lastCardId;

function setLastDescId(id) {
  lastCardId = id;
}

function init() {
  $(".desc").hide();
  $(".card").click(function () {

    let harga = $(this).data("harga");
    let alamat = $(this).data("alamat");
    let cardId = $(this).data("cardid");
    let descId = $(this).data("descid");
    let img1 = $(this).data("img1");
    let img2 = $(this).data("img2");
    let img3 = $(this).data("img3");
    let id = $(this).data("id");
    let luas = $(this).data("luas");
    let jumlahPanen = $(this).data("jumlah-panen");
    let deskripsi = $(this).data("deskripsi");
    let jenis = $(this).data("jenis");

    $('#img' + descId + '1').attr('src', img1);
    $('#img' + descId + '2').attr('src', img2);
    $('#img' + descId + '3').attr('src', img3);
    $('#indicator' + descId + '1').css('background-image', 'url(' + img1 + ')');
    $('#indicator' + descId + '2').css('background-image', 'url(' + img2 + ')');
    $('#indicator' + descId + '3').css('background-image', 'url(' + img3 + ')');
    $(".desc-harga").text(harga);
    $(".desc-alamat").text(alamat);
    $(".desc-luas").text(luas);
    $(".desc-jumlahPanen").text(jumlahPanen);
    $(".desc-jenis").text(jenis);
    $(".desc-desk").text(deskripsi);
    $('#link' + descId).attr('href', './fulldesc.php?id=' + id);

    if (lastCardId === cardId) {
      $(".desc").hide();
      setLastDescId(undefined);
    } else {
      $(".desc").hide();
      $("#desc" + descId).show();
      setLastDescId(cardId);
    }

  });
}

// $(document).ready(function() {
//   jenisSawah = $('#jejakHalaman').text();
//   console.log(jenisSawah);
//   $('dataSawah').load(' #dataSawah > ', {
//     jenisSawah: jenisSawah
//   }, function () { init() });

// });

// function jenisOnLoad() {
//   jenisSawah = $('#jejakHalaman').text();
//   console.log(jenisSawah);
//   $('dataSawah').load(' #dataSawah > ', {
//     jenisSawah: jenisSawah
//   }, function () { init() });
// }


var tambahData = 6;
$("#loadMore").click(function () {
  var cariDaerah = $('#cariDaerah').val();
  var hargaMin = $('#hargaMin').val();
  var hargaMax = $('#hargaMax').val();
  var luasMin = $('#luasMin').val();
  var luasMax = $('#luasMax').val();
  var bekas = $('#bekas').val();
  var tipe = $('#tipe').val();
  var irigasi = $('#irigasi').val();
  var filterSawah = $('#filterSawah').text();

  tambahData = tambahData + 6;
  $("#dataSawah").load(" #dataSawah > ", {
    cariDaerah: cariDaerah,
    tambahData_Baru: tambahData,
    filterSawah: filterSawah,
    hargaMin: hargaMin,
    hargaMax: hargaMax,
    luasMin: luasMin,
    luasMax: luasMax,
    bekas: bekas,
    tipe: tipe,
    irigasi: irigasi
  }, function () { init() });
});

$('#filterSawah').on('click', function () {
  var cariDaerah = $('#cariDaerah').val();
  var hargaMin = $('#hargaMin').val();
  var hargaMax = $('#hargaMax').val();
  var luasMin = $('#luasMin').val();
  var luasMax = $('#luasMax').val();
  var bekas = $('#bekas').val();
  var tipe = $('#tipe').val();
  var irigasi = $('#irigasi').val();
  var filterSawah = $('#filterSawah').text();

  $("#dataSawah").load(" #dataSawah > ", {
    cariDaerah: cariDaerah,
    filterSawah: filterSawah,
    hargaMin: hargaMin,
    hargaMax: hargaMax,
    luasMin: luasMin,
    luasMax: luasMax,
    bekas: bekas,
    tipe: tipe,
    irigasi: irigasi
  }, function () { init() });

});

$('#cariDaerah').on('keyup', function () {
  var cariDaerah = $('#cariDaerah').val();

  $("#dataSawah").load(" #dataSawah > ", {
    cariDaerah: cariDaerah
  }, function () { init() });

});
// $("a.halBeliSewa").on('click', function () {

//   jenisSawah = $(this).attr('id');
//   $('#jejakHalaman').text(jenisSawah);

//   $("#dataSawah").load(" #dataSawah > ", {
//     jenisSawah: jenisSawah
//   }, function () { init() });

// });

// var locate = location.pathname;
// console.log(locate);
