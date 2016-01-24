<?php
/**
 * Created by PhpStorm.
 * User: Dominik Kolesar
 * Date: 5. 12. 2015
 */

$name = $surname = $email = "";
if(isset($_GET['name'])){
    $name = $_GET['name'];
}

if(isset($_GET['surname'])){
    $surname = $_GET['surname'];
}

if(isset($_GET['email'])){
    $email = $_GET['email'];
}
$a = rand(1,9);
$b = rand(1,9);
$_SESSION['captcha'] = $a + $b;
?>

<link rel="stylesheet" type="text/css" href="libraries/css/reg-acc.css">
<script src="libraries/js/regScript.js"></script>





<!--<link rel="stylesheet" href="tab2.css">-->

<!--<div id="tab"> -->
<div class="title-page">
    <span>REGISTRATION</span>
</div>
<!--  <div id="formulars"class="group"> -->


<!--  <div id="all-tab">-->
<!-- <div id="tab1" class="tab-content">-->
<form class="form" action='API/Relog.php?register=registration' onSubmit="return isPassEqual()" method="POST">
    <ul class="registrationForm">
        <li>
            <div class="inputName">Name: </div>
            <input class="input" type="text" placeholder="name" name="name" value="<?php echo $name;?>">
        </li>
        <li>
            <div class="inputName">Surname: </div>
            <input class="input" type="text" placeholder="surname" name="last-name" value="<?php echo $surname;?>">
        </li>
        <li>
            <div class="inputName">E-mail: </div>
            <input class="input" type="email" placeholder="email" name="mail" value="<?php echo $email;?>">
        </li>
        <li><span id="pass-err"></span></li>
        <li>
            <div class="inputName">Password: </div>
            <input class="input" type="password" placeholder="password" name="password" id="pass1">
        </li>
        <li>
            <div class="inputName">Retype password: </div>
            <input class="input" type="password" placeholder="password" name="password" id="pass2">
        </li>
        <li><?php echo $a.' + '.$b.' = ';?><input class="input" type="number" placeholder="I am not a robot" name="captcha" id="captcha"></li>
        <li><input type="submit" class="submit-button" value="REGISTER"></li>
    </ul>
</form>
<!--</div>-->

<!-- <div id="tab2" class="tab-content">

    <form class="form" action="" method="POST">
        <ul>
            <li><input class="input" type="email" placeholder="email" name="name"> </li>
            <li><input type="submit" class="submit-button" value="RECOVER"></li>
        </ul>
    </form>

</div> -->
<!--    </div>
     </div>
</div> -->
