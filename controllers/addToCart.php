<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 7. 1. 2016
 * Time: 16:26
 */
session_start();

if(isset($_GET['productid']) && isset($_GET['name']) && isset($_GET['price'])) {
    if(isset($_SESSION['cart'])) {

        $cartContent = $_SESSION['cart'];
        array_push($cartContent,$_GET['productid']);

        $sizeOfCart = sizeof($cartContent);
        $sizeOfCart--;

        $match = 0;
        for($i = 0; $i <= $sizeOfCart; $i++) {
            if($_GET['productid'] == $cartContent[$i]["productid"]) {
                $match = $i;
            }
        }

        //if($match == 0) {
            $cartContent[$sizeOfCart] = array(
                "productid"=>$_GET['productid'],
                "count"=>1,
                "name" =>$_GET['name'],
                "price"=>$_GET['price'],
            );
        /*}
        else {
            $count = $cartContent[$match]['count'];
            $count = (int) $count;
            $count++;
            $cartContent[$match]['count'] = $count;
        }*/

        $_SESSION['cart'] = $cartContent;
        var_dump($_SESSION['cart']);
        //header("Location:../?page=productPreview&product=" . $_GET['product']);
    }
    else {
        $cartContent = array(0=>array(
            "productid"=>$_GET['productid'],
            "count"=>1,
            "name" =>$_GET['name'],
            "price"=>$_GET['price']
        ));

        $_SESSION['cart'] = $cartContent;

        var_dump($_SESSION['cart']);
        //header("Location:../?page=productPreview&product=" . $_GET['product']);
    }
}
else {
    die("HOOOPS SOMETHING WENT WRONG!");
}