<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 2/18/2016
 * Time: 9:38 PM
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';

include_once($path . 'API/Orders.php');
include_once($path . 'API/Orderdetails.php');
include_once($path . 'API/Product.php');

$order = null;
if(isset($_GET['orderid'])){
    $order = new Order($_GET['orderid']);
}

echo '<ul class="itemsorderofuser">';
    echo '<li><div>orderID:</div><div>'.$order->id.'</div></li>';
    echo '<li><div>Name:</div><div>'.$order->name.'</div></li>';
    echo '<li><div>Surname:</div><div>'.$order->surname.'</div></li>';
    echo '<li><div>Email:</div><div>'.$order->email.'</div></li>';
    echo '<li><div>Address:</div><div>'.$order->address.'</div></li>';
    echo '<li><div>City:</div><div>'.$order->city.'</div></li>';
    echo '<li><div>Postcode:</div><div>'.$order->postcode.'</div></li>';
    echo '<li><div>Price:</div><div>'.$order->orderprice.'</div></li>';
    echo '<li><div>Status:</div>';
    if($order->shipped == '0'){
        echo '<div>shipped</div></li>';
    }
    else{
        echo '<div>queued</div></li>';
    }
echo '</ul>';

echo '<div class="contentoforder">Content:</div>';
echo '<ol class="ordercontentlist">';
    foreach($order->alldetails as $currentItem){
        echo '<li>';
        $detail = new Orderdetail($currentItem);
        $product = new Product($detail->productid);
        echo ''.$product->name.' '.$product->price.' eur '.$detail->quantity.'x';
        echo '</li>';
    }
echo '</ol>';

if($_SESSION['userrole'] != 1){
    echo '<a class="page-link" href="?page=private/pageSettings&settings=editOrder/editOrder&orderid='.$order->id.'&edit=ship"><i class="fa fa-plane fa-2x"></i></a>';
    echo '<a class="page-link" href="?page=private/pageSettings&settings=editOrder/editOrder&orderid='.$order->id.'&edit=delete"><i class="fa fa-times fa-2x"></i></a>';
}


