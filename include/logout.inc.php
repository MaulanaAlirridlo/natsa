<?php
session_start();
// session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION["id_pengguna"]);
session_destroy();
?>
<script>
    alert("anda logout");
    window.location.href = "../index.php";

</script>
<?php
// header("Location: index.php");