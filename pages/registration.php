<link rel="stylesheet" type="text/css" href="css/registration-style.css">

<div class="frame-container registration">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
    	session_start();
    }
    ?>
	<form action="API/Relog.php?register=registration&id=1" method="POST">
		<ul class="registration-container">
            <li>
                <h4 class="headline">Registration</h4>
                <ul>
                    <li class="registration-item"><label for="name">First name:</label><input type="text" name="name" placeholder="First name..." maxlength="20" required></li>
                    <li class="registration-item"><label for="last-name">Last name:</label><input type="text" name="last-name" placeholder="Last name..." maxlength="20" required></li>
                    <li class="registration-item"><label for="mail">E-mail:</label><input type="email" name="mail" placeholder="johnSmith@mail.com" maxlength="40" required></li>
                    <li class="registration-item"><label for="password">Password:</label><input type="password" name="password" placeholder="*******" maxlength="30" required></li>
                </ul>
            </li>
            <li class="registration-item"><input type="submit" value="Register"></li>
        </ul>
    </form>
</div>