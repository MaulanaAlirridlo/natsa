<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input name="upload[]" type="file" multiple="multiple" />
        <input type="submit" value="kirim" name="submit">
    </form>
    <?php
if (isset($_POST['submit'])) {
    $total = count($_FILES['upload']['name']);

    // Loop through each file
    for ($i = 0; $i < $total; $i++) {

        //Get the temp file path
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        //Make sure we have a file path
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = "./uploadFiles/" . $_FILES['upload']['name'][$i];

            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {

                echo "berhasil ".($i+1);

            }
        }
    }
}

?>
</body>
</html>