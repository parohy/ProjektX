<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 27. 1. 2016
 * Time: 18:36
 */
$absolutePath = $_SERVER['DOCUMENT_ROOT'];
$absolutePath .= "ProjektX/";

if(isset($_GET['action']) && isset($_GET['path'])) {
    $action = $_GET['action'];
    $path = $absolutePath . $_GET['path'];

    if($action === 'deleteFile') {
        if(!unlink($path)) {
            die("Error deleting file!");
        }
    }
    else if($action === 'uploadFile') {

    }
}