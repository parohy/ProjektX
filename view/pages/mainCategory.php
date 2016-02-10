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
<link rel="stylesheet" type="text/css" href="libraries/css/search-style.css">
<link rel="stylesheet" type="text/css" href="libraries/css/nouislider.fox.css">
<script type="text/javascript" src="libraries/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="libraries/js/nouislider.js"></script>




<div class="product-display">

<?php
	include ($path . 'controllers/displayCategory.php');
?>
    
<script src="libraries/js/jquery.nouislider.js"></script>
<script type="text/javascript">
    var Slider = document.getElementById('noUiSlider');

    noUiSlider.create(Slider, {
            start: [ 400, 1600 ],
            range: {
                    'min': [  0 ],
                    'max': [ 2000 ]
            },
            connect: true
    });
</script>
<script>
var snapValues = [
	document.getElementById('pricehand1'),
	document.getElementById('pricehand2')
];

Slider.noUiSlider.on('update', function( values, handle ) {
	snapValues[handle].innerHTML = values[handle];
        snapValues[handle].innerHTML = Math.round(snapValues[handle].innerHTML);
});

</script>
<script>
    $('.MoreBrands').click(function() {
    $('.AddBrandsWindow').css({
        'visibility': 'visible'
        
    });
});

$('.AddBrandsWindowClose').click(function() {
    $('.AddBrandsWindow').css({
        'visibility': 'hidden'
        
    });
});
</script>
</div>