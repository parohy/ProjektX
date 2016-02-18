<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 18. 2. 2016
 * Time: 19:05
 */
?>
<link rel="stylesheet" type="text/css" href="libraries/css/nouislider.fox.css">
<script type="text/javascript" src="libraries/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="libraries/js/nouislider.js"></script>
<script type="text/javascript">
    var Slider = document.getElementById('noUiSlider');
    var ceiling = "<?php echo $ceilingPrice;?>";
    var minPriceChosen = "<?php echo $minPriceChosen;?>";
    var maxPriceChosen = "<?php echo $maxPriceChosen;?>";

    noUiSlider.create(Slider, {
        start: [ minPriceChosen, maxPriceChosen ],
        range: {
            'min': [  0 ],
            'max': [ parseInt(ceiling) ]
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
