<?php
/**
 * @author Tomas Paronai
 */




$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include ($path . 'controllers/admin/ProductEditorController.php');

$productEditor = new ProductEditorController();

$products = $productEditor->getProducts();
$pagination = 1;
$display = 5;

if(isset($_GET['display'])){
	$display = $_GET['display'];
}

if(isset($_GET['pagination'])){
	$pagination = $_GET['pagination'];
}

$productEditor->displayProducts($products, $pagination, $display);