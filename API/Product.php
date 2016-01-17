<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 30. 11. 2015
 * Time: 22:00
 */

include_once ('Database.php');

class Product{

	public $id;
	private $handlerDB;
        public $error=null;
        public $categoryid="";
        public $amount="";
        public $name="";
        public $price="";
        public $brandid="";
        public $description="";
        public $viewamount="";
        public $datecreated="";
        public $numofratings="";
        public $sumofratings="";

	/**
	 * Creates an ProductHandler instance with optional $id parameter
	 * @author Matus Kokoska
	 */
        
        public function __construct($id=null){
            $this->handlerDB = new DBHandler();
            $this->id=$id;

            $this->load();
	}

	/**
	 * If $id is set, loads existing product. 
	 * @author Matus Kokoska
	 */
        
        public function load() {
            if($this->id != null){
                $this->handlerDB->query("SELECT * FROM products where productid=:id");
                $this->handlerDB->bind(":id", $this->id);
                $products = $this->handlerDB->resultSet();
                if (count($products)==1) {
                    $this->categoryid=$products[0]['categoryid'];
                    $this->amount=$products[0]['amount'];
                    $this->name=$products[0]['name'];
                    $this->price=$products[0]['price'];
                    $this->brandid=$products[0]['brandid'];
                    $this->description=$products[0]['description'];
                    $this->viewamount=$products[0]['viewamount'];
                    $this->datecreated=$products[0]['datecreated'];
                    $this->numofratings=$products[0]['numofratings'];
                    $this->sumofratings=$products[0]['sumofratings'];
                }
                else {
                    $error="Product not found.";
                }
            }
            else {
                $error="Id not set.";
            }
        }
	
        /**
	 * Saves edited properties of product or creates a new product if $id is not set
	 * @author Matus Kokoska
	 */
        
        public function save(){
            if($this->id == null){
                $this->handlerDB->query("INSERT INTO products (categoryid, amount, name, price, brandid, description, viewamount, datecreated, numofratings, sumofratings) ".
                       "VALUES (:categoryid, :amount, :name, :price, :brandid, :description, :viewamount, :datecreated, :numofratings, :sumofratings)");
                $this->datecreated=date("Y-m-d")." ".date("H:i:s");
            }
            else {
                $this->handlerDB->query("UPDATE products SET categoryid=:categoryid, amount=:amount, name=:name, price=:price, brandid=:brandid, description=:description, viewamount=:viewamount, datecreated=:datecreated, numofratings=:numofratings, sumofratings=:sumofratings ".
                       "WHERE productid=:productid");
                $this->handlerDB->bind(':productid', $this->id);
            }
            $this->handlerDB->bind(':categoryid', $this->categoryid);
            $this->handlerDB->bind(':amount', $this->amount);
            $this->handlerDB->bind(':name', $this->name);
            $this->handlerDB->bind(':price', $this->price);
            $this->handlerDB->bind(':brandid', $this->brandid);
            $this->handlerDB->bind(':description', $this->description);
            $this->handlerDB->bind(':viewamount', $this->viewamount);
            $this->handlerDB->bind(':datecreated', $this->datecreated);
            $this->handlerDB->bind(':numofratings', $this->numofratings);
            $this->handlerDB->bind(':sumofratings', $this->sumofratings);
            $this->handlerDB->execute();
        }
	
        /**
	 * Deletes existing product
	 * @author Matus Kokoska
	 */
        
        public function delete() {
            if($this->id!=null){
                $this->handlerDB->query("DELETE FROM products WHERE productid LIKE '%".$this->id."%'");
            }
            $this->handlerDB->execute();   
        }
        
        public function getTotalProducts(){
        	$this->handlerDB->query("SELECT productid FROM products");
        	return count($this->handlerDB->resultSet());
        }
        
        public function getProductsId(){
        	$this->handlerDB->query("SELECT productid FROM products");
        	return $this->handlerDB->resultSet();
        }
        
        public function displayProduct($id){
        	$out = "";
        	$product = new Product($id);
        	
        	
        	$out .= '<div class="product-item">';
        	$out .= '<div class="product-photo"><a href="?page=productPreview&product='.$product->id.'"><img alt="product-photo" src="libraries/img/products/'.$product->id.'/'.$product->id.'a.jpg" class="thumbnailImage"></a></div>';
        	$out .= '<div class="product-description">';
        	$out .= '<hr class="product-line">';
        	$out .= '<h3 class="product-name">'.substr($product->name,0,40).'</h3>';
        	$out .= '<span class="price">'.$product->price.'</span>';
        	$out .= '<a href="controllers/addToCart.php?productid='.$product->id.'&name='.$product->name.'&price='.$product->price.'" class="addToCart">Add to Cart</a>';
        	$out .= '</div></div>';
        	
        	return $out;
        }
}
