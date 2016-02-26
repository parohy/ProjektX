<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 2/20/2016
 * Time: 12:25 PM
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';

include_once($path.'API/Orders.php');

$order = null;
if(isset($_GET['orderid'])){
    $order = new Order($_GET['orderid']);
}

if(isset($_GET['edit'])){
    if($_GET['edit'] == 'ship'){
        if($order->shipped == 0){
            $order->shipped = 1;
        }
        else{
            $order->shipped = 0;
        }
        $order->save();
    }
    else if($_GET['edit'] == 'delete'){
        $order->delete();
    }
}

if(headers_sent()){
    die('Request has been processed. Please click on <a href="'.$_SERVER['HTTP_REFERER'].'">this</a> to go back.');
}
else{
    exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
}
