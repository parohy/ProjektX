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
	var phoneTest = /^[0-9-()+]{8,20}$/;
	var addressTest = /^([A-Z]*[a-z]+)( [A-Z]*[a-z]+)* \d+$/;
	var cityTest = /^([A-Z]*[a-z]+)( [A-Z]*[a-z]+)*$/;
	var pscTest = /^[0-9]{5}$/;

	var incomplete = false;

	$("#checkoutNameError").html("");
	$("#checkoutSurnameError").html("");
	$("#checkoutEmailError").html("");
	$("#checkoutPhoneError").html("");
	$("#checkoutAddressError").html("");
	$("#checkoutCityError").html("");
	$("#checkoutPscError").html("");

	var name = $.trim($("#checkoutName").val());
	if(name)
	{
		if(!nameTest.test(name))
		{
			$("#checkoutNameError").html("Invalid name format");
			incomplete = true;
		}
	}
	else
	{
		$("#checkoutNameError").html("Name is required");
		incomplete = true;
	}

	var surname = $.trim($("#checkoutSurname").val());
	if(surname)
	{
		if(!surnameTest.test(surname))
		{
			$("#checkoutSurnameError").html("Invalid surname format");
			incomplete = true;
		}
	}
	else
	{
		$("#checkoutSurnameError").html("Surname is required");
		incomplete = true;
	}

	var email = $.trim($("#checkoutEmail").val());
	if(email)
	{
		if(!emailTest.test(email))
		{
			$("#checkoutEmailError").html("Invalid email format");
			incomplete = true;
		}
	}
	else
	{
		$("#checkoutEmailError").html("Email is required");
		incomplete = true;
	}

	var phone = $.trim($("#checkoutPhone").val());
	if(phone)
	{
		if(!phoneTest.test(phone))
		{
			$("#checkoutPhoneError").html("Invalid phone number format");
			incomplete = true;
		}
	}
	else
	{
		$("#checkoutPhoneError").html("Phone number is required");
		incomplete = true;
	}

	var address = $("#checkoutAddress").val();
	if(address)
	{
		if(!addressTest.test(address))
		{
			$("#checkoutAddressError").html("Invalid address format");
			incomplete = true;
		}
	}
	else
	{
		$("#checkoutAddressError").html("Address is required");
		incomplete = true;
	}

	var city = $("#checkoutCity").val();
	if(city)
	{
		if(!cityTest.test(city))
		{
			$("#checkoutCityError").html("Invalid city format");
			incomplete = true;
		}
	}
	else
	{
		$("#checkoutCityError").html("City is required");
		incomplete = true;
	}

	var psc = $.trim($("#checkoutPsc").val());
	if(psc)
	{
		if(!pscTest.test(psc))
		{
			$("#checkoutPscError").html("Invalid postcode format");
			incomplete = true;
		}
	}
	else
	{
		$("#checkoutPscError").html("Postcode is required");
		incomplete = true;
	}

	if(incomplete)
	{
		return false;
	}
	else
	{
		return true;
	}	
}