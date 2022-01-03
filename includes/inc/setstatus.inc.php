<?php

if (isset($_POST["submit"])) {
    $status = $_POST["status"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    setStatus($conn, $status);
}
