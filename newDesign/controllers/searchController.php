<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

if(session_status() == PHP_SESSION_NONE) { // start session if it doesnt exist
    session_start();
}

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/newDesign/';
include_once ($path.'config.php');
include (ROOT .'API/SearchModel.php');
include (ROOT. 'API/ImageScaling.php');

if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    $search = new SearchModel($searchTerm);
    $results = $search->getResults();

    if($search->foundResults($results)) { // if results were found send them trough session variable
        $_SESSION['results'] = $results;
    }
    else { // else send message results not found
        $_SESSION['noresults'] = "Results not found";
    }

    header('Location:../?page=searchResults'); // redirect to search results page
    exit();
}

function displayResults($searchResult) { // Display results on page

        echo "<div class=\"tab-content\">
                 <div class=\"bottom-tab-content\">";

        $scaling = new ImageScaling();
        foreach($searchResult as $res) {

            $size = $scaling->productItemTumbnail($res['productid']); // get scaled size of image to fit tumbnail
            $margin = $scaling->productItemTumbnailMargin($size); // calculate margin after scale to center it in thumbnail

            echo "
                  <div class=\"product-item  first-row\">
                        <div class=\"product-photo\">
                            <img src=\"libraries/img/products/" . $res['productid'] . "/" . $res['productid'] . "a.jpg\" width=\"" . $size[0] . "\" height=\"" . $size[1] . "\" style=\"margin:" . $margin[1] . "px " . $margin[0] . "px;\" alt=\"product photo\">
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