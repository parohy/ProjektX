<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

if(isset($_SESSION['results'])) {
    echo "howdy";
    $results = $_SESSION['results'];
    $search = $_SESSION['object'];
    $search->displayResults($results);
} else if(!isset($_SESSION['result'])){
    echo "NOT SEND";
}