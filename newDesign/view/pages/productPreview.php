<?php
/**
 * Created by PhpStorm.
 * User: Dominik Kolesar
 * Date: 8. 12. 2015
 * Time: 11:51
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/newDesign/';
include_once ($path.'config.php');
include (ROOT.'controllers/ProductPreviewController.php');
include (ROOT.'API/ImageScaling.php');

$productController = new ProductPreviewController();
$product = $productController->getProduct($_GET['prodid']);
?>

<link rel="stylesheet" type="text/css" href="libraries/css/productPreview.css">

<div id="product-prewiew">

    <div class="product-name">
        <h1><?php echo strtoupper($product['name']);?></h1>
    </div>

    <div id="about-product" class="group">

        <div class="product-slider">
            <?php

            $scaling = new ImageScaling();
            $size = $scaling->productPreviewImage($product['productid']);
            echo '<img src="libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . 'a.jpg" width="' . $size[0] . '" height="' . $size[1] . '">';
            ?>
        </div>

        <div id="product-info" class="group">

            <div class="product-ranking">
            hviezdicky
            </div>

            <div class="product-brand">
                <?php echo strtoupper($product['brand']);?>
            </div>

            <span class="short-describtion">
            <?php echo substr($product['description'],0,200);?>
            </span>

            <form class="cost-form" action="" method="get">
                <span class="cost">
                    <?php echo $product['price'] . ' €';?>
                </span>
                <div class="submit-input">
                <input type="submit" value="BUY" name="BUY">
                </div>
            </form>
        </div>


        </div>


    <div class="description-title">
        <h2> DESCRIPTION</h2>

    </div>

    <div class="description-text">
        <?php echo $product['description'];?>

    </div>



</div>
