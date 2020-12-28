// var input = document.getElementById('fotoProfil');
// console.log(input.files);
$("#pesanError").hide();

$("body").on('click', '#updateInfo', function () {
    // console.log(fotoProfil);
    // console.log(fotoProfil.name);
    // const  fotoProfil= document.getElementById("fotoProfil");

    var formData = new FormData();

    var  fotoProfil= $('#fotoProfil')[0].files[0];
    var  username= $('#username').val();
    var  namaDepan= $('#namaDepan').val();
    var  namaBelakang= $('#namaBelakang').val();
    var  nohp= $('#fnohp').val();
    var  wa= $('#fwa').val();
    var  alamat= $('#alamatPengguna').val();
    var  deskripsi= $('#deskripsi').val();
    var  idPengguna= $('#idPengguna').val();
    

    formData.append('foto', fotoProfil);
    formData.append('username', username);
    formData.append('namaDepan', namaDepan);
    formData.append('namaBelakang', namaBelakang);
    formData.append('nohp', nohp);
    formData.append('wa', wa);
    formData.append('alamat', alamat);
    formData.append('deskripsi', deskripsi);
    formData.append('idPengguna', idPengguna);


    $.ajax({
        type: "POST",
        url: "./include/ubahInfo.inc.php",
        data: formData,
        contentType : false,
        processData : false,
        success:function(data) {
            $("#pesanError").hide();
            alert(data); //=== Show Success Message==

        },
        error:function(data){
            // alert(data.responseText); //===Show Error Message====
            $("#pesanError").text(data.responseText); 
            $("#pesanError").show();
        }

    });

});