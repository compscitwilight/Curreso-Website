<?php
session_start();

// Functions //
function abbreviateNumber($num)
{
    if ($num >= 0 && $num < 1000) {
        $format = floor($num);
        $suffix = '';
    } else if ($num >= 1000 && $num < 1000000) {
        $format = floor($num / 1000);
        $suffix = 'K+';
    } else if ($num >= 1000000 && $num < 1000000000) {
        $format = floor($num / 1000000);
        $suffix = 'M+';
    } else if ($num >= 1000000000 && $num < 1000000000000) {
        $format = floor($num / 1000000000);
        $suffix = 'B+';
    } else if ($num >= 1000000000000) {
        $format = floor($num / 1000000000000);
        $suffix = 'T+';
    }

    return !empty($format . $suffix) ? $format . $suffix : 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/main.css" rel="stylesheet">
    <title>Curreso</title>
</head>

<body>
    <div class="announcement-bar">
        <p class="announcement-bar-text"></p>
    </div>

    <div class="nav-bar-top">
        <a href="/pages/home.php"><img></a>
        <form action="" method="POST">
            <input id="search-bar" class="search-bar" name="search" type="search" placeholder="  Search">
            <button class="btn-medium" name="submit" type="submit">Search</button>
        </form>

        <?php
        if (isset($_SESSION["useruid"])) {
            echo '<a class="nav-bar-top-item" href="/pages/currency.php"><img class="currency-img" src="/images/coin.png">' . abbreviateNumber($_SESSION["coins"]) . '</a>';
            echo '<a class="nav-bar-top-item" href="/pages/users/profile.php?id=">' . $_SESSION["useruid"] . '</a>';
            echo '<a class="nav-bar-top-item" href="/includes/inc/logout.inc.php">Log out</a>';
        } else {
            echo '<a class="nav-bar-top-item" href="/pages/landing.php">Log in</a>';
            echo '<a class="nav-bar-top-item" href="/pages/signup.php">Sign up</a>';
        }
        ?>
    </div>

    <div class="nav-bar-main">
        <div class="nav-bar-content">
            <!--<a class="nav-bar-item" href="#"><img src="/images/logo-128px.png"></a>-->
            <label for="nav-bar-content">Browse</label>
            <hr>
            <ul>
                <li><a class="nav-bar-item" href="/pages/home.php">Home</a></li>
                <li><a class="nav-bar-item" href="/pages/shop/home.php">Shop</a></li>
                <li><a class="nav-bar-item" href="/pages/trade.php">Trade</a></li>
                <li><a class="nav-bar-item" href="/pages/create.php">Users</a></li>
                <li><a class="nav-bar-item" href="/pages/forum/forum.php">Forum</a></li>
                <?php
                if (isset($_SESSION["useruid"])) {
                    if ($_SESSION["isadmin"] == 1) {
                        echo '<li><a class="nav-bar-item" href="/pages/adminpanel.php" style="color: red">Admin Panel</a></li>';
                    };
                }
                ?>
            </ul>
        </div>
    </div>
