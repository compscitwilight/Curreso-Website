<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputLogin($username, $pwd) !== false) {
        header("LOCATION: /pages/landing.php");
        exit();
    }

    loginUser($conn, $username, $pwd);
} else {
    header("/pages/landing.php");
    exit();
}
