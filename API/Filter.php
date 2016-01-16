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
        switch ($this->criteria) {
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
        $categoryquery="";
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
       $brandquery="";
       if(count($this->brand>=1)){
            $brands=$this->brand;
        }
        else{
            $this->handlerDB->query("SELECT brandid FROM brands");
            $brands = $this->handlerDB->resultSet();
        }
        foreach($brands as $id)
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
        $this->handlerDB->bind(':categoryquery', categoryQuery());
        $this->handlerDB->bind(':brandquery', brandQuery());
        $this->handlerDB->bind(':sortquery', sortQuery());
        $results = $this->handlerDB->resultSet();
        $this->handlerDB->execute();
        return $results;
    }   
}
