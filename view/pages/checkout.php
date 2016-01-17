<?php
/*
* Created by
* User: Peter Varholak
* Date: 5. 1. 2016
* Autofill: Tomas Paronai
*/
include_once ('API/UserHandler.php');

$name = $surname = $email = $phone = $address = $city = $psc = $numOfItems = $totalCost = "";

if(isset($_SESSION['userid'])){
	$user = User::editUser($_SESSION['userid']);
	$name = $user->getData('name');
	$surname = $user->getData('surname');
	$email = $user->getData('email');
	$phone = $user->getData('phone');
	$address = $user->getData('address');
	$city = $user->getData('city');
	$psc = $user->getData('postcode');
}

if(isset($_GET['numOfItems']) && isset($_GET['totalCost'])) {
    $numOfItems = $_GET['numOfItems'];
    $totalCost = $_GET['totalCost'];
}
?>

<link rel="stylesheet" type="text/css" href="libraries/css/checkout.css">
<script src="libraries/js/checkoutScript.js"></script>

<div class="checkoutpage">
    <div class="title-page">
        <h1>YOUR INFO</h1>
    </div>
    <div class="checkout-body">
		<div class="leftside">
            <form class="form-inp" action="API/CheckoutSave.php" method="post" id="checkoutForm">
    			<ul class="text-bar">
                    <li>
                        <a class="formular-link">NAME</a>
                        <input class="input" type="text" id="checkoutName" name="name" placeholder="Name" value="<?php echo $name;?>">
                        <span class="error" id="checkoutNameError"></span>
                    </li>
                    <li>
                        <a class="formular-link">SURNAME</a>
                        <span class="error" id="checkoutSurnameError"></span>
                        <input class="input" type="text" id="checkoutSurname" name="surname" placeholder="Surname" value="<?php echo $surname;?>">
                        
                    </li>
                    <li>
                        <a class="formular-link">EMAIL</a>
                        <input class="input" type="text" id="checkoutEmail" name="email" placeholder="yourmail@address.com" value="<?php echo $email;?>">
                        <span class="error" id="checkoutEmailError"></span>
                    </li>
                    <li>
                        <a class="formular-link">PHONE</a>
                        <input class="input" type="text" id="checkoutPhone" name="phone" placeholder="09XX 123 456" value="<?php echo $phone;?>">
                        <span class="error" id="checkoutPhoneError"></span>
                    </li>
                    <li>
                        <a class="formular-link">ADDRESS</a>
                        <input class="input" type="text" id="checkoutAddress" name="address" placeholder="Address (number)" value="<?php echo $address;?>">
                        <span class="error" id="checkoutAddressError"></span>
                    </li>
                    <li>
                        <a class="formular-link">CITY</a>
                        <input class="input" type="text" id="checkoutCity" name="city" placeholder="City" value="<?php echo $city;?>">
                        <span class="error" id="checkoutCityError"></span>
                    </li>
                    <li>
                        <a class="formular-link">PSC</a> 
                        <input class="input" type="text" id="checkoutPsc" name="psc" placeholder="Postcode" value="<?php echo $psc;?>">
                        <span class="error" id="checkoutPscError"></span>
                    </li>
                    <li>
                        <span id="errorMessage"></span>
                    </li>
    			</ul>
		    </form>    
		</div>
		<div class="rightside">
            <div class="subtotal">Subtotal (<?php echo $numOfItems;?> items)</div>
            <div class="sum"><?php echo $totalCost;?> EUR</div>
            <input type="button" class="order-button" value="Place order">
        </div>
    </div>    
</div>
