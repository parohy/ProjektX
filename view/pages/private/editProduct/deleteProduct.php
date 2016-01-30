<?php
/**
 * Created by Eclipse.
 * User: Tomas Paronai
 * Date: 21. 1. 2016
 * Time: 11:21
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Product.php');


$editProduct;
if(isset($_GET['productid'])){
	$editProduct = new Product($_GET['productid']);
	$editProduct->delete();
}

if(headers_sent()){
	die('Redirect failed. Please click on <a href="?page=private/pageSettings&settings=products&display=20&pagination=1">this</a> to try again.');
}
else{
	exit(header('Location: ?page=private/pageSettings&settings=products&display=20&pagination=1'));
}