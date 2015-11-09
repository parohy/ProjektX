<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Matúš
 * Date: 8. 11. 2015
 * Time: 22:43
 */
include ("../API/Database.php");
$search;

if(isset($_POST['search'])) {
    $search = $_POST['search'];
}

$database = new DBHandler();
$database->query('SELECT * FROM products WHERE name = :fname');
$database->bind(':fname',$search);
$result = $database->singleRecord();

if($result > 0)
    $_SESSION['result'] = $result;
else
    $_SESSION['result'] = "No results";

header('Location: ../?page=searchResults');