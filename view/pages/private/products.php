<?php
/**
 * @author Tomas Paronai
 */




$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include ($path . 'controllers/admin/ProductEditorController.php');

$productEditor = new ProductEditorController();


$pagination = 1;
$display = 5;

if(isset($_SESSION['searchRes'])){
	$products = $_SESSION['searchRes'];
	unset($_SESSION['searchRes']);
}
else{
	$products = $productEditor->getProducts();
}

if(isset($_GET['display'])){
	$display = $_GET['display'];
}

if(isset($_GET['pagination'])){
	$pagination = $_GET['pagination'];
}

$productEditor->displayProducts($products, $pagination, $display);
