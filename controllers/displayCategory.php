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

echo $_GET['minCost'];
$filter->category = $_GET['catid'];
$results = $filter->getResults();
$display->displayResults($results, 3);
?>