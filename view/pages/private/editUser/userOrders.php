<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 2/18/2016
 * Time: 9:13 PM
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';

include_once($path.'API/Orders.php');
include_once($path.'API/Database.php');


$DBHandler = new DBHandler();
$DBHandler->query('SELECT * FROM orders WHERE userid=:userid');
$DBHandler->bind(':userid',$_SESSION['userid']);
$array = $DBHandler->resultSet();


echo '<ol>';
for($i = 0; $i < count($array); $i++){
    echo '<li>';
    echo '<span>'.$array[$i]['address'].' '.$array[$i]['city'].' '.$array[$i]['postcode'].'</span>';
    echo '<span> '.$array[$i]['orderprice'].' eur</span>';
        if($array[$i]['shipped'] != '0'){
            echo '<span> shipped </span>';
        }
        else{
            echo '<span> queued </span>';
        }
    echo '<a href="?page=accountSettings&profile=orderPreview&orderid='.$array[$i]['orderid'].'">Detail </a>';
    echo '</li>';
}
echo '</ol>';
?>

