<!--
 * Created by
 * User: Peter Varholak
 * Date: 5. 1. 2016
 * Autofill: Tomas Paronai
-->

<?php

include_once ('API/UserHandler.php');

$name = $surname = $email = $phone = $address = $city = $psc = "";

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

?>

<link rel="stylesheet" type="text/css" href="libraries/css/checkout.css">
<script src="libraries/js/checkoutScript.js"></script>

<div class="checkoutpage">
    <div class="title-page">
        <h1>YOUR INFO</h1>
    </div>
    <div class="checkout-body">
		<div class="leftside">
		    <ul class="nav-bar">
    			<li><a class="formular-link">NAME</a></li>
    			<li><a class="formular-link">SURNAME</a></li>
    			<li><a class="formular-link">EMAIL</a></li>
    			<li><a class="formular-link">PHONE</a></li>
    			<li><a class="formular-link">ADDRESS</a></li>
    			<li><a class="formular-link">CITY</a></li>
    			<li><a class="formular-link">PSC</a></li> 
		    </ul>
            <form class="form-inp" action="API/CheckoutSave.php" method="post" id="checkoutForm">
    			<ul class="text-bar">
                    <li>
                        <input class="input" type="text" id="checkoutName" name="name" value="<?php echo $name;?>">
                        <span class="error" id="checkoutNameError"><span>
                    </li>
                    <li>
                        <input class="input" type="text" id="checkoutSurname" name="surname" value="<?php echo $surname;?>">
                        <span class="error" id="checkoutSurnameError"><span>
                    </li>
                    <li>
                        <input class="input" type="text" id="checkoutEmail" name="email" value="<?php echo $email;?>">
                        <span class="error" id="checkoutEmailError"><span>
                    </li>
                    <li>
                        <input class="input" type="text" id="checkoutPhone" name="phone" value="<?php echo $phone;?>">
                        <span class="error" id="checkoutPhoneError"><span>
                    </li>
                    <li>
                        <input class="input" type="text" id="checkoutAddress" name="address" value="<?php echo $address;?>">
                        <span class="error" id="checkoutAddressError"><span>
                    </li>
                    <li>
                        <input class="input" type="text" id="checkoutCity" name="city" value="<?php echo $city;?>">
                        <span class="error" id="checkoutCityError"><span>
                    </li>
                    <li>
                        <input class="input" type="text" id="checkoutPsc" name="psc" value="<?php echo $psc;?>">
                        <span class="error" id="checkoutPscError"><span>
                    </li>
    			</ul>
		    </form>    
		</div>
		<div class="rightside">
            <div class="subtotal">Subtotal (x items)</div>
            <div class="sum">XX.XX EUR</div>
            <input type="button" class="order-button" value="Place order">
            <div class="querylogin">Do you want to <a class="boldlogin">login</a>?</div>
        </div>
    </div>    
</div>