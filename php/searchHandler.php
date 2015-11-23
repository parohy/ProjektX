<?php
/**
 * Author: Matus Kacmar
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
    $database->query("SELECT * FROM products WHERE name LIKE :name OR brand LIKE :brand");
    $search = '%'.$search.'%';
    $database->bind(':name',$search);
    $database->bind(':brand',$search);
    $result = $database->resultSet();
}

if(foundRecord($result)) {
    $_SESSION['result'] = $result;

    $bindParam = array(sizeof($result));

    for($i = 0; $i < sizeof($result); $i++) {
        $bindParam[$i] = ":pr" . $i;
    }

    $parameters = join(",", $bindParam);
    $query = "SELECT pic1path FROM images WHERE productid IN(" . $parameters . ")";
    $database->query($query);

    for($i = 0; $i < sizeof($result); $i++) {
        $database->bind($bindParam[$i], $result[$i]['productid']);
    }

    $images = $database->resultSet();

    $_SESSION['images'] = $images;
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
