<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
    echo "<a href=\"?login=false\">Log off</a>";
}

?>
<br>
<a href="?page=welcome-message">welcome message</a><br>
<a href="?page=change-video">Change video</a><br>
<a href="?page=insert-item">insert item</a><br>
<a href="?page=delete-item">delete item</a><br>


