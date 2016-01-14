<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 14. 1. 2016
 * Time: 22:00
 */

include_once ('Database.php');
include_once ('Category.php');

class Filter{
    public $availableCriteria = array("Rating","View count","Date added","Price ascending","Price descending","A-Z","Z-A");
    public $criteria="Rating";
    public $minprice=0;
    public $maxprice;
    public $category=1;
    public $brand = array();
    private $handlerDB;
    
    
    public function __construct(){
        $this->handlerDB = new DBHandler();
        $this->handlerDB->query("SELECT MAX(price) FROM products");
        $result = $this->handlerDB->resultSet();
        $this->maxprice=$result[0];
    }
    
    private function sortQuery() {
        switch ($criteria) {
            case "Rating":
                $sortquery="sumofratings/numofratings DESC";
                break;
            case "View count":
                $sortquery="viewcount DESC";
                break;
            case "Date added":
                $sortquery="productid DESC";
                break;
            case "Price ascending":
                $sortquery="price ASC";
                break;
            case "Price descending":
                $sortquery="price DESC";
                break;
            case "A-Z":
                $sortquery="name ASC";
                break;
            case "Z-A":
                $sortquery="name DESC";
                break;
        }
        return $sortquery;
    }
    
    private function categoryQuery() {
        $cat=new Category($this->category);
        foreach($cat->alldescendants as $id)
        {
            if($categoryquery!=""){
                $categoryquery.=" || categoryid=".$id;
            }
            else{
                $categoryquery="(categoryid=".$id;
            }
        }
        $categoryquery.=")";
        return $categoryquery;
    }
    
    private function brandQuery() {
       foreach($brand as $id)
        {
            if($brandquery!=""){
                $brandquery.=" || brandid=".$id;
            }
            else{
                $brandquery="(brandid=".$id;
            }
        } 
        $brandquery.=")";
        return $brandquery;
    }
    
    public function getResults() {
        $this->handlerDB->query("SELECT productid FROM products WHERE price>=:min && price<:max && :categoryquery && :brandquery ORDER BY :sortquery");
        $this->handlerDB->bind(':min', $this->minprice);
        $this->handlerDB->bind(':max', $this->maxprice);
        $this->handlerDB->bind(':categoryquery', $categoryquery);
        $this->handlerDB->bind(':brandquery', $brandquery);
        $this->handlerDB->bind(':sortquery', $sortquery);
        $db->execute();
    }
    
    
    
}

