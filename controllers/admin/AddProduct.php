<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 19. 1. 2016
 * Time: 21:39
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/'; 
include_once ($path."API/Product.php");

//if adding product, create hidden input with value="NULL"
$id=$_POST["productid"];
if($id=="NULL")
{
    $id=NULL;
}

$product= new Product($id);
$product->categoryid=$_POST["categoryid"];
$product->amount=$_POST["amount"];
$product->name=$_POST["name"];
$product->price=$_POST["price"];
$product->brandid=$_POST["brandid"];
$product->description=$_POST["description"];
$product->save();
