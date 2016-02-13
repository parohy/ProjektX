/*
* Created by
* User: Peter Varholak
* Date: 23. 1. 2016
*/

function filterSearch()
{
	var minCost = $('#pricehand1').html();
	var maxCost = $('#pricehand2').html();

	var sortType = $('#sorting option:selected').val();

	var brands = "";
	$('.BrandSelect input:checked').each(function() {
		brands += "&brands%5B%5D=" + $(this).val();
	});

	var url = window.location.href
    url = url.split("&");
    url = url[0] + "&" + url[1];

	window.location.replace(url + "&minCost=" + minCost + "&maxCost=" + maxCost + "&sortType=" + sortType + brands);
}