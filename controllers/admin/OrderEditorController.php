<?php
/**
 * @author Tomas Paronai
 */





$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path . 'API/Database.php');

class OrderEditorController{
	
	private $handlerDB;
	
	public function __construct() {
		$this->handlerDB = new DBHandler();
	}
	
	public function getOrders() {
		$this->handlerDB->beginTransaction();
		if($_SESSION['userrole'] != 1){
			$this->handlerDB->query('SELECT * FROM orders');
		}
		else{
			$this->handlerDB->query('SELECT * FROM orders WHERE userid=:userid');
			$this->handlerDB->bind(':userid',$_SESSION['userid']);
		}
		$results = $this->handlerDB->resultSet();
		$this->handlerDB->endTransaction();
	
		return $results;
	}
	
	public function displayOrders($orders, $pagination, $display) {
	
		$max = count($orders);
		if($pagination * $display > $max)
        {
            $amount = $max;
        }
        else
        {
            $amount = $pagination * $display;
        }
		echo '<ol class="items">';
		for($i = ($pagination - 1) * $display; $i < $amount; $i++){
			echo '<li>';
			if($_SESSION['userrole'] != 1){
				echo '<span class="orderinfo"><div style="width: 220px; display: inline-block">'.$orders[$i]['name'].' '.$orders[$i]['surname'].' '.$orders[$i]['address'].'</div><div style="width: 150px; display: inline-block">'.$orders[$i]['city'].'</div><div style="width: 150px; display: inline-block">'.$orders[$i]['postcode'].'</div></span>';
			}
			else{
				echo '<span class="orderinfo"><div style="width: 220px; display: inline-block">'.$orders[$i]['address'].'</div><div style="width: 150px; display: inline-block">'.$orders[$i]['city'].'</div><div style="width: 150px; display: inline-block">'.$orders[$i]['postcode'].'</div></span>';

			}
			echo '<span class="orderinfoprice"> '.$orders[$i]['orderprice'].' €</span>';
			if($orders[$i]['shipped'] != '0'){
				echo '<span class="orderinfoship"> shipped </span>';
			}
			else{
				echo '<span class="orderinfoship"> queued </span>';
			}

			//echo '<a class="page-link" href="?page=private/pageSettings&settings=orderPreview&orderid='.$orders[$i]['orderid'].'"><i class="fa fa-pencil-square-o fa-2x"></i></a>';
			if($_SESSION['userrole'] != 1){
				echo '<a class="page-link" href="?page=private/pageSettings&settings=orderPreview&orderid='.$orders[$i]['orderid'].'"><i class="fa fa-search-plus fa-2x"></i></a>';
				if($orders[$i]['shipped'] != 1){
					echo '<a class="page-link" href="?page=private/pageSettings&settings=editOrder/editOrder&orderid='.$orders[$i]['orderid'].'&edit=ship"><i class="fa fa-square-o fa-2x"></i></a>';
				}
				else{
					echo '<a class="page-link" href="?page=private/pageSettings&settings=editOrder/editOrder&orderid='.$orders[$i]['orderid'].'&edit=ship"><i class="fa fa-check-square-o fa-2x"></i></a>';
				}

				echo '<a class="page-link" href="?page=private/pageSettings&settings=editOrder/editOrder&orderid='.$orders[$i]['orderid'].'&edit=delete"><i class="fa fa-times fa-2x"></i></a>';
			}
			else{
				echo '<a class="page-link" href="?page=accountSettings&profile=orderPreview&orderid='.$orders[$i]['orderid'].'"><i class="fa fa-search-plus fa-2x"></i></a>';
			}

			echo '</li>';
		}
		echo '</ol>';

		echo '<ul class="items">';
	

		//echo '<a class="page-link" class="user-controls" href="?page=private/pageSettings&settings=addProduct"><i class="fa fa-plus-circle fa-2x"></i></a>';

		echo '<div class="paging">';
		echo '<div class="displayAmount">';
		if($_SESSION['userrole'] != 1){
			echo '<a class="page" href="?page=private/pageSettings&settings=orders&display=10&pagination=1">10</a>';
			echo '<a class="page" href="?page=private/pageSettings&settings=orders&display=20&pagination=1">20</a>';
			echo '<a class="page" href="?page=private/pageSettings&settings=orders&display=50&pagination=1">50</a>';
			echo '<a class="page" href="?page=private/pageSettings&settings=orders&display=100&pagination=1">100</a>';
		}
		else{
			echo '<a class="page" href="?page=accountSettings&profile=orders&display=10&pagination=1">10</a>';
			echo '<a class="page" href="?page=accountSettings&profile=orders&display=20&pagination=1">20</a>';
			echo '<a class="page" href="?page=accountSettings&profile=orders&display=50&pagination=1">50</a>';
			echo '<a class="page" href="?page=accountSettings&profile=orders&display=100&pagination=1">100</a>';
		}
		echo '</div>';

		
		$pages = count($orders) / $display;
        if(count($orders) % $display != 0)
        {
            $pages++;
        }

		for($i=1; $i<=$pages; $i++)
		{
			if($_SESSION['userrole'] != 1){
				echo '<a class="page" href="?page=private/pageSettings&settings=orders&display='.$display.'&pagination='.$i.'">'.$i.'</a>';
			}
			else{
				echo '<a class="page" href="?page=accountSettings&profile=orders&display='.$display.'&pagination='.$i.'">'.$i.'</a>';
			}

		}
		echo '</div>';
	}	
}