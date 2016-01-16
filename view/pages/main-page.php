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
include_once ($path.'API/Filter.php');

$tempProduct = new Product();
$filter = new Filter();


?>
<div class="slider-wrapper">
    
            <script type="text/javascript" src="libraries/js/jssor.slider.mini.js"></script>
            <script>
                jQuery(document).ready(function ($) {

                    var jssor_1_SlideshowTransitions = [
                        {$Duration:1200,$Opacity:2}
                    ];

                    var jssor_1_options = {
                        $AutoPlay: true,
                        $SlideshowOptions: {
                            $Class: $JssorSlideshowRunner$,
                            $Transitions: jssor_1_SlideshowTransitions,
                            $TransitionsOrder: 1
                        },
                        $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$
                        },
                        $BulletNavigatorOptions: {
                            $Class: $JssorBulletNavigator$
                        }
                    };

                    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                    function ScaleSlider() {
                        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                        if (refSize) {
                            refSize = Math.min(refSize, 1100);
                            jssor_1_slider.$ScaleWidth(refSize);
                        }
                        else {
                            window.setTimeout(ScaleSlider, 30);
                        }
                    }
                    ScaleSlider();
                    $(window).bind("load", ScaleSlider);
                    $(window).bind("resize", ScaleSlider);
                    $(window).bind("orientationchange", ScaleSlider);
                });
            </script>

            <style>
                .jssorb05 {
                    position: absolute;
                }
                .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                    position: absolute;
                    /* size of bullet elment */
                    width: 16px;
                    height: 16px;
                    background: url('libraries/img/slider/b05.png') no-repeat;
                    overflow: hidden;
                    cursor: pointer;
                }
                .jssorb05 div { background-position: -7px -7px; }
                .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
                .jssorb05 .av { background-position: -67px -7px; }
                .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

                .jssora12l, .jssora12r {
                    display: block;
                    position: absolute;
                    /* size of arrow element */
                    width: 30px;
                    height: 46px;
                    cursor: pointer;
                    background: url('libraries/img/slider/a12.png') no-repeat;
                    overflow: hidden;
                }
                .jssora12l { background-position: -16px -37px; }
                .jssora12r { background-position: -75px -37px; }
                .jssora12l:hover { background-position: -136px -37px; }
                .jssora12r:hover { background-position: -195px -37px; }
                .jssora12l.jssora12ldn { background-position: -256px -37px; }
                .jssora12r.jssora12rdn { background-position: -315px -37px; }
            </style>


            <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1100px; height: 367px; overflow: hidden; visibility: hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('libraries/img/slider/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1100px; height: 367px; overflow: hidden;">
                    <?php
                    $slidesPath = "libraries/img/slider/slides/";
                    $slides = scandir($slidesPath,1);

                    foreach($slides as $slide) {
                        if($slide == "..") {
                            break;
                        } else {
                            echo '<div data-p="173.00" style="display: none;">';
                            echo '<img data-u="image" src="'. $slidesPath . $slide .'" />';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <!-- Bullet Navigator -->
                <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                    <!-- bullet navigator item prototype -->
                    <div data-u="prototype" style="width:16px;height:16px;"></div>
                </div>
                <!-- Arrow Navigator -->
                <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
                <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
                <a href="http://www.jssor.com" style="display:none">Bootstrap Carousel</a>
            </div>
    
</div>

<div class="tabs">
    <div class="controls">
        <ul>

            <li><a href="#" class="link best-sellingButton">BEST SELLING </a></li>
            <li><a href="#" class="link top-ratedButton">TOP RATED </a></li>
            <li><a href="#" class="link new-arrivalsButton">NEW ARRIVALS </a></li>
    </div>
    <div class="tab-content">
        
        <div class="bottom-tab-content">
            <div class="best-selling">
                <?php
                if($tempProduct != NULL){
                    $productsId = $tempProduct->getProductsId();
                    //$productsId-
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
            <div class="top-rated">
                <?php
                //$products = $filter->getResults();
                //var_dump($products);
                /*
                for($i=0;$i<$max;$i++){
                    $product = new Product($products[$i]['productid']);
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
                }*/
                ?>
            </div>
            <div class="new-arrivals">CUSSS</div>
    </div>
</div>
    </div>
