<?php
include "../../includes/header.php";
include "./includes/search.php";
?>

<div class="shop-container">
    <ul class="shop-container-content">
        <li class="shop-list-item">
            <a href="/pages/shop/items/item.php?id=">test</a>
            <?php
            echo '<p>BX$' . abbreviateNumber(100000) . '</p>';
            ?>
            <img src="/images/coin.png">
        </li>
    </ul>
</div>

<?php
include "../../includes/footer.php";
?>
