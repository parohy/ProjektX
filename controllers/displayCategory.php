<?php
/*
* Created by
* User: Peter Varholak
* Date: 17. 1. 2016
*/

include_once ('API/Filter.php');
include_once ('controllers/ProductDisplay.php');

$filter = new Filter();
$display = new ProductDisplay();

$filter->category = $_GET['catid'];
$filter->maxprice = 99999;
$results = $filter->getResults();
echo '<div class="row">';
echo $display->displayProduct($results[0]['productid']);
echo '</div>';
?>