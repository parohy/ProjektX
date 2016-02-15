<?php
/*
* Created by
* User: Peter Varholak
* Date: 17. 1. 2016
*/
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';

include_once ($path . 'API/Filter.php');
include_once ($path . 'controllers/ProductDisplay.php');

$filter = new Filter();
$display = new ProductDisplay();

if(isset($_GET['catid']))
{
	$filter->category = $_GET['catid'];
}

$results = $filter->getResults();
$filter->productArray = $results;
$brands = $filter->getBrands();

if(isset($_GET['minCost']))
{
	$filter->minprice = $_GET['minCost'];
}
if(isset($_GET['maxCost']) && $_GET['maxCost'] != 0)
{
	$filter->maxprice = $_GET['maxCost'];
}
if(isset($_GET['sortType']))
{
	$filter->criteria = $filter->availableCriteria[$_GET['sortType']];
}
if(isset($_GET['brands']))
{
	$filter->brand = $_GET['brands'];
}

$results = $filter->getResults();
$display->displayResults($results, 4, $brands);
?>