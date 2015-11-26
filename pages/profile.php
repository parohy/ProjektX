<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
    echo "<a href=\"?login=false\">Log off</a>";
}
?>
