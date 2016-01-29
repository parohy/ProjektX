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

<script>
$(document).ready(function()
{
    $(".image-album").each(function(){
        adjustOneThumbnail($(this));
    });

    function adjustOneThumbnail(img)
    {
        var maxWidth = img.parent().width();
        var maxHeight = img.parent().height();

        var ratio;
        var width = img.width();
        var height = img.height();

        ratio = maxWidth / width;
        img.css("width", 114);
        img.css("height", 114);
        height *= ratio;
        width *= ratio;

        if(height > maxHeight){
            ratio = maxHeight / height;
            img.css("height", maxHeight);
            img.css("width", width * ratio);
            height *= ratio;
            width *= ratio;
        }

        var marginTop = ((maxHeight) - height) / 2;
        var marginLeft = ((maxWidth) - width) / 2;
        img.css({"margin-top":"0px","margin-left":marginLeft+"px"});
        img.removeClass("notLoaded");
    }
});

</script>

<div id="product-prewiew">    
    <!-- album of pictures
            @author Tomas Paronai-->
            <script src="libraries/js/albumScript.js"></script>
            <div class="pictable">
                <table>
                	
                		<?php
                			$alpha = range('a','z');
                			$index = 0;
                			while(file_exists('libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . $alpha[$index] . '.jpg')){
                				$localPath = 'libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . $alpha[$index] . '.jpg';
                				$alt = $product['productid'] . $alpha[$index] . '.jpg';
                				//echo '<td><a href="?page=productPreview&product=' . $product['productid'] . '&index='. $alpha[$index] . '" onclick="changePic('.$alpha[$index].')"><img class="image-album" src="' . $localPath . '" alt="' . $alt . '" width="' . $width . '" height="' . $height . '"></a></td>';
                				echo '<tr><img class="image-album" src="' . $localPath . '" alt="' . $alt . '" width="114" height="114" onclick="changePic(\''.$alpha[$index].'\',\''.$product['productid'].'\')"></tr>';
                				$index++;
                			}
                		?>
                	
                </table>
            </div>
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
                	echo '<a class="highslide" href="libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . 'a.jpg" onclick="return hs.expand(this)"><img id="propic" src="libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . 'a.jpg" width="' . $size[0] . '" height="' . $size[1] . '"></a>';
                }            
            ?>
    </div>
    <div id="about-product" class="group">
        
		<div class="product-name">
            <p><?php echo strtoupper($product['name']);?></p>
        </div>
        
        <div class="desc">
            <div class="description-title">
                <p> DESCRIPTION</p>                
            </div>            	
            <div class="description-text">
                <?php echo $product['description'];?>
            </div>       
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
                    else if($_COOKIE[$id] == "false")
                    {
                        for($i = 1; $i <= 5; $i++)
                        {
                            if($i <= $rating) {
                                echo '<a href="?page=productPreview&product=' . $id . '&rating=' . $i .'"><img src="libraries/img/star-selected.png"></a>';
                            }
                            else if($i > $rating) {
                                echo '<a href="?page=productPreview&product=' . $id . '&rating=' . $i .'"><img src="libraries/img/star.png" style="opacity: 0.5;"></a>';
                            }
                        }
                    }
                } else {
                    for($i = 1; $i <= 5; $i++)
                    {
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
    
        <div class="aftername1">
                  
            <!--<div class="product-brand">
                <?php
                    $brand = $productController->getProductBrand($product['brandid']);
                    echo strtoupper($brand['name']);
                ?>
            </div>-->
                
            

                

                <!--<span class="short-describtion">
                <?php echo substr($product['description'],0,200);?>
                </span>-->

            <form class="cost-form" action="controllers/addToCart.php?productid=<?php echo $product['productid'] ?>&name=<?php echo $product['name'] ?>&price=<?php echo $product['price'] ?>&destination=cart" method="POST">
                <span class="cost">
                    <?php echo $product['price'] . ' €';?>
                </span>
                <div class="submit-input">
                    <input type="submit" value="BUY" name="BUY">
                </div>
            </form>
    	</div>
    	
    </div>
    
</div>
<div class="Similar">
        <h2>Similar Products</h2>
</div>
