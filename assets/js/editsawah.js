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