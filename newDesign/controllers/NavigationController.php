<?php

include_once (ROOT . 'API/Database.php');

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
                $i++;
            }
        }

        $k = 0;
        for($i = 0; $i < sizeof($categories); $i++) { // GET SUBCATEGORIES
            for($j = 0; $j < sizeof($this->result); $j++) {
                if($this->result[$j]['parent'] == $categories[$i]['id']) {
                    $categories[$i]['subcategory'][$k]['id'] = $this->result[$j]['categoryid'];
                    $categories[$i]['subcategory'][$k]['name'] = $this->result[$j]['name'];
                    $k++;
                }
            }
        }
        /*
        $l = 0;
        $length = sizeof($categories[$i]['subcategory']);
        print_r($length);
        for($i = 0; $i < sizeof($categories); $i++) {
            for($j = 0; $j < sizeof($this->result); $j++) {
                for($k = 0; $k < sizeof($categories[$i]['subcategory']); $k++) {
                    if($this->result[$j]['parent'] == $categories[$i]['subcategory'][$k]['id']) {
                        $categories[$i]['subcategory'][$k]['subcategory'][$l]['id'] = $this->result[$j]['categoryid'];
                        $categories[$i]['subcategory'][$k]['subcategory'][$l]['name'] = $this->result[$j]['name'];
                        $l++;
                    }
                }
            }
        }
        */

        return $categories;
    }

    public function displayNavigation() {
        $categories = $this->getCategories();

        echo "<ul class=\"nav\">";

        foreach ($categories as $cat) {
            echo "<li class=\"button\"><a href=\"?page=" . $cat['category'] . "\">" . $cat['category'] . "</a>";
            echo "<ul class=\"subnav\">";
            foreach ($cat['subcategory'] as $subcat) {
                echo "<li><a href=\"?page=" . $subcat['name'] . "\">" .$subcat['name'] . "</a></li>";
            }
            echo "</ul>";
            echo "</li>";
        }

        echo "</ul>";
    }
}
