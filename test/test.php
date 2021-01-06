<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="../vendor/jquery/jquery-3.5.1.min.js"></script> -->
    <script src="./script.js"></script>
    <title>Document</title>
</head>
<body>

    <!-- <form action="" method="post">
        <input type="text" name="city" list="cityname" autocomplete="off">
            <datalist id="cityname">
                <option value="123">pilih ini</option>
                <option value="Boston">
                <option value="Cambridge">
            </datalist>
        <input type="submit" value="kirim" name="submit">
    </form> -->

    <?php
        // if (isset($_POST['submit'])) {
        //     echo $_POST['city'];
        // }
        
        $dummy = array(
            (object) array(
                'nama' => 'nama 1',
                'alamat' => 'alamat 1'
            ),
            (object) array(
                'nama' => 'nama 2',
                'alamat' => 'alamat 2'
            )
        );
        echo "<pre>";
        print_r($dummy);
        echo "</pre>";
        foreach ($dummy as $key => $value) {
            include 'showData.php';  
        }
    ?>
</body>
</html>