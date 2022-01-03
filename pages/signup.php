<?php
include '../includes/header.php';

if (isset($_SESSION["userid"])) {
    header("LOCATION: /pages/notauthorized.php");
}
?>

<div class="login-panel">
    <form action="/includes/inc/signup.inc.php" method="post" id="login-form">
        <h3>Sign up</h3>
        <input name="username" id="login-username" type="username" placeholder="Username" required>
        <input name="password" id="login-password" type="password" placeholder="Password" required>
        <input name="rpt-password" id="login-rpt-password" type="password" placeholder="Repeat Password" required>
        <button name="submit" class="btn btn-medium" id="login-btn" type="submit">Sign up</button>

        <a href="/pages/landing.php">
            <p>Have a Bloxiso account? Log in here</p>
        </a>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields.</p>";
            } else if ($_GET["error"] == "invalidusername") {
                echo "<p>Invalid username.</p>";
            } else if ($_GET["error"] == "pdm") {
                echo "<p>Passwords do not match.</p>";
            } else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong. Please try again.</p>";
            } else if ($_GET["error"] == "usernametaken") {
                echo "<p>Username taken.</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p>Successfully registered.</p>";
            }
        }
        ?>
    </form>
</div>

<?php
include '../includes/footer.php'
?>
