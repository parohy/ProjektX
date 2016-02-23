<?php
/**
 * Created by PhpStorm.
 * User: Matus Kacmar
 * Date: 23. 2. 2016
 * Time: 22:11
 */

require_once('../../API/Database.php');
/*
abstract class Months {
    const otherMonths = 31;
    const february = 29;
    const april = 30;
}
*/
$dbhandler = new DBHandler();
$dbhandler->beginTransaction();
$dbhandler->query("SELECT userid,datejoined FROM users WHERE activated=0");
$results = $dbhandler->resultSet();

$resultsToDelete = array();

foreach($results as $res) {
    $date = $res['datejoined'];
    $date = substr($date,0,11);
    $date = explode("-",$date);

    $month = (int) $date[1];
    $year = (int) $date[0];

    $currentDate = date('Y-m-d H:i:s');
    $currentDate = substr($currentDate,0,11);
    $currentDate = explode("-",$currentDate);

    $difference = $currentDate[1] - $month;

    if($difference >= 2) {
        array_push($resultsToDelete,$res['userid']);
    }
}

$query = "DELETE FROM users WHERE userid in (";

$size = sizeof($resultsToDelete);

for($i = 0; $i < $size-1; $i++) {
    $query = $query . $delete . ",";
}

$query = $query . $resultsToDelete[$size-1] . ")";
$dbhandler->query($query);
$dbhandler->execute();
$dbhandler->endTransaction();