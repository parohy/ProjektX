<div class="frame-container registration">
    <script src="js/regFormScript.js"></script>
    <form action="" method="POST" class="registration">
        <ul class="registration-container">
            <li>
                <h4 class="headline">Registration</h4>
                <ul>
                    <li class="registration-item"><label for="name">First name:</label><input type="text" name="name" placeholder="First name..." maxlength="20">*</li>
                    <li class="registration-item"><label for="last-name">Last name:</label><input type="text" name="last-name" placeholder="Last name..." maxlength="20">*</li>
                    <li class="registration-item"><label for="mail">E-mail:</label><input type="email" name="mail" placeholder="johnSmith@mail.com" maxlength="40">*</li>
                    <li class="registration-item"><label for="password">Password:</label><input type="password" name="password" placeholder="*******" maxlength="30">*</li>
                </ul>
            </li>
            <li>
                <h4 class="headline scalable"><a href="#" class="hideShow-button">-</a>Fakturačné údaje</h4>
                <ul class="hide">
                    <li class="registration-item"><label for="adress">Adress:</label><input type="text" name="addres" placeholder="Adress..." maxlength="30"></li>
                    <li class="registration-item"><label for="city">City:</label><input type="text" name="city" placeholder="City..." maxlength="20"></li>
                    <li class="registration-item"><label for="state">State:</label><input type="text" name="state" placeholder="State..." maxlength="5"></li>
                </ul>
            </li>
            <li class="registration-item"><input type="submit" value="Register"></li>
        </ul>
    </form>
</div>