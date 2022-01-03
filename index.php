<?php
session_start();

if ($_SESSION["userid"]) {
    header("LOCATION: /pages/home.php");
} else {
    header("LOCATION: /pages/signup.php");
}

/*
session_start();
echo "1" . $_SESSION["userid"] . " ";
echo "2" . $_SESSION["useruid"] . " ";
echo "3" . $_SESSION["status"] . " ";
echo "4" . $_SESSION["isadmin"] . " ";
echo "5" . $_SESSION["coins"] . " ";
*/