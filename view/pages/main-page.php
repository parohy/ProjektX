<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Product.php');
include_once ($path.'API/ImageScaling.php');

$tempProduct = new Product();


?>
<div class="slider-wrapper">
    <div class="slider">
        <div id="left-arrow">
            <a href="#">
            <
            </a>
        </div>

        <div class="sliderContent">
            <?php
            $slidesPath = "libraries/img/slider/";
            $slides = scandir($slidesPath,1);

            foreach($slides as $slide) {
                if($slide == "..") {
                    break;
                } else {
                    echo '<div class="slides">';
                    echo '<img src="' . $slidesPath . $slide . '">';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <div id="right-arrow">
            <a href="#">
            >
            </a>
        </div>
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
        	$productsId = $tempProduct->getProductsId();
        	$max = 12;
        	
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
        		
        		echo '<div class="product-photo"><a href="?page=productPreview&product='.$product->id.'"><img alt="product-photo" src="libraries/img/products/'.$product->id.'/'.$product->id.'a.jpg" class="thumbnailImage"></a></div>';
        		echo '<div class="product-description">';
        		echo '<hr class="product-line">';
        		echo '<h3 class="product-name">'.substr($product->name,0,40).'</h3>';
        		echo '<span class="price">'.$product->price.'</span>';
        		echo '<a href="controllers/addToCart.php?productid='.$product->id.'&name='.$product->name.'&price='.$product->price.'" class="addToCart">Add to Cart</a>';
        		echo '</div></div>';

                if($counter == 4) {
                    echo '</div>';
                    $counter = 0;
                }
        	}
        }
        ?>
    </div>
</div>
    </div>
