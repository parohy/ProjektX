<?php
/**
 * Created by Matúš Kaèmár.
 * Date: 8. 11. 2015
 * Time: 22:43
 */
session_start();

include ("../API/Database.php");
include ("../API/InputRecheck.php");

$search = "";
$result = 0;
$database = new DBHandler();
$prepare = new Recheck();

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $search = $prepare->dumpSpecialChars($search);
    $_SESSION['search'] = $search;
}

if(!foundRecord($result)) {
    $database->query('SELECT * FROM products WHERE name = :fname OR brand = :fname');
    $database->bind(':fname',$search);
    $result = $database->singleRecord();
}

if(foundRecord($result)) {
    $_SESSION['result'] = $result;
}
else {
    $_SESSION['result'] = "No results";
}

function foundRecord($record) {
    if($record > 0) {
        return true;
    }
    else {
        return false;
    }
}

header('Location: ../?page=searchResults','Content-Type: text/html; charset=UTF-8');
exit();