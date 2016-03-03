<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 22. 2. 2016
 * Time: 11:56
 */
if(isset($_COOKIE['sessionID'])){
    session_id($_COOKIE['sessionID']);
}
else{
    $_COOKIE['sessionID'] = session_id();
}
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