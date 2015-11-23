<?php
/**
 * Created by Mat�� Ka�m�r.
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
    $database->beginTransaction();
    $database->query("SELECT * FROM products WHERE name LIKE :name OR brand LIKE :brand");
    $search = '%'.$search.'%';
    $database->bind(':name',$search);
    $database->bind(':brand',$search);
    $result = $database->resultSet();

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
