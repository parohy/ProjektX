<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path . 'API/Database.php');

class NavigationController {
    private $handlerDB;
    private $result;

    function __construct() {
        $this->handlerDB = new DBHandler();
        $this->handlerDB->query('SELECT * FROM categories');
        $this->result = $this->handlerDB->resultSet();
    }

    private function getCategories() {
        $categories = array();

        $i = 0;
        foreach($this->result as $res) { // GET MAIN CATEGORIES
            if($res['parent'] == 1) {
                $categories[$i]['id'] = $res['categoryid'];
                $categories[$i]['category'] = $res['name'];
                $categories[$i]['parent'] = $res['parent'];
                $i++;
            }
        }

        $k = 0;
        for($i = 0; $i < sizeof($categories); $i++) { // GET SUBCATEGORIES
            for($j = 0; $j < sizeof($this->result); $j++) {
                if($this->result[$j]['parent'] == $categories[$i]['id']) {
                    $categories[$i]['subcategory'][$k]['id'] = $this->result[$j]['categoryid'];
                    $categories[$i]['subcategory'][$k]['name'] = $this->result[$j]['name'];
                    $categories[$i]['subcategory'][$k]['parent'] = $this->result[$j]['parent'];
                    $categories[$i]['subcategory'][$k]['subcategory'] = array();
                    $k++;
                }
            }
        }
        /*
        $i = 0;
        foreach($categories as $cat) {
            foreach($cat['subcategory'] as $subcat) {
                foreach($this->result as $res) {
                    if($subcat['id'] == $res['parent']) {
                        $subcat['subcategory']['id'] = $res['categoryid'];
                        $subcat['subcategory']['name'] = $res['name'];
                    }
                }
                $i = 0;
            }
        }
        */
        return $categories;
    }

    public function displayNavigation() {
        $categories = $this->getCategories();

        echo "<ul class=\"nav\">";

        foreach ($categories as $cat) {
            echo "<li class=\"button categoryButton\"><a href=\"?page=mainCategory&catid=" . $cat['id'] . "\">" . $cat['category'] . "</a>";
            echo "<ul class=\"subnav\">";
            foreach ($cat['subcategory'] as $subcat) {
                echo "<li><a href=\"?page=subCategory&catid=" . $subcat['id'] . "\">" .$subcat['name'] . "</a></li>";
            }
            echo "</ul>";
            echo "</li>";
        }

        echo "</ul>";
    }
}
