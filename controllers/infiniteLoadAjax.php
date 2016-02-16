<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Product.php');
include_once ($path . 'API/Filter.php');
include_once ($path.'controllers/ProductDisplay.php');
$load = htmlentities(strip_tags($_POST['load'])) * 4;
$sort = htmlentities(strip_tags($_POST['sort']));

$tempProduct = new Product();
$filter = new Filter();
$display = new ProductDisplay();

if($tempProduct != NULL)
{
    switch ($sort) {
        case 0:
            $sort = 5;
            break;
        case 1:
            $sort = 0;
            break;
        case 2:
            $sort = 2;
            break;
        default:
            $sort = 0;
            break;
    }

    $filter->criteria = $filter->availableCriteria[$sort];
    $results = $filter->getResults();

	$productsId = $tempProduct->getProductsId();
	$max = 4;

	if((($tempProduct->getTotalProducts() - $tempProduct->getTotalArchived()) - $load) < $max)
	{
    	$max = ($tempProduct->getTotalProducts() - $tempProduct->getTotalArchived()) - $load;
    }

	echo '<div class="row">';
    for($i=0;$i<$max;$i++)
    {
        echo $display->displayProduct($results[$i + $load]);
    }
    echo '</div>';
}
?>