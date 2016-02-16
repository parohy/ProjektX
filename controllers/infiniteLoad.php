<?php
/**
 * Created by: Peter Varholak
 * Date: 17. 1. 2016
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Product.php');
include_once ($path.'controllers/ProductDisplay.php');

$tempProduct = new Product(); 
$total = $tempProduct->getTotalProducts();?>

<script>
var load = 0;
var currentTab = 0;
var max = "<?php echo $total;?>";

$(window).ready(function()
{
    enableLoad();
}); 

function enableLoad()
{
	loadProducts();
	loadProducts();
}

function loadProducts()
{
	if(load * 4 > max)
	{
		$(".loadMore").hide();
		$(".messages").html("Back to Top");
		adjustThumbnail();
	}
	else
	{
		$.post("controllers/infiniteLoadAjax.php",{load:load, sort:currentTab},function(data){
			$('.activeTab').append(data);
			$(".thumbnailImage").one('load', function() {
		        adjustOneThumbnail($(this));       
		    });
		});
		load++;				
	}
}

$('.messages').click(function(){
	$('html, body').animate({scrollTop : 0},600);
	return false;
});

function adjustThumbnail()
{
    $(".thumbnailImage").each(function(){
        adjustOneThumbnail($(this));
    });
}

function adjustOneThumbnail(img)
{
    var maxWidth = img.parent().parent().width();
    var maxHeight = img.parent().parent().height();

    var ratio;
    var width = img.width();
    var height = img.height();

    ratio = maxWidth / width;
    img.css("width", maxWidth);
    img.css("height", height * ratio);
    height *= ratio;
    width *= ratio;

    if(height > maxHeight){
        ratio = maxHeight / height;
        img.css("height", maxHeight);
        img.css("width", width * ratio);
        height *= ratio;
        width *= ratio;
    }

    var marginTop = ((maxHeight) - height) / 2;
    var marginLeft = ((maxWidth) - width) / 2;
    img.css({"margin-top":marginTop+"px","margin-left":marginLeft+"px"});
    img.removeClass("notLoaded");
}
</script>
<script src="libraries/js/cart.js"></script>
