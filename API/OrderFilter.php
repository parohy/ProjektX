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
     * Creates orderfilter handler and sets default values
     * @author Matus Kokoska
     */
    
    public function __construct(){
        $this->handlerDB = new DBHandler();
    }
    
    /**
     * prepares a part of query for filtering orders by userID 
     * @author Matus Kokoska
     * @return string useridquery
     */
    
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
    
    /**
     * prepares a part of query for filtering orders by name 
     * @author Matus Kokoska
     * @return string namequery
     */
    
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
    
    /**
     * prepares a part of query for filtering orders whether they are shipped or not
     * @author Matus Kokoska
     * @return string shippedquery
     */
    
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
    
    /**
     * prepares a part of query for filtering orders by surname 
     * @author Matus Kokoska
     * @return string surnamequery
     */
    
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
     * Gets results from a database as an array of orderids of orders from the table
     * results are filtered, sorted and ready to use
     * @author Matus Kokoska
     * @return array of integers
     */
    
    public function getResults() {
        $useridQuery=$this->useridQuery();
        $nameQuery=$this->nameQuery();
        $surnameQuery=$this->surnameQuery();
        $shippedQuery=$this->shippedQuery();
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
