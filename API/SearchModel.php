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
        $query = 'SELECT * FROM '.$table;

        $next = false;
        if(isset($term['name'])){
            $query .= " WHERE name LIKE '%".$term['name']."%'";
            $next = true;
        }
        if(isset($term['surname'])){
            if($next){
                $query .= ' and ';
            }
            else{
                $query .= ' WHERE ';
            }
            $query .= "surname LIKE '%".$term['surname']."%'";
            $next = true;
        }
        if(isset($term['email'])){
            if($next){
                $query .= ' and ';
            }
            else{
                $query .= ' WHERE ';
            }
            $query .= 'email=:email';
        }

        echo $query . '<br>';
        $this->handlerDB->query($query);
        if(isset($term['email'])){
            $this->handlerDB->bind(':email',$term['email']);
        }


        return $this->handlerDB->resultSet();
    }
}