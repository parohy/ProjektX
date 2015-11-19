<?php

/**
 * Author: Matus Kacmar
 */

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
        $diff = $res['rgt'] - $res['lft']; // variable which holds difference between left and right of actual category

        if($diff > 1 && $res['categoryid'] == 2) { //-> PRINTING THE FIRST MAIN CATEGORY EXCEPT ALL PRODUCTS CATEGORY
            echo "<li class=\"nav-item\">";
            echo "<a href=\"#\" class=\"nav-button\">" . $res['name'] . "</a>";
            echo "<ul class=\"subnav-container\">";
        }
        else if($diff > 1 && $res['categoryid'] != 1) { //-> PRINTING THE MAIN CATEGORIES
            echo "</ul>";
            echo "</li>";
            echo "<li class=\"nav-item\">";
            echo "<a href=\"#\" class=\"nav-button\">" . $res['name'] . "</a>";
            echo "<ul class=\"subnav-container\">";
        }
        if($diff == 1) { //-> PRINTING SUBCATEGORIES
            echo "<li class=\"subnav-item\"><a href=\"?page=" . $res['name'] . "&category=" . $res['categoryid'] . "\" class=\"nav-button subnav-button\">" . $res['name'] . "</a></li>";
        }
    }

    ?>
</ul>
