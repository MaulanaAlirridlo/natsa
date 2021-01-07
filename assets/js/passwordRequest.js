$("#pesanError").hide();
$("#pesanTunggu").hide();

$("body").on('click', '#mintaResetPassword', function () {
    var email = $('#email').val();
    // var password = $('#password').val();

    alert(email);

    $.ajax({
        method: "POST",
        url: "./include/requestResetPassword.inc.php",
        data: {email : email},
        beforeSend: function() {
            $("#pesanTunggu").show();
        },
        success:function(data) {
            // $("#pesanTunggu").hide();
            $("#pesanTunggu").text(data);
            alert(data); //=== Show Success Message==
            // window.location.href = "index.php";
        },
        error:function(data){
            // alert(data.responseText); //===Show Error Message====
            $("#pesanError").text(data.responseText); 
            $("#pesanError").show();
        }
    });

});