<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 5. 1. 2016
 * Time: 15:00
 */

include_once ('Database.php');

class Orderdetail{

	public $id;
	private $handlerDB;
        public $error=null;
        public $productid="";
        public $orderid="";
        public $quantity="";
        public $detailprice="";

	/**
	 * Creates an OrderdetailHandler instance with optional $id parameter
	 * @author Matus Kokoska
	 */
        
        public function __construct($id=null){
            $this->handlerDB = new DBHandler();
            $this->id=$id;

            $this->load();
	}

	/**
	 * If $id is set, loads existing orderdetail. 
	 * @author Matus Kokoska
	 */
        
        public function load() {
            if($this->id != null){
                $this->handlerDB->query("SELECT * FROM orderdetails where detailid=:id");
                $this->handlerDB->bind(":id", $this->id);
                $orderdetails = $this->handlerDB->resultSet();
                if (count($orderdetails)==1) {
                    $this->productid=$orderdetails[0]['productid'];
                    $this->orderid=$orderdetails[0]['orderid'];
                    $this->quantity=$orderdetails[0]['quantity'];
                    $this->detailprice=$orderdetails[0]['detailprice'];
                }
                else {
                    $error="Orderdetail not found.";
                }
            }
            else {
                $error="Id not set.";
            }
        }
	
        /**
	 * Saves edited properties of orderdetail or creates a new orderdetail if $id is not set
	 * @author Matus Kokoska
	 */
        
        public function save(){
            if($this->id == null){
                $this->handlerDB->query("INSERT INTO orderdetails (productid, orderid, quantity, detailprice) ".
                       "VALUES (:productid, :orderid, :quantity, :detailprice)");
            }
            else {
                $this->handlerDB->query("UPDATE orderdetails SET productid=:productid, orderid=:orderid, quantity=:quantity, detailprice=:detailprice".
                       "WHERE detailid=:detailid");
                $this->handlerDB->bind(':detailid', $this->id);
            }
            $this->handlerDB->bind(':productid', $this->productid);
            $this->handlerDB->bind(':orderid', $this->orderid);
            $this->handlerDB->bind(':quantity', $this->quantity);
            $this->handlerDB->bind(':detailprice', $this->detailprice);
            $this->handlerDB->execute();
        }
	
        /**
	 * Deletes existing orderdetail
	 * @author Matus Kokoska
	 */
        
        public function delete() {
            if($this->id!=null){
                $this->handlerDB->query("DELETE FROM orderdetails WHERE detailid LIKE '%".$this->id."%'");
            }
            $this->handlerDB->execute();   
        }
}
