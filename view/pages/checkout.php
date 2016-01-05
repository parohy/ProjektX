
<?php
/**
 * Created by
 * User: Peter Varholak
 * Date: 5. 1. 2016
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Orderdetails.php');
include_once ($path.'API/Orders.php');

$order = new Order();


?>
<?php
// define variables and set to empty values
$nameErr = $surnameErr = $emailErr = $phoneErr = $addressErr = $cityErr = $pscErr = "";
$name = $surname = $email = $phone = $address = $city = $psc = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "Name is required";
    }
    else
    {
        $name = test_input($_POST["name"]); // check if name only contains letters and whitespace
        if (!preg_match("/^[A-Za-z]{2,50}$/",$name))
        {
           $nameErr = "Invalid name format";
        }
    }
    
    if (empty($_POST["surname"]))
    {
        $surnameErr = "Surname is required";
    }
    else
    {
        $surname = test_input($_POST["surname"]); // check if surname only contains letters and whitespace
        if (!preg_match("/^[A-Za-z]{2,50}$/",$surname))
        {
           $surnameErr = "Invalid surname format";
        }
    }

    if (empty($_POST["email"])) 
    {
        $emailErr = "Email is required";
    }
    else
    {
        $email = test_input($_POST["email"]); // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
        }
    }
    
    if (empty($_POST["phone"]))
    {
        $phoneErr = "Phone number is required";
    }
    else
    {
        $phone = test_input($_POST["phone"]); // check if surname only contains letters and whitespace
        if (!preg_match("/^[0-9-()+]{8,20}$/",$phone))
        {
           $phoneErr = "Invalid phone number format";
        }
    }

    if (empty($_POST["address"]))
    {
        $addressErr = "Address is required";
    }
    else
    {
        $address = $_POST["address"];
        $address = stripslashes($address);
        $address = htmlspecialchars($address);
        if (!preg_match("/^[A-Z]*[a-z]+\s\d+$/",$address))
        {
           $addressErr = "Invalid address format (Street number)";
        }
    }

    if (empty($_POST["city"]))
    {
        $cityErr = "City is required";
    }
    else
    {
        $city = test_input($_POST["city"]); // check if surname only contains letters and whitespace
        if (!preg_match("/^[A-Z]*[a-z]+$/",$city))
        {
           $cityErr = "Invalid city format";
        }
    }

    if (empty($_POST["psc"]))
    {
        $pscErr = "PSC is required";
    }
    else
    {
        $psc = test_input($_POST["psc"]); // check if surname only contains letters and whitespace
        if (!preg_match("/^[0-9]{3} ?[0-9]{2}$/",$psc))
        {
           $pscErr = "Invalid psc format";
        }
    }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>
<link rel="stylesheet" type="text/css" href="libraries/css/checkout.css">

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
            <form class="form-inp" action="" method="post" id="checkoutForm">
    			<ul class="text-bar">
                    <li>
                        <input class="input" type="text" name="name" value="<?php echo $name;?>">
                        <span class="error"><?php echo $nameErr;?></span>
                    </li>
                    <li>
                        <input class="input" type="text" name="surname" value="<?php echo $surname;?>">
                        <span class="error"><?php echo $surnameErr;?></span>
                    </li>
                    <li>
                        <input class="input" type="text" name="email" value="<?php echo $email;?>">
                        <span class="error"><?php echo $emailErr;?></span>
                    </li>
                    <li>
                        <input class="input" type="text" name="phone" value="<?php echo $phone;?>">
                        <span class="error"><?php echo $phoneErr;?></span>
                    </li>
                    <li>
                        <input class="input" type="text" name="address" value="<?php echo $address;?>">
                        <span class="error"><?php echo $addressErr;?></span>
                    </li>
                    <li>
                        <input class="input" type="text" name="city" value="<?php echo $city;?>">
                        <span class="error"><?php echo $cityErr;?></span>
                    </li>
                    <li>
                        <input class="input" type="text" name="psc" value="<?php echo $psc;?>">
                        <span class="error"><?php echo $pscErr;?></span>
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
<script src="libraries/js/checkoutScript.js"></script>
<?php
    /*$order->name=$_POST'name'];
    $order->surname=$_POST['surname'];
    $order->email=$_POST['email'];
    $order->phone=$_POST['phone'];
    $order->address=$_POST['address'];
    $order->city=$_POST['city'];
    $order->postcode=$_POST['psc'];*/
?>