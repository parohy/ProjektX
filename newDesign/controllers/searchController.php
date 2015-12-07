<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 7. 12. 2015
 * Time: 14:23
 */

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../config.php';
include (ROOT . 'API/SearchModel.php');

if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    $search = new SearchModel($searchTerm);
    $results = $search->getResults();

    $_SESSION['results'] = $results;
    $_SESSION['object'] = $search;

    header('Location:../?page=searchResults');
    exit();
}