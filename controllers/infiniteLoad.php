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
?>
<script>
	$(document).ready(function(){
		var load = 2;
		var max = "<?php echo $total;?>";

		$(window).scroll(function(){
			if($(window).scrollTop() == $(document).height() - $(window).height())
			{
				if(load * 4 > max)
				{
					$(".messages").html("Back to Top");
				}
				else
				{
					$.post("controllers/infiniteLoadAjax.php",{load:load},function(data){
						$('.activeTab').append(data);
						adjustThumbnail();
					});
					load++;
				}
			}
		});

		function adjustThumbnail()
		{
		    $(".thumbnailImage").each(function(){
		        var maxWidth = $(".product-photo").width() - 20;
		        var maxHeight = $(".product-photo").height() - 20;

		        var ratio;
		        var width = $(this).width();
		        var height = $(this).height();

		        ratio = maxWidth / width;
		        $(this).css("width", maxWidth);
		        $(this).css("height", height * ratio);
		        height *= ratio;
		        width *= ratio;

		        if(height > maxHeight){
		            ratio = maxHeight / height;
		            $(this).css("height", maxHeight);
		            $(this).css("width", width * ratio);
		            height *= ratio;
		            width *= ratio;
		        }

		        var marginTop = ((maxHeight+20) - height) / 2;
		        var marginLeft = ((maxWidth+20) - width) / 2;
		        $(this).css({"margin-top":marginTop+"px","margin-left":marginLeft+"px"});
		    });
		}
	});
</script>