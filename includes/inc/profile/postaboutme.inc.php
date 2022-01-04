<?php

if (isset($_POST["submit"])) {
    $aboutMe = $_POST["about-me"];

    require_once "../dbh.inc.php";
    require_once "../functions.inc.php";

    postAboutMe($conn, $aboutMe);
}
