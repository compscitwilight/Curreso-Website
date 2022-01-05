<?php
session_start();

use function PHPSTORM_META\type;

function emptyInputSignup($username, $pwd, $pwdRepeat)
{
    $result = null;

    if (empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidUid($username)
{
    $result = null;

    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = null;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    $result = null;

    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function uidExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("LOCATION: /pages/signup.php?error=stmtfailed");
        exit();
    };

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $pwd)
{
    $sql = "INSERT INTO users (usersUid, usersPwd) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("LOCATION: /pages/signup.php?error=stmtfailed");
        exit();
    };

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    exit();
}

function emptyInputLogin($username, $pwd)
{
    $result = null;

    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uex = uidExists($conn, $username);

    if ($uex === false) {
        header("LOCATION: /pages/landing.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uex["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("LOCATION: /pages/landing.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();

        $_SESSION["userid"] = strval($uex["usersId"]);
        $_SESSION["useruid"] = $uex["usersUid"];
        $_SESSION["status"] = $uex["status"];
        $_SESSION["isadmin"] = $uex["isAdmin"];
        $_SESSION["coins"] = $uex["coins"];

        header("LOCATION: /pages/home.php");
        exit();
    }
}

function setStatus($conn, $status)
{
    // UPDATE USERS SET STATUS is STATUS WHERE USERSI is STATUS ID //
    $sql = 'UPDATE `users` SET `status` = "' . $status . '" WHERE `usersId` = ' . $_SESSION["userid"] . ";";
    mysqli_query($conn, $sql);

    $getSql = "SELECT `status` FROM `users` WHERE `usersId` = " . $_SESSION["userid"] . ";";
    $_SESSION["status"] = mysqli_query($conn, $getSql);
    header("LOCATION: /pages/home.php");

    exit();
}

function postAboutMe($conn, $aboutMe)
{
    $sql = 'UPDATE `users` SET `aboutMe` = "' . $aboutMe . '" WHERE `usersId` = ' . $_SESSION["userid"] . ";";
    mysqli_query($conn, $sql);

    header("LOCATION: /pages/users/profile.php?id=" . $_SESSION["userid"]);

    exit();
}

function hasSufficientCoins($conn, $id)
{
    $returnResult = null;

    $sql = "SELECT * FROM `users` WHERE `usersId` = " . $_SESSION["userid"] . ";";
    $result = mysqli_query($conn, $sql);
    $pcall = mysqli_num_rows($result);

    $itemSql = "SELECT * FROM `items` WHERE `itemsId` = " . $id . ";";
    $itemResult = mysqli_query($conn, $itemSql);
    $itempcall = mysqli_num_rows($itemResult);

    if ($pcall > 0 and $itempcall > 0) {
        while ($itemRow = mysqli_fetch_assoc($itemResult)) {

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["coins"] >= $itemRow["itemsPrice"]) {
                    $returnResult = true;
                } else {
                    $returnResult = false;
                }
            }
        }
    };

    return $returnResult;
}

function purchaseItem($conn)
{
}
