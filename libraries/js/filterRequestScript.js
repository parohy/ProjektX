/*
* Created by
* User: Peter Varholak
* Date: 23. 1. 2016
*/

function filterSearch()
{
	var minCost, maxCost;
	if (typeof $('input[name=price]:checked', '#priceRangeForm').val() === "undefined")
	{
		minCost = 0;
		maxCost = 0;
	}
	else
	{
		if($('input[name=price]:checked', '#priceRangeForm').val() === "custom")
		{
			minCost = $('input[name=min-custom]', '#priceRangeForm').val();
			if(minCost === null || minCost === "" || minCost < 0)
			{
				minCost = 0;
			}
			maxCost = $('input[name=max-custom]', '#priceRangeForm').val();
			if(maxCost === null || maxCost === "" || maxCost < minCost)
			{
				maxCost = 0;
			}
		}
		else
		{
			minCost = $('input[name=price]:checked', '#priceRangeForm').data("min");
			maxCost = $('input[name=price]:checked', '#priceRangeForm').data("max");
		}
	}	

	if (typeof $('input[name=sort]:checked', '#sortForm').val() === "undefined")
	{
		var sortType = 0;
	}
	else
	{
		var sortType = $('input[name=sort]:checked', '#sortForm').val()
	}

	var brands = "";
	$('#brandsForm input:checked').each(function() {
		brands += "&brands%5B%5D=" + $(this).val();
	    //brands.push($(this).val());
	});

	var url = window.location.href
    url = url.split("&");
    url = url[0] + "&" + url[1];

	window.location.replace(url + "&minCost=" + minCost + "&maxCost=" + maxCost + "&sortType=" + sortType + brands);
}