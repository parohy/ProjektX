<?php
/**
 * @author Tomas Paronai
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path . 'API/Database.php');

class ProductEditorController{
	
	private $handlerDB;
	
	public function __construct() {
		$this->handlerDB = new DBHandler();
	}
	
	public function getProducts() {
		$this->handlerDB->beginTransaction();
		$this->handlerDB->query('SELECT * FROM products');
		$results = $this->handlerDB->resultSet();
		$this->handlerDB->endTransaction();
	
		return $results;
	}
	
	public function displayProducts($products, $displayFrom, $displayTo) {
	
		$total = (count($products)-1)/5;
		if((count($products))%5 != 0){
			$total++;
		}
		 
		echo '<ul class="items">';
	
		for($i = $displayFrom; $i <= $displayTo; $i++) {
			echo '<li>';
			echo '<span class="prodname">' . $products[$i]['name'] . '</span>';
			echo '<span class="user-controls"><a class="page-link" href="?page=private/pageSettings&settings=editProduct/productPreview&productid=' . $products[$i]['productid'] . '"><i class="fa fa-search-plus fa-2x"></i></a>
            	                              <a class="page-link" href="?page=private/pageSettings&settings=addProduct&productid=' . $products[$i]['productid'] . '"><i class="fa fa-pencil-square-o fa-2x"></i></a>
            				                  <a class="page-link" href="?page=private/pageSettings&settings=editProduct/deleteProduct&productid=' . $products[$i]['productid'] . '"><i class="fa fa-times fa-2x"></i></a></span>';
			echo '</li>';
		}
	
		echo '</ul>';
		echo '<a class="page-link" class="user-controls" href="?page=private/pageSettings&settings=addProduct"><i class="fa fa-plus-circle fa-2x"></i></a>';
	
		echo '<span class="paging">';
		$start = 1;
		$end = 6;
		for($i=1;$i<=$total;$i++){			
			if($i != 1){
				$start += 5;
				$end += 5;
			}
			 
			if($end > count($products)-1){
				$temp = $end - count($products);
				$end -= $temp;
			}
			echo '<a class="page" href="?page=private/pageSettings&settings=products&from='.$start.'&to='.$end.'">'.$i.'</a>';
			//echo '<a class="page" href="'.$path.'?current='.$i.'">'.$i.'</a>';
		}
		echo '</span>';
	}
	
}