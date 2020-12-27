$("#pesanError").hide();

$("body").on('click', '#buttonLogin', function () {
    var email = $('#email').val();
    var password = $('#password').val();
    $.ajax({
        method: "POST",
        url: "./include/login.inc.php",
        data: {email : email,password : password},
        success:function(data) {
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























// window.onload = function() {
//     if (window.jQuery) {  
//         // jQuery is loaded  
//         alert("Yeah!");
//     } else {
//         // jQuery is not loaded
//         alert("Doesn't Work");
//     }
// }