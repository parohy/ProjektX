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
            <?php
            /*
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
            }*/
            ?>
            <script type="text/javascript" src="libraries/js/jssor.slider.mini.js"></script>
            <!-- use jssor.slider.debug.js instead for debug -->
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

                    //responsive code begin
                    //you can remove responsive code if you don't want the slider scales while window resizing
                    function ScaleSlider() {
                        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                        if (refSize) {
                            refSize = Math.min(refSize, 1084);
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
                    //responsive code end
                });
            </script>

            <style>

                /* jssor slider bullet navigator skin 05 css */
                /*
                .jssorb05 div           (normal)
                .jssorb05 div:hover     (normal mouseover)
                .jssorb05 .av           (active)
                .jssorb05 .av:hover     (active mouseover)
                .jssorb05 .dn           (mousedown)
                */
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

                /* jssor slider arrow navigator skin 12 css */
                /*
                .jssora12l                  (normal)
                .jssora12r                  (normal)
                .jssora12l:hover            (normal mouseover)
                .jssora12r:hover            (normal mouseover)
                .jssora12l.jssora12ldn      (mousedown)
                .jssora12r.jssora12rdn      (mousedown)
                */
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


            <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1084px; height: 300px; overflow: hidden; visibility: hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('libraries/img/slider/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1084px; height: 300px; overflow: hidden;">
                    <div data-p="173.00" style="display: none;">
                        <img data-u="image" src="libraries/img/slider/bestTVs.png" />
                    </div>
                    <div data-p="173.00" style="display: none;">
                        <img data-u="image" src="libraries/img/slider/free shipping.png" />
                    </div>
                    <div data-p="173.00" style="display: none;">
                        <img data-u="image" src="libraries/img/slider/galaxy slider.png" />
                    </div>
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
</div>
    </div>
