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

    /**
     * creates a pdfFile instance
     * @param null $id
     */
    public function __construct($id=null){
        if($id != null){
            $this->order = new Order($id);
            $this->pdfID .= $this->order->userid . substr($this->order->datecreated, 2,2) . substr($this->order->datecreated, 5,2) . $id;
            $this->pdfFile = new mPDF();
        }
    }

    /**
     * Call steps to generate pdf file
     */
    public function buildPDF(){
        $this->createStyle();
        $this->createHead();
        $this->createAddress();
        $this->createSum();
        $this->createFoot();

        $this->finish();
    }

    /**
     * appends stylesheet to pdf file
     */
    private function createStyle(){
        $stylesheet = file_get_contents('../libraries/css/bill.css');
        $this->pdfFile->WriteHTML($stylesheet,1);
    }

    /**
     * appends header to htmlOut
     */
    private function createHead(){
        $this->htmlOut .= ' <h1>VIATECH s.r.o.</h1> ';
    }


    /**
     * appends addresses to htmlOut
     */
    private function createAddress(){
        $this->htmlOut .= '<!-- -->
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
            <h3>Order date: '.substr($this->order->datecreated,0,10).'</h3>
            <br/>
            <hr>
            <br/>
        ';
    }

    /**
     * appends details and price to htmlOut
     */
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

    /**
     * appends footer to htmlOut
     */
    private function createFoot(){
        $this->htmlOut .= '<div align="bottom">ViaTech Dneperska 1, Kosice, Slovakia +421 902 095 588 viatech@gmail.com</div>';
    }

    /**
     * writes the htmlOut to pdf file, generates and saves it to the given absolutePath
     */
    private function finish(){
        $this->pdfFile->WriteHTML($this->htmlOut);
        $this->pdfFile->Output('../libraries/pdf/'.$this->pdfID.'.pdf', 'F');
        $this->absolutePath .= 'libraries/pdf/'.$this->pdfID.'.pdf';
    }

    /**
     * @return string path to file
     */
    public function getPath(){
        return $this->absolutePath;
    }
}

?>