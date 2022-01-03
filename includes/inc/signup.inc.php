<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["rpt-password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($username, $pwd, $pwdRepeat) !== false) {
        header("LOCATION: /pages/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("LOCATION: /pages/signup.php?error=invalidusername");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("LOCATION: /pages/signup.php?error=pdm");
        exit();
    }

    if (uidExists($conn, $username) !== false) {
        header("LOCATION: /pages/signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $pwd);
} else {
    header("LOCATION: /pages/signup.php");
    exit();
}
