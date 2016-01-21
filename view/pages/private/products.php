<?php
/**
 * @author Tomas Paronai
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include ($path . 'controllers/admin/ProductEditorController.php');

$userEditor = new ProductEditorController();

$products = $userEditor->getProducts();
$max = count($products);
$from = 1;

if($max > 5){
	$max = 6;
}

if(isset($_GET['to'])){
	$max = $_GET['to'];
}

if(isset($_GET['from'])){
	$from = $_GET['from'];
}


$userEditor->displayProducts($products,$from,$max-1);