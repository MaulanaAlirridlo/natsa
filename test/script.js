function CariDaerah() {
    var cari = $("#cari").val();
    $.post("data.php", {cariDaerah : cari, lakukanCari : true},
    function(data) {
        $('#results').html(data);
        $('#formCari')[0].reset();
    });
}

function FilterDaerah() {
    var filter = $("#filter").val();
    $.post("data.php", {filterDaerah : filter, lakukanFilter :true},
    function(data) {
        $('#results').html(data);
        $('#formFilter')[0].reset();
    });
}