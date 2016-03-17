<?php
/**
 * Created by Eclipse.
 * User: Tomas Paronai
 * Date: 21. 1. 2016
 * Time: 11:03
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path.'API/Product.php');
include_once ($path.'API/Category.php');
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

	$catHan = new Category();
	$categories = $catHan->getCategories();
	$category = "Uknown category ID!";
	for($i=0;$i<count($categories);$i++){
		if($categories[$i]['id'] == $product->categoryid){
			$category = $categories[$i]['category'];
			///echo $category . '<br>';
			break;
		}
		if(isset($categories[$i]['subcategory'])){
			for($j=0;$j<count($categories[$i]['subcategory']);$j++){
				//echo $product->categoryid . ' '.$categories[$i]['subcategory'][$j]['id'].'<br>';
				if($categories[$i]['subcategory'][$j]['id'] == $product->categoryid){
					$category = $categories[$i]['subcategory'][$j]['name'];
					break;
				}
			}
		}
	}

	echo '<ul class="userView">';
	echo '<li class="view"><b>Name:</b> '.$product->name.'</li>';
	echo '<li class="view"><b>Brand:</b> '.$brand.'</li>';
	echo '<li class="view"><b>Category:</b> '.$category.'</li>';
	echo '<li class="view"><b>Amount:</b> '.$product->amount.'</li>';
	echo '<li class="view"><b>Price:</b> '.$product->price.'</li>';
	echo '<li class="view"><b>Discription:</b> '.$product->description.'</li>';
	echo '<li class="view"><b>Stored since:</b> '.$product->datecreated.'</li>';
	echo '</ul>';
	echo '<div class="edit-view"><a class="view-controls" href="?page=private/pageSettings&settings=addProduct&productid=' . $product->id . '"><i class="fa fa-pencil-square-o fa-2x"></i></a>';
	if($product->deleted != 1){
		echo '<a class="view-controls" href="?page=private/pageSettings&settings=editProduct/deleteProduct&productid=' . $product->id . '"><i class="fa fa-times fa-2x"></i></a></div>';
	}
	else{
		echo '<a class="view-controls" href="?page=private/pageSettings&settings=editProduct/deleteProduct&productid=' . $product->id . '"><i class="fa fa-refresh fa-2x"></i></a></div>';
	}

}
