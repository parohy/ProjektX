<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

if(session_status() == PHP_SESSION_NONE) { // start session if it doesnt exist
    session_start();
}

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include ($path .'API/SearchModel.php');

if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    $search = new SearchModel($searchTerm);
    $results = $search->getResults();

    $_SESSION['results'] = $results;
    header('Location:../?page=mainCategory&catid=1&name='.$searchTerm);
    
    exit();
}