<?php
include "../includes/header.php";

if (!isset($_SESSION["userid"])) {
    header("LOCATION: /pages/notauthorized.php");
};
?>

<?php
include "../includes/footer.php"
?>
