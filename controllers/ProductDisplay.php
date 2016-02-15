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
?>



<?php


class ProductDisplay
{
    public function displayResults($searchResult, $maxInRow, $brands) { // Display results on page
        echo "
            <div class=\"filters\">
                <div class=\"pricefilter\">Price:
                    <div id=\"noUiSlider\" style=\"display: inline-block; margin-left: 20px\"></div>
                    <div class=\"pricelimits\">
                        <div id=\"pricehand1\">0</div>
                        <div id=\"pricehand2\">0</div>
                    </div>
                </div>
                <div class=\"sortby\">Sort by: </div>
                <div class=\"styled-select\">
                    <select id=\"sorting\">
                        <option value=\"0\">Most popular</option>
                        <option value=\"4\">Price: High to Low</option>
                        <option value=\"3\">Price: Low to High</option>   
                        <option value=\"5\">A-Z</option>
                        <option value=\"6\">Z-A</option>                                           
                    </select>
                </div>
                <div class=\"brands\">Brands: </div>
                <div class=\"BrandChoices\">
                    <div class=\"BrandSelect\">
                        <input type=\"checkbox\" name=\"brand\" value=\"10\">
                        <div class=\"BrandName\">Asus</div>
                    </div>
                    <div class=\"BrandSelect\">
                        <input type=\"checkbox\" name=\"brand\" value=\"12\">
                        <div class=\"BrandName\">Lenovo</div>
                    </div>
                    <div class=\"BrandSelect\">
                        <input type=\"checkbox\" name=\"brand\" value=\"14\">
                        <div class=\"BrandName\">HP</div>
                    </div>
                    <div class=\"MoreBrands\">
                        +More
                    </div>                    
                </div>
                <div class=\"ApplyBrandChoice\" onclick=\"filterSearch()\">Filter</div>
                <div class=\"AddBrandsWindow\">
                    <div class=\"AddBrandsWindowHeader\">
                        <div class=\"AddBrandsWindowClose\">Close</div>
                    </div>
                    <div class=\"AddBrandsWindowBody\">
                        <div class=\"BrandSelect\">
                            <input type=\"checkbox\" name=\"brand\" value=\"1\">
                            <div class=\"BrandName\">Sony</div>
                        </div>
                        <div class=\"BrandSelect\">
                            <input type=\"checkbox\" name=\"brand\" value=\"15\">
                            <div class=\"BrandName\">Samsung</div>
                        </div>
                        <div class=\"BrandSelect\">
                            <input type=\"checkbox\" name=\"brand\" value=\"16\">
                            <div class=\"BrandName\">LG</div>
                        </div>
                    </div>
                </div>             
            </div>
        ";
        
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
                            <img class=\"loader\" src=\"libraries/img/loader.gif\" alt=\"loading...\">
                            <a href=\"?page=productPreview&product=" . $res . "\"><img class=\"thumbnailImage notLoaded\" src=\"libraries/img/products/" . $res . "/" . $res . "a.jpg\" alt=\"product photo\"></a>
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
        echo "</div>";
    }
    
    public function displayProduct($id){
    	$out = "";
    	$product = new Product($id);
    	 
    	 
    	$out .= '<div class="product-item">';
    	$out .= '<div class="product-photo"><img class="loader" src="libraries/img/loader.gif" alt="loading..."><a href="?page=productPreview&product='.$product->id.'"><img alt="product-photo" src="libraries/img/products/'.$product->id.'/'.$product->id.'a.jpg" class="thumbnailImage notLoaded"></a></div>';
    	$out .= '<div class="product-description">';
    	$out .= '<hr class="product-line">';
    	$out .= '<h3 class="product-name">'.substr($product->name,0,40).'</h3>';
    	$out .= '<span class="price">'.$product->price.'<i class="fa fa-eur"></i></span>';
    	$out .= $this->productButtons($product->id,$product->name,$product->price);
    	//$out .= '<a href="controllers/addToCart.php?productid='.$product->id.'&name='.$product->name.'&price='.$product->price.'" class="addToCart">Add to Cart</a>';
    	$out .= '</div></div>';
    	 
    	return $out;
    }
    
    private function productButtons($id, $name, $price){
    	$out = "";
    	if((isset($_SESSION['userrole']) && $_SESSION['userrole'] != "2") || !isset($_SESSION['username'])){
    		$out = "<a href='controllers/addToCart.php?productid=".$id."&name=".$name."&price=".$price."' class='addToCart'>Add to Cart</a>";
    	}
    	else if(isset($_SESSION['username']) && $_SESSION['username'] == "admin"){
 			$out = '<div class="admin-buttons"><a href="?page=private/pageSettings&settings=addProduct&productid='.$id.'"><i class="fa fa-pencil-square-o fa-2x"></i></a> <a href="?page=private/editProduct/deleteProduct&productid='.$id.'"><i class="fa fa-times fa-2x"></i></a></div>';
    	}
    	 
    	return $out;
    }

    private function productBrands($brands){
        $brandAmount = count($brands, 0);

        if($brandAmount <= 3){
            echo "<div class=\"BrandChoices\">";
            for($i = 0; $i < $brandAmount; $i++){
                $this->printBrandSelect($brands[$i][0], $brands[$i][1]);
            }             
            echo "
                </div>
                <div class=\"ApplyBrandChoice\" onclick=\"filterSearch()\">Filter</div>
                ";
        }
        else {
            echo "<div class=\"BrandChoices\">";
            for($i = 0; $i < 3; $i++){
                $this->printBrandSelect($brands[$i][0], $brands[$i][1]);
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
                            $this->printBrandSelect($brands[i]['brandid'], $brands[i]['name']);
                        }       
            echo "
                    </div>
                </div>
                ";
        }
    }

    private function printBrandSelect($brandId, $brandName){
        echo "
                <div class=\"BrandSelect\">
                    <input type=\"checkbox\" name=\"brand\" value=\"".$brandId."\">
                    <div class=\"BrandName\">".$brandName."</div>
                </div>
                ";
    }
}
?>

