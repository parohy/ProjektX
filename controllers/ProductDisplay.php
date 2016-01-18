<?php

/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 11:44
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path . 'API/ImageScaling.php');
include_once ($path.'API/Product.php');

class ProductDisplay
{
    public function displayResults($searchResult, $maxInRow) { // Display results on page

        echo "<div class=\"search-content\">";

        $scaling = new ImageScaling();
        $itemCount = 0;

        foreach($searchResult as $res) {

            

            if($itemCount == 0) {
                echo "<div class=\"row\">";
            }

            $product = new Product($res);
            $size = $scaling->productItemTumbnail($res); // get scaled size of image to fit tumbnail
            $margin = $scaling->productItemTumbnailMargin($size); // calculate margin after scale to center it in thumbnail

            echo "<div class=\"product-item\">";


             echo "
                        <div class=\"product-photo\">
                            <a href=\"?page=productPreview&product=" . $res . "\"><img class=\"thumbnailImage\" src=\"libraries/img/products/" . $res . "/" . $res . "a.jpg\" width=\"" . $size[0] . "\" height=\"" . $size[1] . "\" style=\"margin:" . $margin[1] . "px " . $margin[0] . "px;\" alt=\"product photo\"></a>
                        </div>
                        <div class=\"product-description\">
                            <hr class=\"product-line\">
                            <h3 class=\"product-name\">" . substr($product->name,0,40) . "</h3>
                            <span class=\"price\">€ ".$product->price."</span>
                            <a href=\"controllers/addToCart.php?productid=".$res."&name=".$product->name."&price=".$product->price."\" class=\"addToCart\">Add to Cart</a>
                        </div>
                  </div>
                 ";

            if($itemCount == $maxInRow - 1) {
                echo "</div>";
                $itemCount = -1;
            }

            $itemCount++;
        }
        echo "</div>";
    }
    
    public function displayProduct($id){
    	$out = "";
    	$product = new Product($id);
    	 
    	 
    	$out .= '<div class="product-item">';
    	$out .= '<div class="product-photo"><a href="?page=productPreview&product='.$product->id.'"><img alt="product-photo" src="libraries/img/products/'.$product->id.'/'.$product->id.'a.jpg" class="thumbnailImage"></a></div>';
    	$out .= '<div class="product-description">';
    	$out .= '<hr class="product-line">';
    	$out .= '<h3 class="product-name">'.substr($product->name,0,40).'</h3>';
    	$out .= '<span class="price">'.$product->price.'</span>';
    	$out .= '<a href="controllers/addToCart.php?productid='.$product->id.'&name='.$product->name.'&price='.$product->price.'" class="addToCart">Add to Cart</a>';
    	$out .= '</div></div>';
    	 
    	return $out;
    }
}
?>