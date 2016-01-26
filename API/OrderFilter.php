<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 25. 1. 2016
 * Time: 18:00
 */

include_once ('Database.php');

class OrderFilter{
    public $userid = array();
    public $name= array();
    public $surname= array();
    public $shipped="";
    private $handlerDB;
    private $querycounter=0;
    
    
    /**
     * Creates Filter handler and sets default values
     */
    public function __construct(){
        $this->handlerDB = new DBHandler();
    }
    
    public function useridQuery() {
        $useridquery="";
        if(count($this->userid)>0){
            foreach($this->userid as $userid)
            {
                if($useridquery!=""){
                    $useridquery.=", ".$userid;
                }
                else{
                    if($this->querycounter==0){
                        $useridquery="WHERE ";
                        $this->querycounter++;
                    }
                    else{
                        $useridquery="and ";
                        $this->querycounter++;
                    }
                    $useridquery.="(userid IN (".$userid;
                }
            }
            $useridquery.="))";            
        }
        else{
            $useridquery="";
        }
        return $useridquery;
    }
    
    public function nameQuery() {
        $namequery="";
        if(count($this->name)>0){
            foreach($this->name as $name)
            {
                if($namequery!=""){
                    $namequery.=", \"".$name."\"";
                }
                else{
                    if($this->querycounter===0){
                        $namequery.="WHERE ";
                        $this->querycounter++;
                    }
                    else{
                        $namequery.="and ";
                        $this->querycounter++;
                    }
                    $namequery.="(name IN (\"".$name."\"";
                }
            }
            $namequery.="))";            
        }
        else{
            $namequery="";
        }
        return $namequery;
    }
    
    
    public function shippedQuery() {
        $shippedquery="";
        if($this->shipped!==""){
            if($this->querycounter==0){
                $shippedquery="WHERE ";
                $this->querycounter++;
            }
            else{
                $shippedquery="and ";
                $this->querycounter++;
            }
            $shippedquery.="(shipped=".$this->shipped.") ";          
        }
        else{
            $shippedquery="";
        }
        return $shippedquery;
    }
    
    public function surnameQuery() {
        $surnamequery="";
        if(count($this->surname)>0){
            foreach($this->surname as $surname)
            {
                if($surnamequery!=""){
                    $surnamequery.=", \"".$surname."\"";
                }
                else{
                    if($this->querycounter==0){
                        $surnamequery="WHERE ";
                        $this->querycounter++;
            }
            else{
                $surnamequery="and ";
                $this->querycounter++;
            }
                    $surnamequery.="(surname IN (\"".$surname."\"";
                }
            }
            $surnamequery.="))";            
        }
        else{
            $surnamequery="";
        }
        return $surnamequery;
    }
    
    /**
     * Gets results from a database as an array of productids of products from the table
     * change $this->minprice and $this->max price in order to set the price range
     * results are filtered, sorted and ready to use
     */
    public function getResults() {
        $useridQuery=$this->useridQuery();
        $nameQuery=$this->nameQuery();
        $surnameQuery=$this->surnameQuery();
        $shippedQuery=$this->shippedQuery();
        echo "SELECT orderid FROM orders".$useridQuery.$nameQuery.$surnameQuery.$shippedQuery." ORDER BY orderid DESC";
        $this->handlerDB->query("SELECT orderid FROM orders ".$useridQuery.$nameQuery.$surnameQuery.$shippedQuery." ORDER BY orderid DESC");
        $results = $this->handlerDB->resultSet();
        $this->handlerDB->execute();   
        $array=array();
        foreach($results as $result){
            $array[]=$result['orderid'];
        }
        return $array;
    }   
}
 $oF= new OrderFilter;
 $oF->name[]="anton";
 $oF->name[]="peter";
 //$oF->userid[]="12";
 $oF->surmname[]="jupi";
 $oF->shipped="1";
 print_r($oF->getResults());