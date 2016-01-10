<?php
/**
 * Created by PhpStorm.
 * User: Dominik Kolesar
 * Date: 8. 12. 2015
 * Time: 11:51
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include ($path .'controllers/ProductPreviewController.php');
include ($path .'API/ImageScaling.php');

$productController = new ProductPreviewController();
$product = $productController->getProduct($_GET['product']);
?>

<link rel="stylesheet" type="text/css" href="libraries/css/productPreview.css">

<div id="product-prewiew">
    
    <div class="product-slider">
            <?php

            $scaling = new ImageScaling();
            if(isset($_GET['index'])){
            	$size = $scaling->productPreviewImageIndex($product['productid'], $_GET['index']);
            	$imgName = $product['productid'] . $_GET['index'] . '.jpg';
            	echo '<img id="propic" src="libraries/img/products/' . $product['productid'] . '/' . $imgName . '" width="' . $size[0] . '" height="' . $size[1] . '">';
            }
            else{
            	$size = $scaling->productPreviewImage($product['productid']);
            	echo '<img id="propic" src="libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . 'a.jpg" width="' . $size[0] . '" height="' . $size[1] . '">';
            }            
            
            ?>
    </div>
    
    <div id="about-product" class="group">
        
        <div class="product-name">
            <p><?php echo strtoupper($product['name']);?></p>
        </div>
                  
        <div class="product-brand">
            <?php
                $brand = $productController->getProductBrand($product['brandid']);
                echo strtoupper($brand['name']);
                ?>
            </div>
            
            <div class="product-ranking">
            <?php
                if($product['numofratings'] > 0) {
                    $rating = $product['sumofratings'] / $product['numofratings'];
                } else {
                    $rating = 0;
                }
                $id = $product['productid'];

                if(isset($_COOKIE[$id])) {
                    if($_COOKIE[$id] == "true") {
                        for($i = 1; $i <= 5; $i++) {
                            if($i <= $rating) {
                                echo '<img src="libraries/img/star-selected.png">';
                            }
                            else if($i > $rating) {
                                echo '<img src="libraries/img/star.png" style="opacity: 0.5;">';
                            }
                        }
                    }
                    else if($_COOKIE[$id] == "false") {
                        for($i = 1; $i <= 5; $i++) {
                            if($i <= $rating) {
                                echo '<a href="?page=productPreview&product=' . $id . '&rating=' . $i .'"><img src="libraries/img/star-selected.png"></a>';
                            }
                            else if($i > $rating) {
                                echo '<a href="?page=productPreview&product=' . $id . '&rating=' . $i .'"><img src="libraries/img/star.png" style="opacity: 0.5;"></a>';
                            }
                        }
                    }
                } else {
                    for($i = 1; $i <= 5; $i++) {
                        if($i <= $rating) {
                            echo '<a href="?page=productPreview&product=' . $id . '&rating=' . $i .'"><img src="libraries/img/star-selected.png"></a>';
                        }
                        else if($i > $rating) {
                            echo '<a href="?page=productPreview&product=' . $id . '&rating=' . $i .'"><img src="libraries/img/star.png" style="opacity: 0.5;"></a>';
                        }
                    }
                }
            ?>
            </div>

            

            <!--<span class="short-describtion">
            <?php echo substr($product['description'],0,200);?>
            </span>-->

            <form class="cost-form" action="controllers/addToCart.php?product=<?php echo $product['productid'] ?>" method="POST">
                <span class="cost">
                    <?php echo $product['price'] . ' €';?>
                </span>
                <div class="submit-input">
                <input type="submit" value="BUY" name="BUY">
                </div>
            </form>
        


        </div>

    <div class="desc">
        <div class="description-title">
            <h2> DESCRIPTION</h2>
            
        </div>

        <div class="description-text">
            <?php echo $product['description'];?>

        </div>
        
        <!-- album of pictures
        @author Tomas Paronai-->
        <table>
        	<tr>
        		<?php
        			$alpha = range('a','z');
        			$index = 0;
        			while(file_exists('libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . $alpha[$index] . '.jpg')){
        				$localPath = 'libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . $alpha[$index] . '.jpg';
        				$width = $height = 100;
        				$alt = $product['productid'] . $alpha[$index] . '.jpg';
        				echo '<td><a href="?page=productPreview&product=' . $product['productid'] . '&index='. $alpha[$index] . '"><img class="image-album" src="' . $localPath . '" alt="' . $alt . '" width="' . $width . '" height="' . $height . '"></a></td>';
        				$index++;
        			}
        		?>
        	</tr>
        </table>
        
    </div>


</div>
