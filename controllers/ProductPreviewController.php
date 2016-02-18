<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 9. 12. 2015
 * Time: 8:12
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/';
include_once ($path.'API/Database.php');
include_once ($path.'API/Product.php');

class ProductPreviewController {

    private $handlerDB;

    public function __construct() {
        $this->handlerDB = new DBHandler();
    }

    public function getProduct($productid) {
        $this->handlerDB->beginTransaction();
        $this->handlerDB->query('SELECT * FROM products WHERE productid=:id');
        $this->handlerDB->bind(':id',$productid);
        $results = $this->handlerDB->singleRecord();
        $this->handlerDB->endTransaction();

        return $results;
    }

    public function getProductBrand($brandid) {
        $this->handlerDB->beginTransaction();
        $this->handlerDB->query('SELECT name FROM brands WHERE brandid=:id');
        $this->handlerDB->bind(':id',$brandid);
        $results = $this->handlerDB->singleRecord();
        $this->handlerDB->endTransaction();

        return $results;
    }
    
    public function getSimilarProducts($productid) {
        $this->handlerDB->beginTransaction();
        $product=new Product($productid);        
        $this->handlerDB->query('SELECT productid FROM products WHERE categoryid=:categoryid');
        $this->handlerDB->bind(':categoryid',$product->categoryid);
        $results = $this->handlerDB->resultSet();
        $this->handlerDB->endTransaction();
        $products=array();
        foreach($results as $result){
            $products[]=$result['productid'];
        }
        return $products;
    }
}
