<form action="API/Relog.php?register=login" method="POST">
    <ul class="login-container">
        <li class="login-item"><label for="usermail">E-mail:</label><span></span></li>
        <li class="login-item"><input type="text" name="usermail" placeholder="Email..." maxlength="40" id="mail-input" required><span class="error"></span></li>
        <li class="login-item"><label for="usermail">Password:</label></li>
        <li class="login-item"><input type="password" name="password" placeholder="Pasword..." maxlength="30" id="password-input" required><span class="error"></span></li>
        <li class="login-item"><span class="login-dialogue">Do you want to stay logged in ?</span><input type="checkbox" name="stayLoggedin" value="true"></li>
        <li class="login-item"><a href="?page=forgottenPass">Forgot your password ?</a></li>
        <li class="login-item"><a href="?page=registration" target="_blank">Not registered yet ?</a></li>
        <li class="login-item"><input type="submit" value="Log in" id="loginSubmit"></li>
    </ul>
</form>
