<?php
include "../includes/header.php";
?>

<div class="home-panel">
    <?php
    if (isset($_SESSION["useruid"])) {
        echo "<h2>Welcome, " . $_SESSION["useruid"] . "!</h2>";
        echo '<form action="/includes/inc/setstatus.inc.php" method="POST"><input value="" name="status" type="status" placeholder="What are you up to?" required><button class="btn-medium" name="submit" type="submit">Set</button>
        ';
    }
    ?>
</div>

<?php
if (isset($_SESSION["useruid"])) {
    echo '<div class="friends"><h3>Friends</h3></div>';
} else {
    echo '<div class="guest-introduction"><h3>What is Curreso?</h3><p>Curreso is a fun social website for people of all ages. The website is about collecting cool items, trading them, and selling them!</p>';
}
?>

<div class="inventory">
    <?php

    ?>
</div>

<?php
include "../includes/footer.php";
?>
