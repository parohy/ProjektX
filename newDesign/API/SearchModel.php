<?php

/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

require(ROOT . "API/Database.php");
require(ROOT . "API/InputRecheck.php");

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

    public  function getResults() {
        $this->searchTerm = $this->prepare->dumpSpecialChars($this->searchTerm);
        $search = '%' . $this->searchTerm . '%';

        $this->handlerDB->query("SELECT * FROM products WHERE name LIKE :name OR brand LIKE :brand");
        $this->handlerDB->bind(':name',$search);
        $this->handlerDB->bind(':brand',$search);

        return $this->handlerDB->resultSet();
    }

    private function foundResults($results) {
        $temp = sizeof($results);

        if($temp > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function displayResults($searchResult) {

        if($this->foundResults($searchResult)) {
            echo "<div class=\"tab-content\">
                 <div class=\"bottom-tab-content\">";

            foreach($searchResult as $res) {
                echo "
                  <div class=\"product-item  first-row\">
                  <div class=\"product-photo\">
                  </div>

                  <div class=\"product-description\">
                  <hr class=\"product-line\">
                  <h3 class=\"product-name\">" . $res['name'] . "</h3>
                  <span class=\"price\">$299.0</span>
                  <a href=\"#\" class=\"addToCart\">Add to Cart</a>
                  </div>";
            }

            echo "</div>
                  </div>";
        } else {
            echo "No results found";
        }
    }
}