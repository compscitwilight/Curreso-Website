<?php
include "../includes/header.php"
?>

<div class="not-authorized">
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "404") {
            echo '<p>404: Page not found.</p>';
        }
    } else {
        header("LOCATION: /pages/notauthorized.php");
    }
    ?>
</div>

<?php
include "../includes/footer.php"
?>
