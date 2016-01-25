<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Product.php');
include_once ($path.'controllers/ProductDisplay.php');
$load = htmlentities(strip_tags($_POST['load'])) * 4;

$tempProduct = new Product();
$display = new ProductDisplay();

if($tempProduct != NULL)
{
	$productsId = $tempProduct->getProductsId();
	$max = 4;

	if(($tempProduct->getTotalProducts() - $load) < $max)
	{
    	$max = $tempProduct->getTotalProducts() - $load;
    }

	echo '<div class="row">';
    for($i=0;$i<$max;$i++)
    {
    	echo $display->displayProduct($productsId[$i + $load]['productid']);
    }
    echo '</div>';
}
?>