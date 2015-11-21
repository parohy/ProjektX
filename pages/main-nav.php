<?php

/**
 * Author: Matus Kacmar
 */

$dbhandler = new DBHandler();
$dbhandler->query('SELECT * FROM categories ORDER BY categoryid');
$result = $dbhandler->resultSet();

$mainCategory = 0;
$subCategory = 0;
?>

<ul class="nav-container">
    <li class="nav-item">
        <a href="?page=main-page" class="nav-button">Hlavná stránka</a>
    </li>
    <?php

    foreach($result as $res) {
        if($res['parent'] == 1 && $res['categoryid'] == 2) { //-> PRINTING THE FIRST MAIN CATEGORY EXCEPT ALL PRODUCTS CATEGORY
            $mainCategory = $res['categoryid'];
            echo "<li class=\"nav-item\">";
            echo "<a href=\"?page=" . $res['name'] . "&category=" . $res['categoryid'] . "\" class=\"nav-button\">" . $res['name'] . "</a>";
            echo "<ul class=\"subnav-container\">";
        }
        else if($res['parent'] == 1 && $res['categoryid'] > 2) { //-> PRINTING THE MAIN CATEGORIES
            $mainCategory = $res['categoryid'];
            echo "</ul>";
            echo "</li>";
            echo "<li class=\"nav-item\">";
            echo "<a href=\"?page=" . $res['name'] . "&category=" . $res['categoryid'] . "\" class=\"nav-button\">" . $res['name'] . "</a>";
            echo "<ul class=\"subnav-container\">";
        }
        if(($res['parent'] == $mainCategory && $mainCategory != 0) && $res['categoryid'] == 3) { //-> PRINTING SUBCATEGORIES
            $subCategory = $res['categoryid'];
            echo "<li class=\"subnav-item\"><a href=\"?page=" . $res['name'] . "&category=" . $res['categoryid'] . "\" class=\"nav-button subnav-button\">" . $res['name'] . "</a></li>";
        }
        else if(($res['parent'] == $mainCategory && $mainCategory != 0) && $res['categoryid'] > 3) {
            $subCategory = $res['categoryid'];
            echo "<li class=\"subnav-item\"><a href=\"?page=" . $res['name'] . "&category=" . $res['categoryid'] . "\" class=\"nav-button subnav-button\">" . $res['name'] . "</a></li>";
        }
    }

    ?>
</ul>
