let lastCardId;

function setLastDescId(id) {
  lastCardId = id;
}

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
  let jumlahPanen = $(this).data("jumlahPanen");
  let deskripsi = $(this).data("deskripsi");
  let jenis = $(this).data("jenis");

  $('#img'+descId+'1').attr('src',img1);
  $('#img'+descId+'2').attr('src',img2);
  $('#img'+descId+'3').attr('src',img3);
  $('#indicator'+descId+'1').css('background-image', 'url(' + img1 + ')');
  $('#indicator'+descId+'2').css('background-image', 'url(' + img2 + ')');
  $('#indicator'+descId+'3').css('background-image', 'url(' + img3 + ')');
  $(".desc-harga").text(harga);
  $(".desc-alamat").text(alamat);
  $(".desc-luas").text(luas);
  $(".desc-jumlahPanen").text(jumlahPanen);
  $(".desc-desk").text(deskripsi);
  $(".desc-jenis").text(jenis);
  $('#link'+descId).attr('href','./fulldesc.php?id='+id);

  if (lastCardId === cardId) {
    $(".desc").hide();
    setLastDescId(undefined);
  } else {
    $(".desc").hide();
    $("#desc" + descId).show();
    setLastDescId(cardId);
  }

});