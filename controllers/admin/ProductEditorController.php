<?php
/**
 * @author Tomas Paronai
 */





$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
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

	public function displayProducts($products, $pagination, $display) {

		$max = count($products);
		if($pagination * $display > $max)
        {
            $amount = $max;
        }
        else
        {
            $amount = $pagination * $display;
        }

		echo '<ul class="items">';

		for($i = ($pagination - 1) * $display; $i < $amount; $i++) {
			echo '<li>';
			if($products[$i]['deleted'] != 0){
				echo '<i class="fa fa-archive"></i>';
			}
			echo '<span class="prodname">' . $products[$i]['name'] . '</span>';
			echo '<span class="user-controls"><a class="page-link" href="?page=private/pageSettings&settings=editProduct/productPreview&productid=' . $products[$i]['productid'] . '"><i class="fa fa-search-plus fa-2x"></i></a>
            	                              <a class="page-link" href="?page=private/pageSettings&settings=addProduct&productid=' . $products[$i]['productid'] . '"><i class="fa fa-pencil-square-o fa-2x"></i></a>';
            	                              if($products[$i]['deleted'] != 0){ //
												  echo ' <a class="page-link" href="?page=private/pageSettings&settings=editProduct/deleteProduct&productid=' . $products[$i]['productid'] . '"><i class="fa fa-refresh fa-2x"></i></a></span>';

											  }
											  else{
												  echo ' <a class="page-link" href="?page=private/pageSettings&settings=editProduct/deleteProduct&productid=' . $products[$i]['productid'] . '"><i class="fa fa-times fa-2x"></i></a></span>';
											  }
			echo '</li>';
		}

		echo '</ul>';
		echo '<a class="page-link" class="user-controls" href="?page=private/pageSettings&settings=addProduct"><i class="fa fa-plus-circle fa-2x"></i></a>';

		echo '<div class="paging">';
		echo '<div class="displayAmount">';
        echo '<a class="page" href="?page=private/pageSettings&settings=products&display=10&pagination=1">10</a>';
        echo '<a class="page" href="?page=private/pageSettings&settings=products&display=20&pagination=1">20</a>';
        echo '<a class="page" href="?page=private/pageSettings&settings=products&display=50&pagination=1">50</a>';
        echo '<a class="page" href="?page=private/pageSettings&settings=products&display=100&pagination=1">100</a>';
        echo '</div>';


		$pages = count($products) / $display;
        if(count($products) % $display != 0)
        {
            $pages++;
        }

		for($i=1; $i<=$pages; $i++)
		{
			echo '<a class="page" href="?page=private/pageSettings&settings=products&display='.$display.'&pagination='.$i.'">'.$i.'</a>';
		}
		echo '</div>';
	}
}
