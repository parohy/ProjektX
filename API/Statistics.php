<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 7. 2. 2016
 * Time: 13:00
 */

include_once ('Database.php');

class Statistics{
    private $handlerDB;
    
    public function __construct(){
        $this->handlerDB = new DBHandler();
    }
    
    public function getProductCount() {
        $this->handlerDB->query("SELECT COUNT(*) FROM products WHERE deleted!=1 ");
        $result = $this->handlerDB->resultSet();
        return $result[0]['COUNT(*)'];
    }

    function getUserCount() {
        $this->handlerDB->query("SELECT COUNT(*) FROM users WHERE deleted!=1 and activated=1 ");
        $result = $this->handlerDB->resultSet();
        return $result[0]['COUNT(*)'];
    }

    function getShippedOrderCount() {
        $this->handlerDB->query("SELECT COUNT(*) FROM orders WHERE shipped=1 ");
        $result = $this->handlerDB->resultSet();
        return $result[0]['COUNT(*)'];
    }

    function getNotshippedOrderCount() {
        $this->handlerDB->query("SELECT COUNT(*) FROM orders WHERE shipped=0 ");
        $result = $this->handlerDB->resultSet();
        return $result[0]['COUNT(*)'];
    }

    function getTotalRevenue() {
        $this->handlerDB->query("SELECT ROUND(SUM(orderprice),2) as \"sum\" FROM orders");
        $result = $this->handlerDB->resultSet();
        return $result[0]['sum'];
    }

    function getBestSellingProduct() {
        $this->handlerDB->query(" SELECT productid, COUNT('productid`) AS `value_occurrence` FROM `orderdetails` GROUP BY `productid` ORDER BY `value_occurrence` DESC LIMIT 1 ");
        $result = $this->handlerDB->resultSet();
        return $result[0]['productid'];
    }

}

$s=new Statistics;
e
