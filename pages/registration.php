<?php
/**
 * Author: Matus Kacmar
 */
?>
<link rel="stylesheet" type="text/css" href="css/registration-style.css">

<div class="frame-container registration">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
    	session_start();
    }
    ?>

  <div class="frame-titlebar registration-title"><span class="frame-title">Registration</span></div>
  <div class="frame-content">
    <form action="API/Relog.php?register=registration&id=1" method="POST">
  		<ul class="registration-container">
              <li class="registration-item">
                  <ul class="inputs">
                      <li><label for="name">First name:</label><input type="text" name="name" placeholder="First name..." maxlength="20" required id="first-name"></li>
                      <li><span class="reg-error" id="first-registration"></span></li>
                      <li><label for="last-name">Last name:</label><input type="text" name="last-name" placeholder="Last name..." maxlength="20" required id="last-name"></li>
                      <li><span class="reg-error" id="second-registration"></span></li>
                      <li><label for="mail">E-mail:</label><input type="email" name="mail" placeholder="johnSmith@mail.com" maxlength="40" required id="email"></li>
                      <li><span class="reg-error" id="mail-registration"></span></li>
                      <li><label for="password">Password:</label><input type="password" name="password" placeholder="*******" maxlength="30" minlength="6" required id="password"></li>
                      <li><span class="reg-error" id="password-registration"></span></li>
                  </ul>
              </li>
              <li class="registration-item"><input type="submit" value="Register"></li>
          </ul>
      </form>
  </div>
  <script src="../ProjektX/js/regValidation.js"></script>
</div>
