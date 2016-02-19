<?php

/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

require_once ("InputRecheck.php");

class SearchModel
{
    private $searchTerm;
    private $handlerDB;
    private $prepare;

    function __construct($searchTerm=null) {
        $this->searchTerm = $searchTerm;
        $this->handlerDB = new DBHandler();
        $this->prepare = new Recheck();
    }

    public  function getResults() { // get results related to search term from database
        $this->searchTerm = $this->prepare->dumpSpecialChars($this->searchTerm);
        $search = $this->searchTerm;

        $this->handlerDB->query("SELECT * FROM products WHERE name LIKE '%".$search."%'");
        $this->handlerDB->bind(':name',$search);

        return $this->handlerDB->resultSet();
    }

    public function foundResults($results) { // Find out if query retuned some results
        $temp = sizeof($results);

        if($temp > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getSpecificResults($table, $term){
        $query = 'SELECT * FROM '.$table.' WHERE ';

        $next = false;
        $i=0;
        $namesIndex = array();
        if(isset($term['name'])){
            $query .= "name LIKE %".$term['name']."%";
            $next = true;
            $namesIndex[$i++] = 'name';
        }
        if(isset($term['surname'])){
            if($next){
                $query .= ' and ';
            }
            $query .= 'surname LIKE '.$term['surname'];
            $next = true;
            $namesIndex[$i++] = 'surname';
        }
        if(isset($term['email'])){
            if($next){
                $query .= ' and ';
            }
            $query .= 'email=:email';
            $namesIndex[$i++] = 'email';
        }

        echo $query . '<br>';
        $this->handlerDB->query($query);
        $max = count($namesIndex);
        /*for($i = 0; $i < $max; $i++){
            $this->handlerDB->bind(':'.$namesIndex[$i],$term[$namesIndex[$i]]);
        }*/
        if(isset($term['email'])){
            $this->handlerDB->bind(':email',$term['email']);
        }


        return $this->handlerDB->resultSet();
    }
    /*
    public function productIdArray($results) { // change result array to productId array
        $size = sizeof($results);

        $array = array();
        for($i = 0; $i < $size; $i++)
        {
            array_push($array,$results[$i]['productid']);
        }
        
        return $array;
    }*/
}