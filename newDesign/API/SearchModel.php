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

    function __construct($searchTerm) {
        $this->searchTerm = $searchTerm;
        $this->handlerDB = new DBHandler();
        $this->prepare = new Recheck();
    }

    public  function getResults() { // get results related to search term from database
        $this->searchTerm = $this->prepare->dumpSpecialChars($this->searchTerm);
        $search = '%' . $this->searchTerm . '%';

        $this->handlerDB->query("SELECT * FROM products WHERE name LIKE :name OR brand LIKE :brand");
        $this->handlerDB->bind(':name',$search);
        $this->handlerDB->bind(':brand',$search);

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
}