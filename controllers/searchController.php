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

    if($search->foundResults($results)) { // if results were found send them trough session variable
        $_SESSION['results'] = $results;
    }
    else { // else send message results not found
        $_SESSION['noresults'] = "Results not found";
    }

    header('Location:../?page=searchResults'); // redirect to search results page
    exit();
}