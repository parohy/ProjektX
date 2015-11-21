<link rel="stylesheet" type="text/css" href="css/main-page-style.css">
<?php
    $handler = new DBHandler();
    $handler->beginTransaction();
    $handler->query("SELECT * FROM products WHERE productid BETWEEN :first AND :second");
    $handler->bind(':first',1);
    $handler->bind(':second',8);
    $result = $handler->resultSet();

    $productID = array(8);
    $bindParam = array(8);

    for($i = 0; $i < 8; $i++) {
        $productID[$i] = $result[$i]['productid'];
    }

    for($i = 0; $i < 8; $i++) {
        $bindParam[$i] = ":pr" . $result[$i]['productid'];
    }

    $parameters = join(',',$bindParam);
    $query = "SELECT pic1path FROM images WHERE productid IN(". $parameters .")";
    $handler->query($query);

    for($i = 0; $i < 8; $i++) {
        $handler->bind($bindParam[$i],$productID[$i]);
    }

    $image = $handler->resultSet();
    $handler->endTransaction();
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
                    for($i = 0; $i < 4; $i++) {
                        echo "<section class='product-item'>";
                        echo "<article>";
                        echo "<header class='product-header'>";
                        echo "<span class='product-name'><a href=\"?page=productPreview&product=" . $result[$i]['productid'] . "\">" . $result[$i]['name'] . "</a><span class='product-name'>";
                        echo "</header>";
                        echo "<div class='product-image'>";
                        echo "<img src='..\ProjektX" . $image[$i]['pic1path'] . "'>";
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
                for($i = 4; $i <= 7; $i++) {
                    echo "<section class='product-item'>";
                    echo "<article>";
                    echo "<header class='product-header'>";
                    echo "<span class='product-name'><a href='?page=productPreview'>" . $result[$i]['name'] . "</a><span class='product-name'>";
                    echo "</header>";
                    echo "<div class='product-image'>";
                    echo "<img src='..\ProjektX" . $image[$i]['pic1path'] . "'>";
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
