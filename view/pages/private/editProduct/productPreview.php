<?php
/**
 * Created by Eclipse.
 * User: Tomas Paronai
 * Date: 21. 1. 2016
 * Time: 11:03
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Product.php');
include_once ($path.'API/Brand.php');

if(isset($_GET['productid'])){
	$product = new Product($_GET['productid']);
	$brandHan = new Brand();
	$brands = $brandHan->getAllBrands();
	$brand = "Uknown brand ID!";
	for($i=0;$i<count($brands);$i++){
		if($brands[$i]['brandid'] == $product->brandid){
			$brand = $brands[$i]['name'];
			break;
		}
	}

	echo '<ul class="userView">';
	echo '<li class="view"><b>Name:</b> '.$product->name.'</li>';
	echo '<li class="view"><b>Brand:</b> '.$brand.'</li>';
	echo '<li class="view"><b>Amount:</b> '.$product->amount.'</li>';
	echo '<li class="view"><b>Price:</b> '.$product->price.'</li>';
	echo '<li class="view"><b>Discription:</b> '.$product->description.'</li>';
	echo '<li class="view"><b>Stored since:</b> '.$product->datecreated.'</li>';
	echo '</ul>';
	echo '<span class="view"><a class="view-controls" href="?page=private/pageSettings&settings=addProduct&productid=' . $product->id . '"><i class="fa fa-pencil-square-o fa-2x"></i></a>
			                          <a class="view-controls" href="?page=private/pageSettings&settings=editProduct/deleteProduct&productid=' . $product->id . '"><i class="fa fa-times fa-2x"></i></a></span>';
}