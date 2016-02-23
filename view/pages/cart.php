<?php ?>
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
            else if(isset($_GET['change']) && isset($_GET['value'])) {
                $productId = $_GET['change'];
                $value = (int) $_GET['value'];

                foreach($cartContent as $cart) {
                    if($cart['id'] == $productId) {
                        $cart['count'] = $value;
                        break;
                    }
                }

                unset($_GET['change']);
                unset($_GET['value']);

                $_SESSION['cart'] = $cartContent;
            }
            
            $i = 0;

            foreach($cartContent as $cart) {
                $numOfItems += $cart['count'];
                $temp = floatval($cart['price']);
                $temp *= $cart['count'];
                $totalCost += $temp;


                echo '<div class="product-body">';
                echo '<div class="product-img"><a href="?page=productPreview&product=' . $cart['id'] . '">
				        <img src="libraries/img/products/' . $cart['id'] . '/' . $cart['id'] . 'a.jpg" alt="product blank icon" width="100" height="100"></a>
			          </div>';
                echo '<div class="product-name">
				      <span class="namespan"><a href="?page=productPreview&product=' . $cart['id'] . '">' . $cart['name'] . '</a></span>
			          </div>';
                echo '<div class="product-price" data-price="'.$cart['price'].'">
				        ' . $cart['price'] . ' <i class="fa fa-eur" style="font-size: 20px"></i>
			          </div>';
                echo '<div class="product-qty">
				        <input class="input" type="number" name="qty" min="1" max="99" value="' . $cart['count'] . '" data-id="'.$cart['id'].'">
					  </div>
					  <div class="kus"><a>kus</a></div>';
                echo '<a href="?page=cart&number=' . array_search($cart,$cartContent) . '" class="removeItem"><img src="libraries/img/icons/recyclebin.png"></a>';
                echo '</div>';
                $i++;
            }
        }

        if($numOfItems == 0) {
            echo '<span class="empty">Shopping cart is empty!</span>';
        }
        ?>
	</div>
	<div class="sub">
		Subtotal (<?php echo $numOfItems; ?> items): <a class="bold"><?php echo $totalCost; ?> EUR<a>
	</div>
    <?php
        if($numOfItems == 0) {
            echo '<a class="pro-button disabled" href="#">Proceed to checkout</a>';
        }
        else {
            echo '<a class="pro-button" href="?page=checkout&numOfItems='.$numOfItems.'&totalCost='.$totalCost.'">Proceed to checkout</a>';
        }
    ?>
    <script src="libraries/js/cart.js"></script>
</div>
