<?php
include "../includes/header.php";

if (!isset($_SESSION["userid"])) {
    header("LOCATION: /pages/notauthorized.php");
} else {
    if ($_SESSION["isadmin"] == 0) {
        header("LOCATION: /pages/notauthorized.php");
    }
}
?>

<div class="admin-panel">

</div>

<?php
include "../includes/footer.php";
?>
