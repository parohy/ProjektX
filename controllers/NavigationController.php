<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/';
include_once ($path . 'API/Database.php');
include_once ($path . 'API/Category.php');

class NavigationController {
    private $handlerDB;
    private $result;

    function __construct() {
        $this->handlerDB = new DBHandler();
        $this->handlerDB->query('SELECT * FROM categories');
        $this->result = $this->handlerDB->resultSet();
    }

    public function displayNavigation() {
    	$catHandler = new Category();
        $categories = $catHandler->getCategories();

        echo "<ul class=\"nav\">";

        foreach ($categories as $cat) {
            echo "<li class=\"button categoryButton\"><a href=\"?page=mainCategory&catid=" . $cat['id'] . "&name=??\">" . $cat['category'] . "</a>";
            echo "<ul class=\"subnav\">";
            foreach ($cat['subcategory'] as $subcat) {
                echo "<li><a href=\"?page=subCategory&catid=" . $subcat['id'] . "&name=??\">" .$subcat['name'] . "</a></li>";
            }
            echo "</ul>";
            echo "</li>";
        }

        echo "</ul>";
    }
}
