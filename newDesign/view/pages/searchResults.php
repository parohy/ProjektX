<?php
include_once (ROOT . "controllers/SearchController.php");

$searchTerm = $_GET['search'];

$searchController = new SearchController($searchTerm);

$searchController->displayResults();