<?php
include '../includes/header.php';

if (isset($_SESSION["userid"])) {
    header("LOCATION: /pages/notauthorized.php");
}
?>

<div class="login-panel">
    <form action="/includes/inc/login.inc.php" method="post" id="login-form">
        <h3>Login</h3>
        <input name="username" id="login-username" type="username" placeholder="Username" required>
        <input name="password" id="login-password" type="password" placeholder="Password" required>
        <button name="submit" class="btn btn-medium" id="login-btn" type="submit">Login</button>

        <a href="/pages/signup.php">
            <p>Don't have a Bloxiso account? Register here.</p>
        </a>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields.</p>";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect username or password.</p>";
            }
        }
        ?>
    </form>
</div>

<?php
include '../includes/footer.php'
?>
