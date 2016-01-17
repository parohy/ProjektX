<?php
/*
* Created by
* User: Peter Varholak
* Date: 17. 1. 2016
*/
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include_once ('API/Filter.php');
include_once ('controllers/ProductDisplay.php');

$filter = new Filter();
$display = new ProductDisplay();

$filter->category = $_GET['catid'];
$filter->maxprice = 99999;
$results = $filter->getResults();

$display->displayResults($result);