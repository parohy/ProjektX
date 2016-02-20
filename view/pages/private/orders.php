<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 2/18/2016
 * Time: 9:13 PM
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';

include ($path . 'controllers/admin/OrderEditorController.php');


$orderEditor = new OrderEditorController();


if(isset($_SESSION['searchRes'])){
    $orders  = $_SESSION['searchRes'];
    unset($_SESSION['searchRes']);
}
else{
    $orders = $orderEditor->getOrders();
}

$pagination = 1;
$display = 5;

if(isset($_GET['display'])){
    $display = $_GET['display'];
}

if(isset($_GET['pagination'])){
    $pagination = $_GET['pagination'];
}

$orderEditor->displayOrders($orders,$pagination,$display);


