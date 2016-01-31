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

    }

    private function createHead(){
        $this->htmlOut .= '<h1 align="left">Bill - tax document</h1>';
        $this->htmlOut .= '<h3 align="right">'.$this->pdfID.'</h3>';
        $this->htmlOut .= '<hr>';
    }

    private function createAddress(){
        $this->htmlOut .= '<table align="center" width="600">
        <tr>
            <td align="left">
                <b>contractor</b>
                <ul>
                    <li>VIATECH s.r.o.</li>
                    <li>Dneperska 1</li>
                    <li>040 12 Kosice</li>
                    <li>IC: xxxxxxxxx</li>
                    <li>DIC: xxxxxxxxxxxxx</li>
                </ul>

            </td>
            <td align="right">
                <b>customer</b>
                <ul>
                    <li>'.$this->order->name.' '.$this->order->surname.'</li>
                    <li>'.$this->order->address.'</li>
                    <li>'.$this->order->postcode.' '.$this->order->city.'</li>
                </ul>
            </td>
        </tr>
    </table>
    <hr>';
    }

    private function createSum(){
        $sumTotal = 0;
        $this->htmlOut .= '<ol>';
        foreach($this->order->alldetails as $current) {
            $detail = new Orderdetail($current);
            $product = new Product($detail->productid);

            $sumTotal += $price = $product->price * $detail->quantity;
            $this->htmlOut .= '<li><div align="left">' . $product->name . '</div><div align="center">' . $detail->quantity . '</div><div align="right">' . $price . ' eur</div></li>';
        }
        $this->htmlOut .= '</ol><div align="right">Sum: '.$sumTotal.' eur</div><hr>';
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