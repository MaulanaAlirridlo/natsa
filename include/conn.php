<?php

    $host = "localhost";
    $user = "root";
    // $user = "id15400814_natsaadmin";
    $pass = "";
    // $pass = "OnY*/*o_UwbAS/d9";
    $db = "natsa";
    // $db = "id15400814_natsa";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }else{
        // echo "connection ready";
    }


?>