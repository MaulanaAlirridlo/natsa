$("#pesanError").hide();

$("body").on('click', '#tambahSawah', function () {

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
    maps = maps.split(" ").join("+");
    var fotoSawah = $('#fotoSawah')[0];

    //cek apakah foto 0 atau lebih dari 3
    if (fotoSawah.files.length > 3 || fotoSawah.files.length <= 0) {
        $("#pesanError").text("foto yang anda masukkan tidak boleh lebih dari 3 foto");
        $("#pesanError").show();
        return false;
    }

    // console.table(fotoSawah.files);
    for(const file of fotoSawah.files){
        formData.append('fotoSawah[]', file);
    }
    formData.append('idPengguna', idPengguna);
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
        url: "./include/tambahSawah.inc.php",
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