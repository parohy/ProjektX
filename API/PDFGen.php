<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 1/31/2016
 * Time: 10:38 AM
 */

include_once ('mpdf/mpdf.php');
include_once ('Orders.php');
include_once ('Orderdetails.php');
include_once ('Product.php');

class pdfFile{

    private $order = null;
    private $pdfFile;
    private $htmlOut = "";
    private $pdfID = "c";
    private $absolutePath = "";

    public function __construct($id=null){
        if($id != null){
            $this->order = new Order($id);
            $this->pdfID .= $this->order->userid . substr($this->order->datecreated, 2,2) . substr($this->order->datecreated, 5,2) . $id;
            $this->pdfFile = new mPDF();
        }
    }

    public function buildPDF(){
        $this->createStyle();
        $this->createHead();
        $this->createAddress();
        $this->createSum();
        $this->createFoot();

        $this->finish();
    }

    private function createStyle(){
	$this->htmlOut .= '<style>';
	$this->htmlOut .= '
            body{
   width: 678px;
   height: 100%;
   padding-left: 50px;
   padding-right: 50px;
   padding-top: 30px;
   margin: auto;
   border-left: 1px solid black;
   border-right: 1px solid black;
   border-top: 1px solid black; 
}

h1{
   
    font-size: 30px;
    width:50%;
    
    margin-bottom: 0px;
}

ul{
    list-style-type: none;
}

.invoice{
   text-decoration: underline;
   font-size: 36px;
   text-align: right;
   
}

.comp{
    
    width: 30%;
    
}

.customer{
   font-weight: 700;
}

.cust{
    padding-top: 30px;
    padding-right: 50px;
    
    text-align: right;
    
    vertical-align: bottom;
}

h3{
    margin-bottom: 0px;
    margin-top: 0px;
}

table{
    border: 1px solid black; 
    width: 100%;
    text-align: right;
}

tr:nth-child(1){
    background-color: black;
    color: white;
    text-align: left;
}

td:nth-child(1){
    text-align: left;
}

td{
    padding: 5px;
}

.summ{
    font-size: 24px;
    padding: 20px;
    padding-right: 50px;
    text-align: right;
   
    
}

.price{
    padding-right: 0px;
    font-size: 24px;
    text-align: right;
    border-top: 1px solid black;
    border-bottom: 1px solid black;
}
        ';
	$this->htmlOut .= '</style>';
    }

    private function createHead(){
        $this->htmlOut .= '
            <h1>VIATECH s.r.o.</h1> <!-- -->
            <div class="invoice">INVOICE</div>
            <div class="comp">
            <ul>
                            <li>Dneperska 1</li>
                            <li>040 01 Kosice</li>
                            <li>IC: xxxxxxxxx</li>
                            <li>DIC: xxxxxxxxxxxxx</li>
            </ul></div>
            <div class="cust">
            <div class="customer">Customer details</div>
                        <ul>
                            <li>'.$this->order->name.' '.$this->order->surname.'</li>
                            <li>'.$this->order->address.'</li>
                            <li>'.$this->order->postcode.' '.$this->order->city.'</li>
                        </ul></div>
            <br/>
            <h3>Order NO.: '.$this->pdfID.'</h3> <!-- pdf file num 006-userid | 1601-2016 01 | 012-orderid -->
            <h3>Order date: 15.12.2014</h3>
            <br/>
            <hr>
            <br/>
        ';
        
    }

    private function createAddress(){
        
    }

    private function createSum(){
        $sumTotal = 0;
        $this->htmlOut .= '
            <table>
                <tr>
                    <td>Description</td>
                    <td>Rate</td>
                    <td>Quantity</td>
                    <td>Gross</td>
                </tr>';
        foreach($this->order->alldetails as $current) {
            $detail = new Orderdetail($current);
            $product = new Product($detail->productid);
            $sumTotal += $price = $product->price * $detail->quantity;
            $this->htmlOut .= '
                <tr>
                    <td>' . $product->name . '</td>
                    <td>' . $price . ' eur</td>
                    <td>' . $detail->quantity . '</td>
                    <td>' . $price . ' eur</td>
                </tr>
            ';}
        $this->htmlOut .= '
            </table>
        ';
        $this->htmlOut .= '    
            <div class="summ">Gross Total: </div><div class="price">'.$sumTotal.' eur</div></div>
            <br/>   <br/><hr>
        ';
        
    }

    private function createFoot(){
        $this->htmlOut .= '<div align="bottom">ViaTech Dneperska 1, Kosice, Slovakia +421 902 095 588 viatech@gmail.com</div>';
    }

    private function finish(){
        $this->pdfFile->WriteHTML($this->htmlOut);
        $this->pdfFile->Output('../libraries/pdf/'.$this->pdfID.'.pdf', 'F');
        $this->absolutePath .= 'libraries/pdf/'.$this->pdfID.'.pdf';
    }

    public function getPath(){
        return $this->absolutePath;
    }
}

?>