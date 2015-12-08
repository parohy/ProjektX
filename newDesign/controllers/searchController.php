<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/newDesign/';
include_once ($path.'config.php');
include (ROOT .'API/SearchModel.php');

if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    $search = new SearchModel($searchTerm);
    $results = $search->getResults();

    if($search->foundResults($results)) {
        $_SESSION['results'] = $results;
    }

    header('Location:../?page=searchResults');
    exit();
}

function displayResults($searchResult) {

        echo "<div class=\"tab-content\">
                 <div class=\"bottom-tab-content\">";

        foreach($searchResult as $res) {
            echo "
                  <div class=\"product-item  first-row\">
                        <div class=\"product-photo\">
                        </div>

                        <div class=\"product-description\">
                            <hr class=\"product-line\">
                            <h3 class=\"product-name\">" . substr($res['name'],0,21) . "</h3>
                            <span class=\"price\">$299.0</span>
                            <a href=\"#\" class=\"addToCart\">Add to Cart</a>
                        </div>
                  </div>
                 ";
        }

        echo "</div>";
}