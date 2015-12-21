<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

include_once (ROOT.'API/Product.php');
include_once (ROOT.'API/ImageScaling.php');

$tempProduct = new Product();


?>
<div class="slider">
    <div id="left-arrow">
        <
    </div>

    <div id="right-arrow">
        >
    </div>
</div>

<div class="tabs">
    <div class="controls">
        <ul>
            <li><a href="#" class="link">BEST SELLING <i class="fa fa-angle-down"></i> </a></li>
            <li><a href="#" class="link">TOP RATED <i class="fa fa-angle-down"></i> </a></li>
            <li><a href="#" class="link">NEW ARRIVALS <i class="fa fa-angle-down"></i> </a></li>
    </div>
    <div class="tab-content">
        <div class="top-tab-content">
            <p>WE HAVE OVER 50 PRODUCTS IN OUR SHOP</p>
        </div>

        <div class="bottom-tab-content">
        
        <?php 
        if($tempProduct != NULL){
        	$scaleTool = new ImageScaling();
        	$productsId = $tempProduct->getProductsId();
        	$max = 8;
        	
        	if($tempProduct->getTotalProducts() < $max){
        		$max = $tempProduct->getTotalProducts();
        	}

            $counter = 0;

        	for($i=0;$i<$max;$i++){
        		$product = new Product($productsId[$i]['productid']);
                $counter++;

                if($counter == 1) {
                    echo '<div class="row">';
                }

                echo '<div class="product-item">';

        		$size = $scaleTool->productItemTumbnail($product->id);
        		$width = $size[0];
        		$height = $size[1];
        		$margin = $scaleTool->productItemTumbnailMargin($size);
        		$marginWidth = $margin[1];
        		$marginHeight = $margin[0];
        		
        		echo '<div class="product-photo"><img style="margin:'.$marginWidth.'px '.$marginHeight.'px;" alt="product-photo" width="'.$width.'" height="'.$height.'" src="libraries/img/products/'.$product->id.'/'.$product->id.'a.jpg"></div>';
        		echo '<div class="product-description">';
        		echo '<hr class="product-line">';
        		echo '<h3 class="product-name">'.$product->name.'</h3>';
        		echo '<span class="price">'.$product->price.'</span>';
        		echo '<a href="#" class="addToCart">Add to Cart</a>';
        		echo '</div></div>';

                if($counter == 4) {
                    echo '</div>';
                    $counter = 0;
                }
        	}
        }
        ?>
           <!-- <div class="product-item  first-row">
                <div class="product-photo">
                </div>

                <div class="product-description">
                    <hr class="product-line">
                    <h3 class="product-name">PRODUCT</h3>
                    <span class="price">$299.0</span>
                    <a href="#" class="addToCart">Add to Cart</a>
                </div>
            </div>

            <div class="product-item second-row">
                <div class="product-photo">
                </div>

                <div class="product-description">
                    <hr class="product-line">
                    <h3 class="product-name">PRODUCT</h3>
                    <span class="price">$299.0</span>
                    <a href="#" class="addToCart">Add to Cart</a>
                </div>
            </div>

            <div class="product-item first-row">
                <div class="product-photo">
                </div>

                <div class="product-description">
                    <hr class="product-line">
                    <h3 class="product-name">PRODUCT</h3>
                    <span class="price">$299.0</span>
                    <a href="#" class="addToCart">Add to Cart</a>
                </div>
            </div>

            <div class="product-item second-row">
                <div class="product-photo">
                </div>

                <div class="product-description">
                    <hr class="product-line">
                    <h3 class="product-name">PRODUCT</h3>
                    <span class="price">$299.0</span>
                    <a href="#" class="addToCart">Add to Cart</a>
                </div>
            </div>

            <div class="product-item first-row">
                <div class="product-photo">
                </div>

                <div class="product-description">
                    <hr class="product-line">
                    <h3 class="product-name">PRODUCT</h3>
                    <span class="price">$299.0</span>
                    <a href="#" class="addToCart">Add to Cart</a>
                </div>
            </div>

            <div class="product-item second-row">
                <div class="product-photo">
                </div>

                <div class="product-description">
                    <hr class="product-line">
                    <h3 class="product-name">PRODUCT</h3>
                    <span class="price">$299.0</span>
                    <a href="#" class="addToCart">Add to Cart</a>
                </div>
            </div>

            <div class="product-item first-row">
                <div class="product-photo">
                </div>

                <div class="product-description">
                    <hr class="product-line">
                    <h3 class="product-name">PRODUCT</h3>
                    <span class="price">$299.0</span>
                    <a href="#" class="addToCart">Add to Cart</a>
                </div>
            </div>

            <div class="product-item second-row">
                <div class="product-photo">
                </div>

                <div class="product-description">
                    <hr class="product-line">
                    <h3 class="product-name">PRODUCT</h3>
                    <span class="price">$299.0</span>
                    <a href="#" class="addToCart">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="more">
            <a href="#">+ LOAD MORE PRODUCTS</a>
        </div>-->
    </div>
</div>
    </div>
