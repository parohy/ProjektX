/*
* Created by
* User: Peter Varholak
* Date: 23. 1. 2016
*/

function filterSearch()
{
	//price
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

	var brands = [];
	$('#brandsForm input:checked').each(function() {
	    brands.push($(this).val());
	});

	alert(minCost);

	var request = $.ajax({
		url: "controllers/displayCategory.php",
		type: "GET",
		data: { "minCost": minCost, "maxCost": maxCost, "sortType": sortType, "brands[]": brands },
		success: function(data){
		    alert("data");
		},
		error: function (xhr, ajaxOptions, thrownError) {
	        alert("Error: " + xhr.responseText + " " + ajaxOptions.responseText + " " + thrownError.responseText);
	    }
	});

	/*$.get("controllers/displayCategory.php", { "minCost": minCost, 
											   "maxCost": maxCost, 
											   "sortType": sortType, 
											   "brands[]": brands });*/
}