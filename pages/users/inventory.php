<?php
require_once "../../includes/inc/dbh.inc.php";
include "../../includes/header.php";

if (isset($_GET["id"])) {
    if ($_GET["id"] == "" || !$_GET["id"]) {
        header("LOCATION: /pages/users/inventory.php?id=" . $_SESSION["userid"]);
    }
} else {
    header("LOCATION: /pages/users/inventory.php?id=" . $_SESSION["userid"]);
}
?>

<div class="inventory-container">

</div>

<?php
include "../../includes/footer.php";
echo '<script src="/js/global/profile.js"></script>';
?>
