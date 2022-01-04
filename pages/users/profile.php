<?php
require_once "../../includes/inc/dbh.inc.php";
include "../../includes/header.php";

if (isset($_GET["id"])) {
    if ($_GET["id"] == "" || !$_GET["id"]) {
        header("LOCATION: /pages/users/profile.php?id=" . $_SESSION["userid"]);
    }
}
?>

<div class="profile-head">
    <?php

    $sql = "SELECT * FROM users WHERE usersId =" . $_GET["id"] . ";";
    $result = mysqli_query($conn, $sql);
    $pcall = mysqli_num_rows($result);

    if ($pcall > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h3>" . $row["usersUid"] . "</h3>";

            // status
            if ($row["status"] !== "") {
                echo '<p>"' . $row["status"] . '"</p>';
            }

            // admin icon
            if ($row["isAdmin"] == 1) {
                echo '<img class="profile-container-admin" src="/images/profile/admin-logo.jpg">';
            };

            // trade & add friend button
            if ($row["usersId"] !== $_SESSION["userid"]) {
                // create 2 buttonbs, add friend and trade
                echo '<form action="" method="POST"><button class="btn-medium">Trade</button></form>';
                echo '<form action="" method="POST"><button class="btn-medium">Add Friend</button></form>';
            }

            // edit profile button
            if ($row["usersId"] == $_SESSION["userid"]) {
                echo '<form action="" method="POST"><button id="edit-btn" class="btn-medium" name="edit" type="button">Edit Profile</button></form>';
            };

            // join date
            if ($row["usersJoinDate"]) {
                echo '<p>Joined: ' . $row["usersJoinDate"] . '</p>';
            } else {
                echo '<p>(ERROR)</p>';
            }
        }
    } else {
        header("LOCATION: /pages/error.php?error=404");
    }
    ?>
</div>

<div class="profile-container">
    <div class="profile-about-me">
        <p>About me</p>
        <hr>

        <?php
        $aboutMeSQL = "SELECT `aboutMe` FROM `users` WHERE `usersId` = " . $_GET["id"] . ";";
        $aboutMeResult = mysqli_query($conn, $aboutMeSQL);
        $aboutMepcall = mysqli_num_rows($aboutMeResult);

        if ($aboutMepcall > 0) {
            while ($aboutMeRow = mysqli_fetch_assoc($aboutMeResult)) {
                echo '<p id="about-me-text">' . $aboutMeRow["aboutMe"] . "</p>";
            }
        }
        ?>

        <form id="about-me-edit" action="/includes/inc/profile/postaboutme.inc.php" method="POST">
            <?php
            $aboutMeEditSQL = "SELECT `aboutMe` FROM `users` WHERE `usersId` = " . $_GET["id"] . ";";
            $aboutMeEditResult = mysqli_query($conn, $aboutMeEditSQL);
            $aboutMeEditpcall = mysqli_num_rows($aboutMeEditResult);

            if ($aboutMeEditpcall > 0) {
                while ($aboutMeEditRow = mysqli_fetch_assoc($aboutMeEditResult)) {
                    echo '<textarea name="about-me" type="about-me" maxlength="256" placeholder="Tell us about yourself!">' . $aboutMeEditRow["aboutMe"] . '</textarea>';
                }
            }
            ?>
            <br>
            <button name="submit" class="btn-medium" type="submit">Submit</button>
        </form>
    </div>
</div>

<?php
include "../../includes/footer.php";
echo '<script src="/js/global/profile.js"></script>';
?>
