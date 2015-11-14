<?php
    include "../ProjektX/API/Database.php";

    $product = $_GET['product'];

    $handler = new DBHandler();
    $handler->query("SELECT * FROM products WHERE productid = :id");
    $handler->bind(":id",$product);
    $result = $handler->singleRecord();
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
                    <div class="product-ranking">Hodnotenie:<br><img src="../ProjektX/img/star.svg.png"><img src="../ProjektX/img/star.svg.png"><img src="../ProjektX/img/star.svg.png"><img src="../ProjektX/img/star.svg.png"><img src="../ProjektX/img/star.svg.png"></div>
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