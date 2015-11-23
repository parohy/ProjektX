<?php
/**
 * Author: Matus Kacmar
 */
$product = $_GET['product'];

$handler = new DBHandler();
$handler->beginTransaction();
$handler->query("SELECT * FROM products WHERE productid = :id");
$handler->bind(":id",$product);
$result = $handler->singleRecord();

/************************************ IMAGES *******************************************/

$handler->query("SELECT * FROM images WHERE productid=:id");
$handler->bind(":id",$product);
$image = $handler->singleRecord();

/************************************ CATEGORIES *******************************************/

$handler->query("SELECT * FROM categories WHERE categoryid=:category");
$handler->bind(":category",$result['categoryid']);
$actualCategoryResult = $handler->singleRecord();

$handler->query("SELECT * FROM categories WHERE categoryid=:category");
$handler->bind(':category',$actualCategoryResult['parent']);
$categoryResult = $handler->singleRecord();

$handler->query("SELECT * FROM categories WHERE categoryid=:category");
$handler->bind(':category',$categoryResult['parent']);
$parentCategoryResult = $handler->singleRecord();

$handler->endTransaction();

/************************************ RATING *******************************************/

if($result['sumofratings'] > 0 && $result['numofratings'] > 0) { // Calculate rating for given product
    $avgRating = round($result['sumofratings'] / $result['numofratings'], 1);
} else {
    $avgRating = 0;
}

// Author: Peter Varholak
if ($result['amount'] > 5) {
	$naSklade = "In Stock >5 units";
} else if ($result['amount'] <= 0) {
	$naSklade = "Currently Unavailable";
} else {
	$naSklade = "In Stock " . $result['amount'] . " units";
}
?>
<link rel="stylesheet" type="text/css" href="css/productPreview.css">
<div class="frame-container product-preview">
    <div class="frame-content">
        <section>
            <article>
                <header class="product-header">
                    <h1><?php echo $result['name'];?></h1>
                    <br>
                    <?php
                    if($parentCategoryResult['categoryid'] != 1) echo "<a href=\"?page=" . $parentCategoryResult['name'] . "&category=" . $parentCategoryResult['categoryid'] . "&view=10\">" . $parentCategoryResult['name'] . "</a>>";
                    echo "<a href=\"?page=" . $categoryResult['name'] . "&category=" . $categoryResult['categoryid'] . "&view=10\">" . $categoryResult['name'] . "</a>>";
                    echo "<a href=\"?page=" . $actualCategoryResult['name'] . "&category=" . $actualCategoryResult['categoryid'] . "&view=10\">" . $actualCategoryResult['name'] . "</a>";
                    ?>
                </header>

                <div class="product-content">
                    <div class="product-image">
                        <img src="../ProjektX<?php echo $image['pic1path']; ?>" id="image-slide1">
                        <?php
                        if($image['pic2path'] != null) {
                            echo "<img src=\"../ProjektX" . $image['pic2path'] . "\" class=\"image-slides\">";
                        }
                        if($image['pic3path'] != null) {
                            echo "<img src=\"../ProjektX" . $image['pic3path'] . "\" class=\"image-slides\">";
                        }
                        ?>
                    </div>

                    <div class="product-description">
                        <?php echo $result['description']; ?>
                    </div>
                </div>

                <footer class="product-footer">
                    <div class="product-ranking">Hodnotenie: <?php echo "<span id=\"numOfRating\">" . $avgRating . "</span>";?><br>
                        <?php
                            $id = $result['productid'];

                            for($i = 1; $i <= 5; $i++) {

                                if(isset($_COOKIE[$id])) { // if cookie is set for given product

                                    if($_COOKIE[$id] == "true") { // if cookie value is true forbid rating
                                        echo "<a href=\"#\" class=\"rating\"><img src=\"../ProjektX/img/star.svg.png\"></a>";
                                    } else if($_COOKIE[$id] == "false"){ // if cookie value is false allow product rating
                                        echo "<a href=\"?page=productPreview&product=" . $id . "&rating=" . $i ." \" class=\"rating\"><img src=\"../ProjektX/img/star.svg.png\"></a>";
                                    }

                                }
                                else {
                                    echo "<a href=\"?page=productPreview&product=" . $id . "&rating=" . $i ." \" class=\"rating\"><img src=\"../ProjektX/img/star.svg.png\"></a>";
                                }
                            }
                        ?>
                        <script src="js/rating.js"></script>
                    </div>
                    <div class="product-info">
                        <span><?php echo $naSklade?></span>
                        <br>
                        <a href="#" class="addtocart">Pridať do košíku</a>
                        <span class="product-price"><?php echo $result['price']?> EUR</span>
                    </div>
                </footer>
            </article>
        </section>
    </div>
    <script src="js/productPreview.js"></script>
</div>
