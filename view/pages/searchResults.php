<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';

include_once ($path . 'API/Filter.php');
include_once ($path . 'controllers/ProductDisplay.php');
include_once ($path . 'controllers/displayCategory.php');
?>
<script src="libraries/js/pageScript.js"></script>


<link rel="stylesheet" type="text/css" href="libraries/css/search-style.css">
<?php
    include ($path . 'view/includes/filter.php');
?>
<!--
<script>
var snapValues = [
	document.getElementById('pricehand1'),
	document.getElementById('pricehand2')
];

Slider.noUiSlider.on('update', function( values, handle ) {
	snapValues[handle].innerHTML = values[handle];
        snapValues[handle].innerHTML = Math.round(snapValues[handle].innerHTML);
});

</script>-->
