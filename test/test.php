<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="./script.js"></script>
    <title>Document</title>
</head>
<body>

    <form method="post" id="formCari"" onsubmit="CariDaerah(); return false;">
        <input type="text" name="cari" id="cari" placeholder="cari...">
    </form>
    <br>
    <form method="post" id="formFilter"" onsubmit="FilterDaerah(); return false;">
        <input type="text" name="filter" id="filter" placeholder="filter...">
    </form>

    <br>

    <div id="results">
        <?php include "./data.php"?>
    </div>

</body>
</html>