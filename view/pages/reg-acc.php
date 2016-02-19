<?php
/**
 * Created by PhpStorm.
 * User: Dominik Kolesar
 * Date: 5. 12. 2015
 */

$regMsg = $name = $surname = $email = "";
if(isset($_GET['name'])){
    $name = $_GET['name'];
}

if(isset($_GET['surname'])){
    $surname = $_GET['surname'];
}

if(isset($_GET['email'])){
    $email = $_GET['email'];
}

if(isset($_SESSION['registerErr'])){
    $regMsg = $_SESSION['registerErr'];
    unset($_SESSION['registerErr']);
}
?>

<link rel="stylesheet" type="text/css" href="libraries/css/reg-acc.css">
<script src="libraries/js/regScript.js"></script>

<div class="title-page">
    <span>REGISTRATION</span>
</div>

<form class="form" id="regForm" action='API/Relog.php?register=registration' method="POST">
    <ul class="registrationForm">
        <li><span id="form-err" class="error"></span></li>
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
        <li><span id="email-err" class="error"></span></li>
        <li>
            <div class="inputName">Password: </div>
            <input class="input" type="password" placeholder="password" name="password" id="pass1">
        </li>
        <li>
            <div class="inputName">Retype password: </div>
            <input class="input" type="password" placeholder="password" name="password" id="pass2">
        </li>
        <li><span id="pass-err" class="error"></span></li>
        <li>
            <div class="g-recaptcha" data-sitekey="6LcphBUTAAAAAHX2M6Wj4gtZlaLXTjL16dGF18tu"></div>
        </li>
        <li><span id="reg-err" class="error"><?php echo $regMsg; ?></span></li>
        <li><input type="submit" class="submit-button" value="REGISTER"></li>
    </ul>
</form>

