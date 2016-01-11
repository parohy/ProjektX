
<link rel="stylesheet" type="text/css" href="libraries/css/cart.css">
<div class="cartpage">
	<div class="title-page">
        <h1>YOUR SHOPPING CART</h1>
    </div>
	<div class="cart-body">
        <?php
        $numOfItems = 0;
        $totalCost = 0;
        if(isset($_SESSION['cart'])) {

            $cartContent = $_SESSION['cart'];

            if(isset($_GET['number'])) {
                $number = $_GET['number'];
                $number = (int) $number;

                unset($cartContent[$number]);
                $_SESSION['cart'] = $cartContent;
            }

            $i = 0;

            foreach($cartContent as $cart) {
                $numOfItems += $cart['count'];
                $temp = floatval($cart['price']);
                $temp *= $cart['count'];
                $totalCost += $temp;


                echo '<div class="product-body">';
                echo '<div class="product-img">
				        <img src="libraries/img/products/' . $cart['id'] . '/'.$cart['id'].'a.jpg" alt="product blank icon" width="100" height="100">
			          </div>';
                echo '<div class="product-name">
				      <a href="?page=productPreview&product='.$cart['id'].'">'.$cart['name'].'</a>
			          </div>';
                echo '<div class="product-price">
				        '.$cart['price'].' EUR
			          </div>';
                echo '<div class="product-qty">
				        <input class="input" type="number" name="qty" min="1" max="99" value="'.$cart['count'].'">
			          </div>';
                echo '<a href="?page=cart&number='.$i.'" class="removeItem">X</a>';
                echo '</div>';
                $i++;
            }
        }
        ?>
	</div>
	<div class="sub">
		Subtotal (<?php echo $numOfItems; ?> items): <a class="bold"><?php echo $totalCost; ?> EUR<a>
	</div>
	<a class="pro-button" href="?page=checkout">Proceed to checkout</a>
	
	<script src="libraries/js/cart.js"></script>
</div>
