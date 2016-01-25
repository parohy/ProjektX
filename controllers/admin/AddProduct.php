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
if($_POST['subcategory'] == 0){
	$product->categoryid=$_POST["categoryid"];
}
else if($_POST['subcategory'] == '+'){
	$product->categoryid=$_POST["categoryid"];
}
else{
	$product->categoryid=$_POST["subcategory"];
}

$product->amount=$_POST["amount"];
$product->name=$_POST["name"];
$product->price=$_POST["price"];
if($_POST['brand'] == '+'){
	//add new brand
	$product->brandid=$_POST["brand"];
}
else{
	$product->brandid=$_POST["brand"];
}

$product->description=$_POST["description"];
$product->save();
if($product->saved){
	//header('Location: ../?page=private/pageSettings&settings=addProduct');
	if(headers_sent()){
		$url = '../index.php?page=private/pageSettings&settings=products';
		//die('Redirect failed. Please click on <a href="'.$url.'">this</a> to try again.');
	}
	else{
		//exit(header('Location: ../' . $url));
	}
}

