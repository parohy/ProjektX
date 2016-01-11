<?php

/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 11:44
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include ($path . 'API/ImageScaling.php');

class ProductDisplay
{
    public function displayResults($searchResult) { // Display results on page

        echo "<div class=\"search-content\">";

        $scaling = new ImageScaling();
        $itemCount = 0;

        foreach($searchResult as $res) {

            $itemCount++;

            if($itemCount == 1) {
                echo "<div class=\"row\">";
            }

            $size = $scaling->productItemTumbnail($res['productid']); // get scaled size of image to fit tumbnail
            $margin = $scaling->productItemTumbnailMargin($size); // calculate margin after scale to center it in thumbnail

            echo "<div class=\"product-item\">";


             echo "
                        <div class=\"product-photo\">
                            <a href=\"?page=productPreview&product=" . $res['productid'] . "\"><img src=\"libraries/img/products/" . $res['productid'] . "/" . $res['productid'] . "a.jpg\" width=\"" . $size[0] . "\" height=\"" . $size[1] . "\" style=\"margin:" . $margin[1] . "px " . $margin[0] . "px;\" alt=\"product photo\"></a>
                        </div>
                        <div class=\"product-description\">
                            <hr class=\"product-line\">
                            <h3 class=\"product-name\">" . substr($res['name'],0,21) . "</h3>
                            <span class=\"price\">€ ".$res['price']."</span>
                            <a href=\"controllers/addToCart.php?productid=".$res['productid']."&name=".$res['name']."&price=".$res['price']."\" class=\"addToCart\">Add to Cart</a>
                        </div>
                  </div>
                 ";

            if($itemCount == 4) {
                echo "</div>";
                $itemCount = 0;
            }
        }
        echo "</div>";
    }

}