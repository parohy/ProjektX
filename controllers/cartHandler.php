<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 22. 2. 2016
 * Time: 11:56
 */
session_id("cartsession");
session_start();
if(isset($_SESSION['cart'])) {
    $cartContent = $_SESSION['cart'];
    $productId = (int) $_GET['productid'];

    $count = (int) $_GET['value'];
    $cartContent[$productId]['count'] = $count;

    $_SESSION['cart'] = $cartContent;
    exit();
}
else {
    echo "No cart";
}