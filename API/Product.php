<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 30. 11. 2015
 * Time: 22:00
 */

include_once ('..\ProjektX\API\Database.php');

class Product{

	private $id;
	private $handlerDB;

        public $error=null;

        public $name;

	public function __construct($id=null){
            $this->handlerDB = new DBHandler();
            $this->id=$id;

            $this->load();
	}

        public function delete() {

        }

        public function load() {
            $error=null;

            if($this->id != null){
                $this->handlerDB->query("SELECT * FROM products where productid=:id");
                $this->handlerDB->bind(":id", $this->id);
                $products = $this->handlerDB->resultSet();
                if (count($products)==1) {
                    $this->categoryid=$products[0]['categoryid'];
                    $this->amount=$products[0]['amount'];
                    $this->name=$products[0]['name'];
                    $this->price=$products[0]['price'];
                    $this->brand=$products[0]['brand'];
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
                $this->categoryid="";
                $this->amount="";
                $this->name="";
                $this->price="";
                $this->brand="";
                $this->description="";
                $this->viewamount="";
                $this->datecreated="";
                $this->numofratings="";
                $this->sumofratings="";
            }
        }

        public function save(){
            if($this->id == null){
                $this->handlerDB->query("INSERT INTO products (categoryid, amount, name, price, brand, description, viewamount, datecreated, numofratings, sumofratings) ".
                       "VALUES (:categoryid, :amount, :name, :price, :brand, :description, :viewamount, :datecreated, :numofratings, :sumofratings)");
            }
            else {
                $this->handlerDB->query("UPDATE products SET categoryid=:categoryid, amount=:amount, name=:name, price=:price, brand=:brand, description=:description, viewamount=:viewamount, datecreated=:datecreated, numofratings=:numofratings, sumofratings=:sumofratings ".
                       "WHERE productid=:productid");
                $this->handlerDB->bind(':productid', $this->id);
            }
            $this->handlerDB->bind(':categoryid', $this->categoryid);
            $this->handlerDB->bind(':amount', $this->amount);
            $this->handlerDB->bind(':name', $this->name);
            $this->handlerDB->bind(':price', $this->price);
            $this->handlerDB->bind(':brand', $this->brand);
            $this->handlerDB->bind(':description', $this->description);
            $this->handlerDB->bind(':viewamount', $this->viewamount);
            $this->handlerDB->bind(':datecreated', $this->datecreated);
            $this->handlerDB->bind(':numofratings', $this->numofratings);
            $this->handlerDB->bind(':sumofratings', $this->sumofratings);
            $this->handlerDB->execute();
        }
}