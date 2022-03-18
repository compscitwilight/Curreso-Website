<?php

$serverName = "YOUR_DATABASE_NAME";
$dbUsername = "YOUR_DATABASE_USERNAME";
$dbPassword = "";
$dbName = "YOUR_DATABASE_NAME";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
