<link rel="stylesheet" type="text/css" href="css/web-control/welcome-message.css">

<div class="frame-container registration">
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <div class="frame-titlebar registration-title"><span class="frame-title">Welcome message</span></div>
    <div class="frame-content">
        <form action="" method="get">
            <ul class="registration-container">
                <li class="registration-item">
                    <ul class="inputs">
                        <li><label for="message">Welcome message:</label><input type="text" name="message" id="message"></li>

                    </ul>
                </li>
                <li class="registration-item"><input type="submit" value="change"></li>
            </ul>
        </form>
    </div>
    <script src="../ProjektX/js/regValidation.js"></script>
</div>
