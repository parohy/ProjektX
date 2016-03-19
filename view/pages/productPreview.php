<?php
/**
 * Created by PhpStorm.
 * User: Dominik Kolesar
 * Date: 8. 12. 2015
 * Time: 11:51
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path .'controllers/ProductPreviewController.php');
include_once ($path .'API/ImageScaling.php');
include_once ($path .'controllers/ProductDisplay.php');

$productController = new ProductPreviewController();
$product = $productController->getProduct($_GET['product']);
?>

<link rel="stylesheet" type="text/css" href="libraries/css/productPreview.css">
<link rel="stylesheet" type="text/css" href="libraries/css/imagePopup.css">

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
                        <!-- <REAL CODE>
                		<?php
                			$alpha = range('a','z');
                			$index = 0;
                			while(file_exists('libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . $alpha[$index] . '.jpg')){
                				$localPath = 'libraries/img/products/' . $product['productid'] . '/' . $product['productid'] . $alpha[$index] . '.jpg';
                				$alt = $product['productid'] . $alpha[$index] . '.jpg';
                				//echo '<td><a href="?page=productPreview&product=' . $product['productid'] . '&index='. $alpha[$index] . '" onclick="changePic('.$alpha[$index].')"><img class="image-album" src="' . $localPath . '" alt="' . $alt . '" width="' . $width . '" height="' . $height . '"></a></td>';
                				echo '<tr><img class="image-album" src="' . $localPath . '" alt="' . $alt . '" width="114" height="114"></tr>';
                				$index++;
                			}
                		?>
                        -->

                        <!-- PLACEHOLDER ITEMS CODE -->
                        <?php
                            $productDisplay = new ProductDisplay();
                            $index = 0;
                            while(file_exists($productDisplay->productImagePath($product['categoryid'])) && $index < 3){
                                $localPath = $productDisplay->productImagePath($product['categoryid']);
                                $alt = $product['productid'] . '.png';
                                //echo '<td><a href="?page=productPreview&product=' . $product['productid'] . '&index='. $alpha[$index] . '" onclick="changePic('.$alpha[$index].')"><img class="image-album" src="' . $localPath . '" alt="' . $alt . '" width="' . $width . '" height="' . $height . '"></a></td>';
                                echo '<tr><img class="image-album" src="' . $localPath . '" alt="' . $alt . '" width="114" height="114"></tr>';
                                $index++;
                            }
                        ?>
                </table>
            </div>
    <div class="product-slider">
            <!-- <REAL CODE>
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
            -->

            <!-- PLACEHOLDER ITEMS CODE -->
            <?php
                $size = $scaling->productPreviewImage($product['productid']);
                echo '<a class="highslide" href="'.$productDisplay->productImagePath($product['categoryid']).'" onclick="return hs.expand(this)"><img id="propic" src="'.$productDisplay->productImagePath($product['categoryid']).'" width="' . $size[0] . '" height="' . $size[1] . '"></a>';
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
                    <?php
                    if((isset($_SESSION['userrole']) && $_SESSION['userrole'] != "2") || !isset($_SESSION['username'])){
                        echo '<input type="submit" value="BUY" name="BUY">';
                    }
                    else{
                        echo '<div class="adminbutts"><a href="?page=private/pageSettings&settings=addProduct&productid='.$id.'"><i class="fa fa-pencil-square-o fa-2x"></i></a> <a href="?page=private/editProduct/deleteProduct&productid='.$id.'"><i class="fa fa-times fa-2x"></i></a></div>';
                    }
                    ?>

                </div>
            </form>
    	</div>

    </div>

</div>
<div class="Similar">
    <h2>Similar Products</h2>
    <?php
    $date = new DateTime();
    $timeStamp = $date->getTimestamp();
    $similar = $productController->getSimilarProducts($_GET['product']);
    $max = (count($similar, 0) > 4) ? 4 : count($similar, 0);

    if($max > 0) {
        echo "<div class=\"row\">";
        for($i = 0; $i < $max; $i++){
            $product = new Product($similar[$i]);
            if($product->deleted === false){
                $size = $scaling->productItemTumbnail($similar[$i]); // get scaled size of image to fit tumbnail
                $margin = $scaling->productItemTumbnailMargin($size); // calculate margin after scale to center it in thumbnail

                echo "<div class=\"product-item\">";

                echo "
                        <div class=\"product-photo\">
                            <img class=\"loader\" src=\"libraries/img/loader.gif\" alt=\"loading...\">
                            <a href=\"?page=productPreview&product=" . $similar[$i] . "\"><img class=\"thumbnailImage notLoaded\" src=\"".$productDisplay->productImagePath($product->categoryid)."?".$timeStamp."\" alt=\"product photo\"></a>
                        </div>
                        <div class=\"product-description\">
                            <hr class=\"product-line\">
                            <h3 class=\"similar-product-name\">" . substr($product->name,0,40) . "</h3>
                            <span class=\"price\">".$product->price."<i class=\"fa fa-eur\"></i></span>";
                echo productButtons($similar[$i],$product->name,$product->price);//<a href=\"controllers/addToCart.php?productid=".$res."&name=".$product->name."&price=".$product->price."\" class=\"addToCart\">Add to Cart</a>
                echo     "</div>
                  </div>
                ";
            }
        }
        echo "</div>";
    } else {
        echo "<h4>There are no similat products.</h4>";
    }

    function productButtons($id, $name, $price){
        $out = "";
        if((isset($_SESSION['userrole']) && $_SESSION['userrole'] != "2") || !isset($_SESSION['username'])){
            $out = "<a href='controllers/addToCart.php?productid=".$id."&name=".$name."&price=".$price."' class='addToCart'>Add to Cart</a>";
        }
        else if(isset($_SESSION['username']) && $_SESSION['username'] == "admin"){
            $out = '<div class="admin-buttons"><a href="?page=private/pageSettings&settings=addProduct&productid='.$id.'"><i class="fa fa-pencil-square-o fa-2x"></i></a> <a href="?page=private/editProduct/deleteProduct&productid='.$id.'"><i class="fa fa-times fa-2x"></i></a></div>';
        }

        return $out;
    }
    ?>
</div>
