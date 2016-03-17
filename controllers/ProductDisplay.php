<?php

/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 8. 12. 2015
 * Time: 11:44
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path . 'API/ImageScaling.php');
include_once ($path.'API/Product.php');

class ProductDisplay
{
    public function displayResults($searchResult, $maxInRow, $brands, $sortChosen, $brandsChosen) { // Display results on page
        echo "
            <div class=\"filters\">
                <div class=\"pricefilter\">Price:
                    <div id=\"noUiSlider\" style=\"display: inline-block; margin-left: 20px\"></div>
                    <div class=\"pricelimits\">
                        <div id=\"pricehand1\">0</div>
                        <div id=\"pricehand2\">0</div>
                    </div>
                </div>
                <div class=\"sortby\">Sort by: </div>";
            $this->printSortSelect($sortChosen);
        echo    "<div class=\"brands\">Brands: </div>
            ";
            $this->productBrands($brands, $brandsChosen);
        echo "</div>";

        echo "<div class=\"search-content\">";

        $scaling = new ImageScaling();
        $itemCount = 0;

        $date = new DateTime();
        $timeStamp = $date->getTimestamp();

        if(count($searchResult) === 0){

            echo '<div class="categoryMessage">No products matching criteria.</div>';

        } else {

            foreach($searchResult as $res) {

                $product = new Product($res);
                if($product->deleted === false){
                    if($itemCount == 0) {
                        echo "<div class=\"row\">";
                    }
                    $size = $scaling->productItemTumbnail($res); // get scaled size of image to fit tumbnail
                    $margin = $scaling->productItemTumbnailMargin($size); // calculate margin after scale to center it in thumbnail

                    echo "<div class=\"product-item\">";


                    echo "
                            <div class=\"product-photo\">
                                <img class=\"loader\" src=\"libraries/img/loader.gif\" alt=\"loading...\">
                                <a href=\"?page=productPreview&product=" . $res . "\"><img class=\"thumbnailImage notLoaded\" src=\"libraries/img/products/" . $res . "/" . $res . "a.jpg?".$timeStamp."\" alt=\"product photo\"></a>
                            </div>
                            <div class=\"product-description\">
                                <hr class=\"product-line\">
                                <h3 class=\"product-name\">" . substr($product->name,0,40) . "</h3>
                                <span class=\"price\">".$product->price."<i class=\"fa fa-eur\"></i></span>";
                    echo $this->productButtons($res,$product->name,$product->price);//<a href=\"controllers/addToCart.php?productid=".$res."&name=".$product->name."&price=".$product->price."\" class=\"addToCart\">Add to Cart</a>
                    echo     "</div>
                      </div>
                     ";

                    if($itemCount == $maxInRow - 1) {
                        echo "</div>";
                        $itemCount = -1;
                    }

                    $itemCount++;
                }

            }
        }

        echo "</div>";
        echo "<script>
                $(window).ready(function()
                {
                    adjustThumbnail();
                });
            </script>";
    }

    public function displayProduct($id){
        $date = new DateTime();
        $timeStamp = $date->getTimestamp();

    	$out = "";
    	$product = new Product($id);
        if($product->deleted === false){
            $out .= '<div class="product-item">';
            $out .= '<div class="product-photo"><img class="loader" src="libraries/img/loader.gif" alt="loading..."><a href="?page=productPreview&product='.$product->id.'"><img alt="product-photo" src="libraries/img/products/'.$product->id.'/'.$product->id.'a.jpg?'.$timeStamp.'" class="thumbnailImage notLoaded"></a></div>';
            $out .= '<div class="product-description">';
            $out .= '<hr class="product-line">';
            $out .= '<h3 class="product-name">'.substr($product->name,0,40).'</h3>';
            $out .= '<span class="price">'.$product->price.'<i class="fa fa-eur"></i></span>';
            $out .= $this->productButtons($product->id,$product->name,$product->price);
            //$out .= '<a href="controllers/addToCart.php?productid='.$product->id.'&name='.$product->name.'&price='.$product->price.'" class="addToCart">Add to Cart</a>';
            $out .= '</div></div>';
        }

    	return $out;
    }

    private function productButtons($id, $name, $price){
    	$out = "";
    	/*if((isset($_SESSION['userrole']) && $_SESSION['userrole'] != "2") || !isset($_SESSION['username'])){
    		$out = "<a href='controllers/addToCart.php?productid=".$id."&name=".$name."&price=".$price."' class='addToCart'>Add to Cart</a>";
    	}
    	else if(isset($_SESSION['username']) && $_SESSION['username'] == "admin"){
 			$out = '<div class="admin-buttons"><a href="?page=private/pageSettings&settings=addProduct&productid='.$id.'"><i class="fa fa-pencil-square-o fa-2x"></i></a> <a href="?page=private/editProduct/deleteProduct&productid='.$id.'"><i class="fa fa-times fa-2x"></i></a></div>';
    	}*/

        if(!isset($_SESSION['userid']) || !isset($_SESSION['loggedin']) || (isset($_SESSION['userrole']) && $_SESSION['userrole'] != 2)){
            $out = "<a href='controllers/addToCart.php?productid=".$id."&name=".$name."&price=".$price."' class='addToCart'>Add to Cart</a>";
        }
        else if(isset($_SESSION['userrole']) && $_SESSION['userrole'] == 2){
            $out = '<div class="admin-buttons"><a href="?page=private/pageSettings&settings=addProduct&productid='.$id.'"><i class="fa fa-pencil-square-o fa-2x"></i></a> <a href="?page=private/editProduct/deleteProduct&productid='.$id.'"><i class="fa fa-times fa-2x"></i></a></div>';

        }

    	return $out;
    }

    private function productBrands($brands, $brandsChosen){
        $brandAmount = count($brands, 0);
        $brandsChosenAmount = ($brandsChosen === null) ? 0 : count($brandsChosen, 0);
        $brandsChosenCounter = 0;

        if($brandAmount <= 3){
            echo "<div class=\"BrandChoices\">";
            for($i = 0; $i < $brandAmount; $i++){
                $isChecked = false;
                for($j = $brandsChosenCounter; $j < $brandsChosenAmount; $j++){
                    if($brands[$i]['brandid'] === $brandsChosen[$j]){
                        $isChecked = true;
                    }
                }
                $this->printBrandSelect($brands[$i]['brandid'], $brands[$i]['name'], $isChecked);
            }
            echo "
                </div>
                <div class=\"ApplyBrandChoice\" onclick=\"filterSearch()\">Filter</div>
                ";
        }
        else {
            echo "<div class=\"BrandChoices\">";
            for($i = 0; $i < 3; $i++){
                $isChecked = false;
                for($j = $brandsChosenCounter; $j < $brandsChosenAmount; $j++){
                    if($brands[$i]['brandid'] === $brandsChosen[$j]){
                        $isChecked = true;
                    }
                }
                $this->printBrandSelect($brands[$i]['brandid'], $brands[$i]['name'], $isChecked);
            }
            echo "
                    <div class=\"MoreBrands\">
                        +More
                    </div>
                </div>
                <div class=\"ApplyBrandChoice\" onclick=\"filterSearch()\">Filter</div>
                ";
            echo "
                <div class=\"AddBrandsWindow\">
                    <div class=\"AddBrandsWindowHeader\">
                        <div class=\"AddBrandsWindowClose\">Close</div>
                    </div>
                    <div class=\"AddBrandsWindowBody\">";
                        for($i = 3; $i < $brandAmount; $i++){
                            $isChecked = false;
                            for($j = $brandsChosenCounter; $j < $brandsChosenAmount; $j++){
                                if($brands[$i]['brandid'] === $brandsChosen[$j]){
                                    $isChecked = true;
                                }
                            }
                            $this->printBrandSelect($brands[$i]['brandid'], $brands[$i]['name'], $isChecked);
                        }
            echo "
                    </div>
                </div>
                ";
        }
    }

    private function printSortSelect($sortChosen){
        echo"
            <div class=\"styled-select\">
                <select id=\"sorting\">
                    <option value=\"0\"".$this->echoSelected(0, $sortChosen).">Most popular</option>
                    <option value=\"4\"".$this->echoSelected(4, $sortChosen).">Price: High to Low</option>
                    <option value=\"3\"".$this->echoSelected(3, $sortChosen).">Price: Low to High</option>
                    <option value=\"5\"".$this->echoSelected(5, $sortChosen).">A-Z</option>
                    <option value=\"6\"".$this->echoSelected(6, $sortChosen).">Z-A</option>
                </select>
            </div>
            ";
    }

    private function echoSelected($currentSort, $sortChosen){
        if($currentSort == $sortChosen) {
            return "selected=\"selected\"";
        } else {
            return "";
        }
    }

    private function printBrandSelect($brandId, $brandName, $isChecked){
        echo "
                <div class=\"BrandSelect\">
                    <input type=\"checkbox\" name=\"brand\" value=\"".$brandId."\"".($isChecked ? " checked" : "").">
                    <div class=\"BrandName\">".$brandName."</div>
                </div>
                ";
    }
}
