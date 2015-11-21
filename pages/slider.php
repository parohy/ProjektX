<?php
/**
 * Author: Matus Kacmar
 */

$handler = new DBHandler();

$handler->beginTransaction();
$handler->query('SELECT * FROM products');
$result = $handler->resultSet();

$productID = array(4);
$bindParam = array(4);

for($i = 0; $i < 4; $i++) {
    $productID[$i] = $result[$i]['productid'];
}

for($i = 0; $i < 4; $i++) {
    $bindParam[$i] = ":pr" . $result[$i]['productid'];
}

$parameters = join(',',$bindParam);
$query = "SELECT pic1path FROM images WHERE productid IN(". $parameters .")";

$handler->query($query);

for($i = 0; $i < 4; $i++) {
    $handler->bind($bindParam[$i],$productID[$i]);
}
$images = $handler->resultSet();
$handler->endTransaction();
?>

<div id="leftArrow" class="slider-arrows"><</div>
<div id="rightArrow" class="slider-arrows">></div>
<div class="slider">
    <?php
        /* PRINT SLIDES TO THE PAGE */
        for($i = 0; $i < 4; $i++) {
            echo "<div class=\"slide\">";
            echo "<div class=\"slide-image\">";
            echo "<img src=\"../ProjektX" . $images[$i]['pic1path'] . "\">";
            echo "</div>";
            echo "<div class=\"slide-description\">";
            echo "<article>";
            echo "<header>";
            echo "<h3><a href=\"?page=productPreview&product=" . $result[$i]['productid'] . "\">" . $result[$i]['name'] . "</a></h3>";
            echo "</header>";
            echo "<div class=\"slide-product-description\">";
            echo "<p>" . substr($result[$i]['description'],0,300) . "...</p>";
            echo "</div>";
            echo "</article>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</div>

<script src="js/sliderScript.js"></script>
