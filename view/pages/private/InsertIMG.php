<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 8. 12. 2015
 * Time: 19:00
 */

$id=$_POST['ID'];
$target= "../../../img/products/".$id."/"; 
if (!file_exists($target)) {
    mkdir($target, 0777, true);
}
$count=0;
foreach ($_FILES['filesToUpload']['name'] as $filename) {
    $temp=$target;
    $tmp=$_FILES['filesToUpload']['tmp_name'][$count];
    $count=$count + 1;
    $temp=$temp.basename($filename);
    move_uploaded_file($tmp,$temp);
    $temp='';
    $tmp='';
}   