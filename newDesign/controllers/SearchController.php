<?php

/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 5. 12. 2015
 * Time: 20:19
 */

require (ROOT . "API/Database.php");
require (ROOT . "API/InputRecheck.php");

class SearchController
{
    private $searchTerm;
    private $handlerDB;
    private $prepare;

    function __construct($searchTerm) {
        $this->searchTerm = $searchTerm;
        $this->handlerDB = new DBHandler();
        $this->prepare = new Recheck();
    }

    private function getResults() {
        $this->searchTerm = $this->prepare->dumpSpecialChars($this->searchTerm);
        $search = '%' . $this->searchTerm . '%';

        $this->handlerDB->query("SELECT * FROM products WHERE name LIKE :name OR brand LIKE :brand");
        $this->handlerDB->bind(':name',$search);
        $this->handlerDB->bind(':brand',$search);

        return $this->handlerDB->resultSet();
    }

    public function displayResults() {
        $searchResult = $this->getResult();

        if($searchResult > 0) {
            echo "Results found";
        } else {
            echo "No results found";
        }
    }
}