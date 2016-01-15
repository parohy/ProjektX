$(document).ready(function()
{
	$(".order-button").click(function () 
	{
		if(checkFields())
		{
			$("#checkoutForm").submit();
		}		
	});
});

function checkFields()
{
	var nameTest = /^[A-Za-z]{2,50}$/;
	var surnameTest = /^[A-Za-z]{2,50}$/;
	var emailTest = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
	var phoneTest = /^[0-9-()+]{5,20}$/;
	var addressTest = /^([A-Z]*[a-z]+)( [A-Z]*[a-z]+)* \d+$/;
	var cityTest = /^([A-Z]*[a-z]+)( [A-Z]*[a-z]+)*$/;
	var pscTest = /^[0-9]{5}$/;

	var incomplete = false;
	var invalid = "";

	$("#checkoutNameError").html("");
	$("#checkoutSurnameError").html("");
	$("#checkoutEmailError").html("");
	$("#checkoutPhoneError").html("");
	$("#checkoutAddressError").html("");
	$("#checkoutCityError").html("");
	$("#checkoutPscError").html("");
	$("#errorMessage").html("");

	var name = $.trim($("#checkoutName").val());
	if(name)
	{
		if(!nameTest.test(name) && invalid === "")
		{
			invalid = "Invalid name format";
			$("#checkoutNameError").html("*");
		}
	}
	else
	{
		$("#checkoutNameError").html("*");
		incomplete = true;
	}

	var surname = $.trim($("#checkoutSurname").val());
	if(surname)
	{
		if(!surnameTest.test(surname) && invalid === "")
		{
			invalid = "Invalid surname format";
			$("#checkoutSurnameError").html("*");
		}
	}
	else
	{
		$("#checkoutSurnameError").html("*");
		incomplete = true;
	}

	var email = $.trim($("#checkoutEmail").val());
	if(email)
	{
		if(!emailTest.test(email) && invalid === "")
		{
			invalid = "Invalid email format";
			$("#checkoutEmailError").html("*");
		}
	}
	else
	{
		$("#checkoutEmailError").html("*");
		incomplete = true;
	}

	var phone = $.trim($("#checkoutPhone").val().replace(/\s+/g, ''));
	if(phone)
	{
		if(!phoneTest.test(phone) && invalid === "")
		{
			invalid = "Invalid phone number format";
			$("#checkoutPhoneError").html("*");
		}
	}
	else
	{
		$("#checkoutPhoneError").html("*");
		incomplete = true;
	}

	var address = $.trim($("#checkoutAddress").val());
	if(address)
	{
		if(!addressTest.test(address) && invalid === "")
		{
			invalid = "Invalid address format";
			$("#checkoutAddressError").html("*");
		}
	}
	else
	{
		$("#checkoutAddressError").html("*");
		incomplete = true;
	}

	var city = $.trim($("#checkoutCity").val());
	if(city)
	{
		if(!cityTest.test(city) && invalid === "")
		{
			invalid = "Invalid city format";
			$("#checkoutCityError").html("*");
		}
	}
	else
	{
		$("#checkoutCityError").html("*");
		incomplete = true;
	}

	var psc = $.trim($("#checkoutPsc").val().replace(/\s+/g, ''));
	if(psc)
	{
		if(!pscTest.test(psc) && invalid === "")
		{
			invalid = "Invalid postcode format";
			$("#checkoutPscError").html("*");
		}
	}
	else
	{
		$("#checkoutPscError").html("*");
		incomplete = true;
	}

	if(incomplete)
	{
		$("#errorMessage").html("* All fields are required");
		return false;
	}
	if(invalid !== "")
	{
		$("#errorMessage").html("* " + invalid);
	}
	else
	{
		return true;
	}	
}