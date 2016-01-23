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
        public $alldescendants=array();

	/**
	 * Creates an CategoryHandler instance with optional $id parameter
	 * @author Matus Kokoska
	 */
        
        public function __construct($id=null){
            $this->handlerDB = new DBHandler();
            $this->id=$id;
            if($this->id!=null){
                $this->getDescendants($this->id);
            }
            $this->load();
            
	}

	/**
	 * If $id is set, loads existing Category. 
	 * @author Matus Kokoska
	 */
        
        public function load() {
            if($this->id != null){
                $this->handlerDB->query("SELECT * FROM categories WHERE categoryid=:id");
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
        
        public function getDescendants($id) {
            $this->handlerDB->query("SELECT categoryid FROM categories WHERE parent=:id");
            $this->handlerDB->bind(":id", $id);
            $categories = $this->handlerDB->resultSet();
            if(count($categories>=1)){
                    foreach($categories as $cat){
                    $this->alldescendants[]=$cat['categoryid'];

                    $this->getDescendants($cat['categoryid']);
                }
            }
        }

        private function getAllCategories(){
            $this->handlerDB->query("SELECT * FROM categories");
            return $this->handlerDB->resultSet();
        }

        public function createSubs(){
             $arrayOfSubs = array();
             $categories = $this->getAllCategories();
             for($i=0;$i<count($categories);$i++){
                 $arrayOfSubs[$i] = NULL;
             }
             foreach($categories as $tempCat){
             if($tempCat['parent'] > 1){
                if($arrayOfSubs[$tempCat['parent']] == NULL){
                    $arrayOfSubs[$tempCat['parent']] = array();
                }
                 $arrayOfSubs[$tempCat['parent']][] = $tempCat;
             }
        }
        return $arrayOfSubs;
    }

        public function getCategories(){
        	$this->handlerDB->query('SELECT * FROM categories');
        	$result = $this->handlerDB->resultSet();
        	$categories = array();
        	
        	$i = 0;
        	foreach($result as $res) { // GET MAIN CATEGORIES
        		if($res['parent'] == 1) {
        			$categories[$i]['id'] = $res['categoryid'];
        			$categories[$i]['category'] = $res['name'];
        			$categories[$i]['parent'] = $res['parent'];
        			$i++;
        		}
        	}
        	
        	
        	for($i = 0; $i < sizeof($categories); $i++) { // GET SUBCATEGORIES
        		$k = 0;
        		for($j = 0; $j < sizeof($result); $j++) {
        			if($result[$j]['parent'] == $categories[$i]['id']) {
        				$categories[$i]['subcategory'][$k]['id'] = $result[$j]['categoryid'];
        				$categories[$i]['subcategory'][$k]['name'] = $result[$j]['name'];
        				$categories[$i]['subcategory'][$k]['parent'] = $result[$j]['parent'];
        				$categories[$i]['subcategory'][$k]['subcategory'] = array();
        				$k++;
        			}
        		}
        	}
        	return $categories;
        }
}
