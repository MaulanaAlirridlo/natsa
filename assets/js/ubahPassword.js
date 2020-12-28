
$("#pesanError").hide();

$("body").on('click', '#gantiPassword', function () {

    var formData = new FormData();

    var  passLama= $('#passwordLama').val();
    var  passBaru= $('#passwordBaru').val();

    // alert(passLama+passBaru);

    formData.append('passwordLama', passLama);
    formData.append('passwordBaru', passBaru);

    $.ajax({
        type: "POST",
        url: "./include/ubahPassword.inc.php",
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