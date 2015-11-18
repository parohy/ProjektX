<?php
    $product = $_GET['product'];

    $handler = new DBHandler();
    $handler->query("SELECT * FROM products WHERE productid = :id");
    $handler->bind(":id",$product);
    $result = $handler->singleRecord();

    if($result['sumofratings'] > 0 && $result['numofratings'] > 0) {
        $avgRating = round($result['sumofratings'] / $result['numofratings'], 1);
    } else {
        $avgRating = 0;
    }
?>
<link rel="stylesheet" type="text/css" href="css/productPreview.css">
<div class="frame-container product-preview">
    <div class="frame-content">
        <section>
            <article>
                <header class="product-header"><h1><?php echo $result['name'];?></h1></header>

                <div class="product-content">
                    <div class="product-image">
                        <img src="../ProjektX/<?php echo $result['imagepath']; ?>">
                    </div>

                    <div class="product-description">
                        <?php echo $result['description']; ?>
                    </div>
                </div>

                <footer class="product-footer">
                    <div class="product-ranking">Hodnotenie: <?php echo $avgRating;?><br>
                        <?php
                            $id = $result['productid'];

                            for($i = 1; $i <= 5; $i++) {
                                if(isset($_COOKIE[$id])) {
                                    if($_COOKIE[$id] == "true") {
                                        echo "<a href=\"#\"><img src=\"../ProjektX/img/star.svg.png\"></a>";
                                    } else {
                                        echo "<a href=\"?page=productPreview&product=" . $id . "&rating=" . $i ." \"><img src=\"../ProjektX/img/star.svg.png\"></a>";
                                    }
                                }
                            }
                        ?>
                    </div>
                    <div class="product-info">
                        <span>Na sklade: <?php echo $result['amount']?></span>
                        <br>
                        <a href="#" class="addtocart">Pridať do košíku</a>
                        <span class="product-price"><?php echo $result['price']?> EUR</span>
                    </div>
                </footer>
            </article>
        </section>
    </div>
</div>