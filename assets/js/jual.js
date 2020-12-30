$("body").on('click', '.hapusSawah', function () {
    if (!confirm("hapus sawah?")) {
        return false;
    } else {
        var formData = new FormData();

        var idsawah = $(this).attr("data-idS");

        formData.append('id_sawah', idsawah);

        $.ajax({
            type: "POST",
            url: "./include/hapusSawah.inc.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#galeriJual').load(' #galeriJual > ');
                alert(data); //=== Show Success Message==

            },
            error: function (data) {
                alert(data.responseText); //===Show Error Message====
                // alert(data); //=== Show Success Message==

            }

        });
    }


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