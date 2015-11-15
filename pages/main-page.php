<link rel="stylesheet" type="text/css" href="css/main-page-style.css">
<?php
    $handler = new DBHandler();
?>
<div class="slider-container">
    <?php
    include "slider.php";
    ?>
</div>

<div class="product-tabs">
    <ul id="tabs">
        <li>
            <input type="radio" name="tabs" id="tab1" checked />
            <label for="tab1">Best selling</label>
            <div id="tab-content1" class="tab-content">
                <?php
                    $handler->query("SELECT * FROM products");
                    $result = $handler->resultSet();
                    for($i = 0; $i < 4; $i++) {
                        echo "<section class='product-item'>";
                        echo "<article>";
                        echo "<header class='product-header'>";
                        echo "<span class='product-name'><a href=\"?page=productPreview&product=" . $result[$i]['productid'] . "\">" . $result[$i]['name'] . "</a><span class='product-name'>";
                        echo "</header>";
                        echo "<div class='product-image'>";
                        echo "<img src='../ProjektX/" . $result[$i]["imagepath"] . "'>";
                        echo "</div>";
                        echo "<div class='product-description'>";
                        echo substr($result[$i]['description'],0,40) . "...";
                        echo "</div>";
                        echo "<footer class='product-footer'>";
                        echo "<div class='price'>" . $result[$i]['price'] . " EUR</div>";
                        echo "<a href=\"?page=productPreview&product=" . $result[$i]['productid'] . "\" class='product-more'>Viac</a>";
                        echo "</footer>";
                        echo "</article>";
                        echo "</section>";
                    }
                ?>
            </div>
        </li>

        <li>
            <input type="radio" name="tabs" id="tab2"  />
            <label for="tab2">Top rated</label>
            <div id="tab-content2" class="tab-content">
                <?php
                $handler->query("SELECT * FROM products");
                $result = $handler->resultSet();
                for($i = 4; $i < 8; $i++) {
                    echo "<section class='product-item'>";
                    echo "<article>";
                    echo "<header class='product-header'>";
                    echo "<span class='product-name'><a href='?page=productPreview'>" . $result[$i]['name'] . "</a><span class='product-name'>";
                    echo "</header>";
                    echo "<div class='product-image'>";
                    echo "<img src='../ProjektX/" . $result[$i]["imagepath"] . "'>";
                    echo "</div>";
                    echo "<div class='product-description'>";
                    echo substr($result[$i]['description'],0,40) . "...";
                    echo "</div>";
                    echo "<footer class='product-footer'>";
                    echo "<div class='price'>" . $result[$i]['price'] . " EUR</div>";
                    echo "<a href=\"?page=productPreview&product=" . $result[$i]['productid'] . "\" class='product-more'>Viac</a>";
                    echo "</footer>";
                    echo "</article>";
                    echo "</section>";
                }
                ?>
            </div>
        </li>


        <li>
            <input type="radio" name="tabs" id="tab3" />
            <label for="tab3">	New products</label>
            <div id="tab-content3" class="tab-content">
                <p>cccccccccccccccc</p>
            </div>
        </li>
    </ul>
</div>