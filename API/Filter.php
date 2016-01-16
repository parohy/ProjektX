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
        $this->handlerDB->query('SELECT MAX(price) as "max" FROM products');
        $result = $this->handlerDB->resultSet();
        $this->maxprice=$result[0]['max'];
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
    
    public function categoryQuery() {
        $cat=new Category($this->category);
        $categoryquery="";
        foreach($cat->alldescendants as $id)
        {
            if($categoryquery!=""){
                $categoryquery.=", ".$id;
            }
            else{
                $categoryquery="(categoryid IN (".$id;
            }
        }
        $categoryquery.="))";
        return $categoryquery;
    }
    
    private function brandQuery() {
       $brandquery="";
       $brands=array();
       if(count($this->brand)>=1){
            $brands=$this->brand;
        }
        else{
            echo "pizza";
            $this->handlerDB->query("SELECT brandid FROM brands");
            $brands = $this->handlerDB->resultSet();
        }
        foreach($brands as $id)
             {
                 if($brandquery!=""){
                     $brandquery.=", ".$id['brandid'];
                 }
                 else{
                     $brandquery.="(brandid IN (".$id['brandid'];
                 }
             } 
             $brandquery.="))";
             return $brandquery;
    }
    
    public function getResults() {
        $catQuery=$this->categoryQuery();
        $brandQuery=$this->brandQuery();
        $sortQuery=$this->sortQuery();
        $this->handlerDB->query("SELECT productid FROM products WHERE price>=:minprice and price<=:maxprice and ".$catQuery." and ".$brandQuery." ORDER BY ".$sortQuery."");
        $this->handlerDB->bind(':maxprice', $this->maxprice);
        $this->handlerDB->bind(':minprice', $this->minprice);
        $results = $this->handlerDB->resultSet();
        $this->handlerDB->execute();
        return $results;
    }   
}
