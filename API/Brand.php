<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 3. 12. 2015
 * Time: 19:00
 */

include_once ('Database.php');

class Brand{

	public $id;
	private $handlerDB;
        public $error=null;
        public $name;

	/**
	 * Creates an BrandHandler instance with optional $id parameter
	 * @author Matus Kokoska
	 */
        
        public function __construct($id=null){
            $this->handlerDB = new DBHandler();
            $this->id=$id;
            $this->load();
	}

	/**
	 * If $id is set, loads existing Brand. 
	 * @author Matus Kokoska
	 */
        
        public function load() {
            if($this->id != null){
                $this->handlerDB->query("SELECT * FROM brands where brandid=:id");
                $this->handlerDB->bind(":id", $this->id);
                $brands = $this->handlerDB->resultSet();
                if (count($brands)==1) {
                    $this->name=$brands[0]['name'];
                }
                else {
                    $error="Brand not found.";
                }
            }
            else {
                $error="Id not set.";
            }
        }
	
        /**
	 * Saves edited properties of brand or creates a new brand if $id is not set
	 * @author Matus Kokoska
	 */
        
        public function save(){
            if($this->id == null){
                $this->handlerDB->query("INSERT INTO brands (name) VALUES (:name)");
            }
            else {
                $this->handlerDB->query("UPDATE brands SET name=:name WHERE brandid=:brandid");
                $this->handlerDB->bind(':brandid', $this->id);
            }
            $this->handlerDB->bind(':name', $this->name);
            $this->handlerDB->execute();
        }
	
        /**
	 * Deletes existing brand
	 * @author Matus Kokoska
	 */
        
        public function delete() {
            if($this->id!=null){
                $this->handlerDB->query("DELETE FROM brands WHERE brandid LIKE '%".$this->id."%'");
            }
            $this->handlerDB->execute();   
        }
        
        public function getAllBrands(){
        	$this->handlerDB->query("SELECT * FROM brands");
        	$result = $this->handlerDB->resultSet();
        	$brands = array();
        	$i = 0;
        	foreach($result as $temp){
        		$brands[$i++] = $temp;
        	}
        	return $result;
        }
}
