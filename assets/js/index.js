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
  $(".desc-harga").text(harga);
  $(".desc-alamat").text(alamat);
  if (lastCardId === cardId) {
    $(".desc").hide();
    setLastDescId(undefined);
  } else {
    $(".desc").hide();
    $("#desc" + descId).show();
    setLastDescId(cardId);
  }
});
