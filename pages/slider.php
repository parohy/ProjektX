<?php
    $handler = new DBHandler();
    $handler->query('SELECT * FROM products');
    $result = $handler->resultSet();
?>

<div id="leftArrow" class="slider-arrows"><</div>
<div id="rightArrow" class="slider-arrows">></div>
<div class="slider">
    <?php
        for($i = 0; $i < 4; $i++) {
            echo "<div class=\"slide\">";
            echo "<div class=\"slide-image\">";
            echo "<img src=\"../ProjektX/" . $result[$i]['imagepath'] . "\">";
            echo "</div>";
            echo "<div class=\"slide-description\">";
            echo "<article>";
            echo "<header>";
            echo "<h3><a href=\"?page=productPreview&product=" . $result[$i]['productid'] . "\">" . $result[$i]['name'] . "</a></h3>";
            echo "</header>";
            echo "<div class=\"slide-product-description\">";
            echo "<p>" . substr($result[$i]['description'],0,300) . "...</p>";
            echo "</div>";
            /*
            echo "<footer class=\"slide-footer\">";
            echo "<h3>".$result[$i]['price']." EUR</h3>";
            echo "<footer>";
            */
            echo "</article>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</div>

<script src="js/sliderScript.js"></script>
