<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */
?>
<link rel="stylesheet" type="text/css" href="libraries/css/categories.css">
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include ($path . 'view/pages/sortingTable.php');
?>
<div class="product-display">
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include ($path . 'controllers/displayCategory.php');
?>
</div>
