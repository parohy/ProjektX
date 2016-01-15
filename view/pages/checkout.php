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
    <div class="group checkout-body">
		<div class="leftside">

            <form class="form-inp" action="API/CheckoutSave.php" method="post" id="checkoutForm">
                <ul>

                    <li>
                        <label for="name">Name</label>
                        <input class="input" type="text" id="checkoutName" placeholder="tomas" name="name" value="<?php echo $name;?>">
            <span class="error" id="checkoutNameError"><span>
                    </li>

                    <li>
                        <label for="surname">Surname</label>
                        <input class="input" type="text" id="checkoutSurname" placeholder="zeleny" name="surname" value="<?php echo $surname;?>">
            <span class="error" id="checkoutSurnameError"><span>
                    </li>

                    <li>
                        <label for="email">Email</label>
                        <input class="input" type="text" id="checkoutEmail" placeholder="tomas@gmail.com" name="email" value="<?php echo $email;?>">
            <span class="error" id="checkoutEmailError"><span>
                    </li>

                    <li>
                        <label for="phone">Phone</label>
                        <input class="input" type="text" id="checkoutPhone" placeholder="0917123123" name="phone" value="<?php echo $phone;?>">
            <span class="error" id="checkoutPhoneError"><span>
                    </li>
                    <li>
                        <label for="adress">Adress</label>
                        <input class="input" type="text" id="checkoutAddress" placeholder="hlavna 8" name="address" value="<?php echo $address;?>">
            <span class="error" id="checkoutAddressError"><span>
                    </li>
                    <li>
                        <label for="city">City</label>
                        <input class="input" type="text" id="checkoutCity" placeholder="kosice" name="city" value="<?php echo $city;?>">
                        <span class="error" id="checkoutCityError"><span>
                    </li>
                    <li>
                        <label for="psc">Post code</label>
                        <input class="input" type="text" id="checkoutPsc" placeholder="07715" name="psc" value="<?php echo $psc;?>">
            <span class="error" id="checkoutPscError"><span>
                    </li>
                    <div class="delivery">
                        <label for="delivery">Delivery</label><br>

                           <input type="radio" name="delivery" value="post-office">Post office<br>
                             <input type="radio" name="delivery" value="local-delivey" checked>Local delivery<br>
                           <input type="radio" name="delivery" value="loccal-pickup"> Local pickup<br>
                        <input type="radio" name="delivery" value="other"> Cash on delivery

                    </div>

                    <div class="pay">
                        <label for="pay">Payment method</label><br>

                            <input type="radio" name="pay" value="bank" checked>Bank transfer<br>
                             <input type="radio" name="pay" value="payp">Pay pal<br>
                            <input type="radio" name="pay" value="other">In cash

                    </div>

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
