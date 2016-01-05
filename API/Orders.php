<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 5. 1. 2016
 * Time: 14:00
 */

include_once ('Database.php');

class Order{

	public $id;
	private $handlerDB;
        public $error=null;
        public $userid="";
        public $surname="";
        public $name="";
        public $email="";
        public $phone="";
        public $address="";
        public $city="";
        public $postcode="";
        public $datecreated="";
        public $shipped="";
        public $orderprice="";

	/**
	 * Creates an OrderHandler instance with optional $id parameter
	 * @author Matus Kokoska
	 */
        
        public function __construct($id=null){
            $this->handlerDB = new DBHandler();
            $this->id=$id;

            $this->load();
	}

	/**
	 * If $id is set, loads existing order. 
	 * @author Matus Kokoska
	 */
        
        public function load() {
            if($this->id != null){
                $this->handlerDB->query("SELECT * FROM orders where orderid=:id");
                $this->handlerDB->bind(":id", $this->id);
                $orders = $this->handlerDB->resultSet();
                if (count($orders)==1) {
                    $this->userid=$orders[0]['userid'];
                    $this->surname=$orders[0]['surname'];
                    $this->name=$orders[0]['name'];
                    $this->email=$orders[0]['email'];
                    $this->phone=$orders[0]['phone'];
                    $this->address=$orders[0]['address'];
                    $this->city=$orders[0]['city'];
                    $this->postcode=$orders[0]['postcode'];
                    $this->datecreated=$orders[0]['datecreated'];
                    $this->shipped=$orders[0]['shipped'];
                    $this->orderprice=$orders[0]['orderprice'];
                }
                else {
                    $error="Order not found.";
                }
            }
            else {
                $error="Id not set.";
            }
        }
	
        /**
	 * Saves edited properties of an order or creates a new order if $id is not set
	 * @author Matus Kokoska
	 */
        
        public function save(){
            if($this->id == null){
                $this->handlerDB->query("INSERT INTO orders (userid, surname, name, email, phone, address, city, postcode, datecreated, shipped, orderprice) ".
                       "VALUES (:userid, :surname, :name, :email, :phone, :address, :city, :postcode, :datecreated, :shipped, :orderprice)");
                $this->datecreated=date("Y-m-d")." ".date("H:i:s");
            }
            else {
                $this->handlerDB->query("UPDATE orders SET userid=:userid, surname=:surname, name=:name, email=:email, phone=:phone, address=:address, city=:city, postcode=:postcode, datecreated=:datecreated, shipped=:shipped ,orderprice=:orderprice".
                       "WHERE orderid=:orderid");
                $this->handlerDB->bind(':orderid', $this->id);
            }
            $this->handlerDB->bind(':userid', $this->userid);
            $this->handlerDB->bind(':surname', $this->surname);
            $this->handlerDB->bind(':name', $this->name);
            $this->handlerDB->bind(':email', $this->email);
            $this->handlerDB->bind(':phone', $this->phone);
            $this->handlerDB->bind(':address', $this->address);
            $this->handlerDB->bind(':city', $this->city);
            $this->handlerDB->bind(':postcode', $this->postcode);
            $this->handlerDB->bind(':datecreated', $this->datecreated);
            $this->handlerDB->bind(':shipped', $this->shipped);
            $this->handlerDB->bind(':orderprice', $this->orderprice);
            $this->handlerDB->execute();
        }
	
        /**
	 * Deletes existing order
	 * @author Matus Kokoska
	 */
        
        public function delete() {
            if($this->id!=null){
                $this->handlerDB->query("DELETE FROM orders WHERE orderid LIKE '%".$this->id."%'");
            }
            $this->handlerDB->execute();   
        }
}
