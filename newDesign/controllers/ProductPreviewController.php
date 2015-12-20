<?php
/**
 * Created by PhpStorm.
 * User: Matus
 * Date: 9. 12. 2015
 * Time: 8:12
 */
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= 'ProjektX/newDesign/';
include_once ($path.'config.php');
include_once (ROOT.'API/Database.php');

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
}