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
        public $categoryid=1;
        public $amount="";
        public $name="";
        public $price="";
        public $brandid="";
        public $description="";
        public $viewamount=0;
        public $datecreated="";
        public $numofratings=0;
        public $sumofratings=0;
        public $saved=false;
        public $deleted=false;

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
                    if($products[0]['deleted'] != 0) $this->deleted = true;
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
            $this->saved = true;
        }
	
        /**
	 * Deletes existing product
	 * @author Matus Kokoska
	 */
        
        public function delete() {
            if($this->id!=null){
                if($this->deleted){
                    $this->handlerDB->query("UPDATE products SET deleted='0' WHERE productid LIKE '%".$this->id."%'");
                    $_SESSION['adminMsg'] = 'Product restored.';
                }
                else{
                    $_SESSION['adminMsg'] = 'Product deleted.';
                    $this->handlerDB->query("UPDATE products SET deleted='1' WHERE productid LIKE '%".$this->id."%'");
                }
            }
            $this->handlerDB->execute();   
        }

    /**
     * get total number of products in database
     * @return int
     */
        public function getTotalProducts(){
        	$this->handlerDB->query("SELECT productid FROM products");
        	return count($this->handlerDB->resultSet());
        }

    /**
     * get total number of archived products in database
     * @return int
     */
        public function getTotalArchived(){
            $this->handlerDB->query("SELECT productid FROM products WHERE deleted != '0'");
            return count($this->handlerDB->resultSet());
        }

    /**
     * get an array of all products ids in database
     * @return mixed
     */
        public function getProductsId(){
        	$this->handlerDB->query("SELECT productid FROM products");
        	return $this->handlerDB->resultSet();
        }
        
}
