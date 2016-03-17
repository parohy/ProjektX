<?php
/*
* Created by
* User: Peter Varholak
* Date: 17. 1. 2016
*/
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';

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
$ceilingPrice = $filter->getMaxPrice();

$brandsChosen = null;
$minPriceChosen = 0;
$maxPriceChosen = $ceilingPrice;
$sortChosen = $filter->availableCriteria[0];

if(isset($_GET['name']))
{
	$filter->name = $_GET['name'];
}
if(isset($_GET['brands']))
{
	$brandsChosen = $_GET['brands'];
	$filter->brand = $brandsChosen;
}
if(isset($_GET['minCost']))
{
	$minPriceChosen = $_GET['minCost'];
	$filter->minprice = $minPriceChosen;
}
if(isset($_GET['maxCost']) && $_GET['maxCost'] != 0)
{
	$maxPriceChosen = $_GET['maxCost'];
	$filter->maxprice = $maxPriceChosen;
}
if(isset($_GET['sortType']))
{
	$sortChosen = $_GET['sortType'];
	$filter->criteria = $filter->availableCriteria[$sortChosen];
}

$results = $filter->getResults();
$display->displayResults($results, 4, $brands, $sortChosen, $brandsChosen);
