<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/newDesign/';
include_once ($path.'config.php');
include_once (ROOT . 'controllers/searchController.php');

if(isset($_SESSION['results'])) {

    $results = $_SESSION['results'];
    displayResults($results);

} else if(!isset($_SESSION['result'])){
    echo "NOT SEND";
}