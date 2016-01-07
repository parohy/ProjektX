<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 7. 1. 2016
 * Time: 16:26
 */
if(isset($_GET['product'])) {
    if(isset($_COOKIE['cart'])) {
        $cartContent = $_COOKIE['cart'];
        array_push($cartContent,$_GET['product']);
        $cookieName = 'cart';
        setcookie($cookieName,$cartContent,time() + (86400 * 30),"/");
        header("Location:../?page=productPreview&product=" . $_GET['product']);
        exit();
    }
    else {
        $cartContent = array(
            $_GET['product'],
        );
        $cookieName = 'cart';
        setcookie($cookieName,$cartContent,time() + (86400 * 30),"/");
        header("Location:../?page=productPreview&product=" . $_GET['product']);
        exit();
    }
}
else {
    die("HOOOPS SOMETHING WENT WRONG!");
}