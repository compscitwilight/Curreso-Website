<?php
include "../../includes/header.php";
include "./includes/search.php";

include "../../includes/inc/dbh.inc.php";
?>

<div class="shop-container">
    <ul class="shop-container-content">
        <?php
        $sql = "SELECT * FROM `items`";
        $qry = mysqli_query($conn, $sql);

        while ($result = mysqli_fetch_array($qry)) {
            if ($result["onSale"] == 1) {
                echo '<li class="shop-list-item"><a href="/pages/shop/items/item.php?id=' . $result["itemsId"] . '">' . $result["itemsName"] . '</a><p>BX$' . abbreviateNumber($result["itemsPrice"]) . '</p><img src="/images/coin.png"</li>';
            }
        }
        ?>
    </ul>
</div>

<?php
include "../../includes/footer.php";
?>
