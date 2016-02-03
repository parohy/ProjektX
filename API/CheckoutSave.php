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
include_once ($path.'API/PDFGen.php');
include_once ($path.'API/OrderDetails.php');

$order = new Order();

$order->name=$_POST['name'];
$order->surname=$_POST['surname'];
$order->email=$_POST['email'];
$order->phone=$_POST['phone'];
$order->address=$_POST['address'];
$order->city=$_POST['city'];
$order->postcode=$_POST['psc'];
$order->shipped=0;

$cartContent = $_SESSION['cart'];
$totalprice=0;

foreach($cartContent as $item)
{
        $totalprice+=$item['price'];
}
$order->orderprice=$totalprice;

$order->save();
echo $id=$order->id;

foreach($cartContent as $item)
{
        $detail=new OrderDetail;
        $detail->productid=$item['id'];
        $detail->orderid=$id;
        $detail->quantity=$item['count'];
        $detail->detailprice=$item['price'];
        $totalprice+=$item['price'];
        $detail->save();
}

if(isset($_SESSION['userid']))
{
	//echo $_SESSION['userid'];
	$order->userid=$_SESSION['userid'];
}
else
{
	//echo $_SESSION['userid'];
	$order->userid="";
}

$pdfBill = new pdfFile($id);
$pdfBill->buildPDF();
$_SESSION['filepath'] = $pdfBill->getPath();

header('Location:  ../index.php?page=endline');
?>