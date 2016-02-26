<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 23. 2. 2016
 * Time: 19:03
 */

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once 'API/Viewcounter.php';
if(!isset($_SESSION["viewed"])){
    $v=new Viewcounter();
    $v->increment();
    $_SESSION["viewed"]=true;
}
