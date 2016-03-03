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
include_once ($path.'API/Orderdetails.php');
include_once ($path.'API/Mail.php');

$order = new Order();

$order->name=$_POST['name'];
$order->surname=$_POST['surname'];
$order->email=$_POST['email'];
$order->phone=$_POST['phone'];
$order->address=$_POST['address'];
$order->city=$_POST['city'];
$order->postcode=$_POST['psc'];
$order->shipped=0;
if(isset($_SESSION['userid']))
{
        //echo $_SESSION['userid'];
        $order->userid=$_SESSION['userid'];
}
else
{
        //echo $_SESSION['userid'];
        $order->userid = rand(100,1000);
}

$cartContent = $_SESSION['cart'];
$totalprice=0;

foreach($cartContent as $item)
{
        $totalprice+=$item['price'];
}
$order->orderprice=$totalprice;

$order->save();
$id=$order->id;

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



$pdfBill = new pdfFile($id);
$pdfBill->buildPDF();
$pdfPath = $pdfBill->getPath();
$_SESSION['filepath'] = $pdfPath;
$_SESSION['orderid'] = $id;


$mail = new Mail();
$mail->addRecipient($order->email);
$mail->composeMail("Bill","<p>Thank you for your purchase here is your bill in pdf</p>","Thank you for your purchase here is your bill in pdf");
$mail->attachement($path.$pdfPath,"Bill.pdf");
$mail->sendMail();

header('Location:  ../index.php?page=endline');
?>