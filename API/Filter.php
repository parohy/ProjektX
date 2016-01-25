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
    
    
    /**
     * Creates Filter handler and sets default values
     */
    public function __construct(){
        $this->handlerDB = new DBHandler();
        $this->handlerDB->query('SELECT MAX(price) as "max" FROM products');
        $result = $this->handlerDB->resultSet();
        $this->maxprice=$result[0]['max'];
    }
    
    /**
     * Prepares part of query needed for sorting results
     * Sorts by "Rating" on default
     * change $this->criteria in order to change criteria
     * check for available criteria in line 14
     * This function is called in the function getResults();
     */
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
    
    /**
     * Prepares part of query needed for category filtering
     * category is "1"(ELECTRONICS) on default
     * change $this->category in order to change target category
     * check for available categories in the categories table
     * This function is called in the function getResults();
     */
    public function categoryQuery() {
        $cat=new Category($this->category);
        $categoryquery="";
        if(count($cat->alldescendants)>0){
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
        }
        else{
            $categoryquery="(categoryid=".$this->category.")";
        }
        return $categoryquery;
    }
    
    /**
     * Prepares part of query needed for brand filtering
     * selects all brands on default
     * add brands to $this->brand in order to filter by brands
     * check for available brands in the brands table
     * This function is called in the function getResults();
     */
    private function brandQuery() {
       $brandquery="";
       $brands=array();
       if(count($this->brand)>=1){
            $brands=$this->brand;
        }
        else{
            $this->handlerDB->query("SELECT brandid FROM brands");
            $results = $this->handlerDB->resultSet();
            foreach($results as $result){
                $brands[]=$result['brandid'];
            }
        }
        foreach($brands as $id){
                 if($brandquery!=""){
                     $brandquery.=", ".$id;
                 }
                 else{
                     $brandquery.="(brandid IN (".$id;
                 }
             } 
             $brandquery.="))";
             return $brandquery;
    }
    
    /**
     * Gets results from a database as an array of productids of products from the table
     * change $this->minprice and $this->max price in order to set the price range
     * results are filtered, sorted and ready to use
     */
    public function getResults() {
        $catQuery=$this->categoryQuery();
        $brandQuery=$this->brandQuery();
        $sortQuery=$this->sortQuery();
        $this->handlerDB->query("SELECT productid FROM products WHERE price>=:minprice and price<=:maxprice and ".$catQuery." and ".$brandQuery." ORDER BY ".$sortQuery."");
        $this->handlerDB->bind(':maxprice', $this->maxprice);
        $this->handlerDB->bind(':minprice', $this->minprice);
        $results = $this->handlerDB->resultSet();
        $this->handlerDB->execute();   
        $array=array();
        foreach($results as $result){
            $array[]=$result['productid'];
        }
        return $array;
    }   
}
