<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 3. 12. 2015
 * Time: 19:00
 */

include_once ('Database.php');

class Category{

	public $id;
	private $handlerDB;
        public $error=null;
        public $name;
        public $parent;

	/**
	 * Creates an CategoryHandler instance with optional $id parameter
	 * @author Matus Kokoska
	 */
        
        public function __construct($id=null){
            $this->handlerDB = new DBHandler();
            $this->id=$id;
            $this->load();
	}

	/**
	 * If $id is set, loads existing Category. 
	 * @author Matus Kokoska
	 */
        
        public function load() {
            if($this->id != null){
                $this->handlerDB->query("SELECT * FROM categories where categoryid=:id");
                $this->handlerDB->bind(":id", $this->id);
                $categories = $this->handlerDB->resultSet();
                if (count($categories)==1) {
                    $this->name=$categories[0]['name'];
                    $this->parent=$categories[0]['parent'];
                }
                else {
                    $error="Category not found.";
                }
            }
            else {
                $error="Id not set.";
            }
        }
	
        /**
	 * Saves edited properties of category or creates a new category if $id is not set
	 * @author Matus Kokoska
	 */
        
        public function save(){
            if($this->id == null){
                $this->handlerDB->query("INSERT INTO categories (name, parent) VALUES (:name, :parent)");
            }
            else {
                $this->handlerDB->query("UPDATE categories SET name=:name, parent=:parent WHERE categoryid=:categoryid");
                $this->handlerDB->bind(':categoryid', $this->id);
            }
            $this->handlerDB->bind(':name', $this->name);
            $this->handlerDB->bind(':parent', $this->parent);
            $this->handlerDB->execute();
        }
	
        /**
	 * Deletes existing category
	 * @author Matus Kokoska
	 */
        
        public function delete() {
            if($this->id!=null){
                $this->handlerDB->query("DELETE FROM categories WHERE categoryid LIKE '%".$this->id."%'");
            }
            $this->handlerDB->execute();   
        }
}
