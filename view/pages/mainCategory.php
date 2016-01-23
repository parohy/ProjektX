<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
?>

<link rel="stylesheet" type="text/css" href="libraries/css/categories.css">

<?php	
	include ($path . 'view/pages/sortingTable.php');
?>

<div class="product-display">

<?php
	include ($path . 'controllers/displayCategory.php');
?>

</div>