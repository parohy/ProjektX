<script src="../ProjektX/js/validate.js"></script>
<?php
	$email = "";
	if(isset($_GET['logmail'])){
		$email = $_GET['logmail'];
	}
?>
<form action="API/Relog.php?register=login" method="POST">
    <ul class="login-container">
        <li class="login-item"><label for="usermail">E-mail:</label><span></span></li>
        <li class="login-item"><input type="email" name="usermail" placeholder="Email..." maxlength="40" id="mail-input" required value="<?php echo $email;?>"><br><span id="mail-error" class="error"></span></li>
        <li class="login-item"><label for="usermail">Password:</label></li>
        <li class="login-item"><input type="password" name="password" placeholder="Pasword..." maxlength="30" id="password-input" required><br><span id="pass-error" class="error"></span></li>
        <li class="login-item"><span class="login-dialogue">Do you want to stay logged in ?</span><input type="checkbox" name="stayLoggedin" value="true"></li>
        <li class="login-item"><a href="?page=forgottenPass">Forgot your password ?</a></li>
        <li class="login-item"><a href="?page=registration">Not registered yet ?</a></li>
        <li class="login-item"><input type="submit" value="Log in" id="loginSubmit"></li>
        <li class="login-item">
        <?php
        if(isset($_SESSION['loginErr']) && $_SESSION['loginErr'] != null) { // if login error is set and its not null print it and then set it to null
            echo "<span id=\"login-error\" class=\"error\">" . $_SESSION['loginErr'] . "</span>";
            $_SESSION['loginErr'] = null;
        }
        ?>
        </li>
    </ul>
</form>
