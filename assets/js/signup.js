$("#pesanError").hide();
$("#pesanTunggu").hide();

$("body").on('click', '#btnSignup', function () {
    var email = $('#email').val();
    var password = $('#password').val();

    // alert(email + password);

    $.ajax({
        method: "POST",
        url: "./include/signup.inc.php",
        data: {email : email,password : password},
        beforeSend: function() {
            $("#pesanTunggu").show();
        },
        success:function(data) {
            $("#pesanTunggu").hide();
            alert(data); //=== Show Success Message==
            window.location.href = "index.php";
        },
        error:function(data){
            // alert(data.responseText); //===Show Error Message====
            $("#pesanError").text(data.responseText); 
            $("#pesanError").show();
        }
    });

});