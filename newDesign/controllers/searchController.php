<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

            $size = calculateSize($res['productid']);
            $margin = array(2);
            $margin[0] = (278 - $size[0]) / 2;
            $margin[1] = (300 - $size[1]) / 2;

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

function calculateSize($productid) {
    $newH = 300;
    $newW = 278;

    $oldSize = getimagesize('libraries/img/products/' . $productid . '/' . $productid . 'a.jpg');

    $oldW = $oldSize[0];
    $oldH = $oldSize[1];

    if($oldW > $oldH) {
        $finalW = $newW;
        $finalH = $oldH * ($newH / $oldW);
    }

    if($oldW < $oldH) {
        $finalW = $oldW * ($newW / $oldH);
        $finalH = $newH;
    }

    if($oldW == $oldH) {
        $finalW = $newW;
        $finalH = $newH;
    }

    $size = array(2);
    $size[0] = $finalW;
    $size[1] = $finalH;
    return $size;
}