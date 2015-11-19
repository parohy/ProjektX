<?php
//include "API";

$dbhandler = new DBHandler();
$dbhandler->query('SELECT * FROM categories ORDER BY categoryid');
$result = $dbhandler->resultSet();
?>
<ul class="nav-container">
    <li class="nav-item">
        <a href="?page=main-page" class="nav-button">Hlavná stránka</a>
    </li>
    <?php

    foreach($result as $res) {
        $diff = $res['rgt'] - $res['lft'];

        if($diff > 1 && $res['categoryid'] == 2) {
            echo "<li class=\"nav-item\">";
            echo "<a href=\"#\" class=\"nav-button\">" . $res['name'] . "</a>";
            echo "<ul class=\"subnav-container\">";
        }
        else if($diff > 1 && $res['categoryid'] != 1) {
            echo "</ul>";
            echo "</li>";
            echo "<li class=\"nav-item\">";
            echo "<a href=\"#\" class=\"nav-button\">" . $res['name'] . "</a>";
            echo "<ul class=\"subnav-container\">";
        }
        if($diff == 1) {
            echo "<li class=\"subnav-item\"><a href=\"?page=" . $res['name'] . "\" class=\"nav-button subnav-button\">" . $res['name'] . "</a></li>";
        }
    }

    ?>
    <li class="nav-item">
        <a href="" class="nav-button">Elektronika</a>

        <ul class="subnav-container">
            <li class="subnav-item"><a href="" class="nav-button subnav-button">Biela elektronika</a></li>

            <li class="subnav-item"><a href="#" class="nav-button subnav-button">Čierna elektronika</a></li>

        </ul>
    </li>
</ul>
