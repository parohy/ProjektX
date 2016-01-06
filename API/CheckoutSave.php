<?php
session_start();
/**
 * Created by
 * User: Peter Varholak
 * Date: 5. 1. 2016
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Orders.php');

$order = new Order();

$order->name=$_POST['name'];
$order->surname=$_POST['surname'];
$order->email=$_POST['email'];
$order->phone=$_POST['phone'];
$order->address=$_POST['address'];
$order->city=$_POST['city'];
$order->postcode=$_POST['psc'];
$order->shipped=0;
//TODO: price

if(isset($_SESSION['userid']))
{
	echo $_SESSION['userid'];
	$order->userid=$_SESSION['userid'];
}
else
{
	echo $_SESSION['userid'];
	$order->userid="";
}

$order->save();

header('Location:  ../index.php');
?>