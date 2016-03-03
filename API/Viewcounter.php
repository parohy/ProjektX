<?php

/**
 * Created by NetBeans
 * User: Matus Kokoska
 * Date: 23. 2. 2016
 * Time: 9:34
 */
    
class Viewcounter{    
    
    private $file="";
    private $fileContent=array();  
    
    public function __construct(){
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= 'ProjektX/';
        $this->file=$path."libraries/txt/viewcount.txt";
        $this->read();
    }
    
    /**
     * reads and saves data from textfile viewcount.txt
     * @author Matus Kokoska
     */
    
    private function read(){
        $file = fopen($this->file,'r') or die("Unable to open file!");
        $line="";
        while(!feof($file)) {
            $line=fgets($file);
            if($line!="" && $line!="\n"){
                parse_str($line,$this->fileContent[]);     //d=23&m=2&y=2016&count=43
            }           
        }
        fclose($file);
    }
    
    /**
     * writes data to textfile viewcount.txt
     * @author Matus Kokoska
     */
    
    private function write(){
        $file = fopen($this->file, "w") or die("Unable to open file!");
        foreach($this->fileContent as $line){
            fwrite($file, "d=".$line['d']."&m=".$line['m']."&y=".$line['y']."&count=".$line['count']."\n");
        }
        fclose($file);
    }
    
    /**
     * increments the number of page views on a current date
     * @author Matus Kokoska
     */
    
    public function increment(){        
        if(($this->fileContent[count($this->fileContent)-1]['d']==date('d'))&&($this->fileContent[count($this->fileContent)-1]['m']==date('m'))&&($this->fileContent[count($this->fileContent)-1]['y']==date('Y'))){
            $this->fileContent[count($this->fileContent)-1]['count']=$this->fileContent[count($this->fileContent)-1]['count']+1;
        }
        else{
            $count=count($this->fileContent);
            $this->fileContent[$count]['d']=date('d');
            $this->fileContent[$count]['m']=date('m');
            $this->fileContent[$count]['y']=date('Y');
            $this->fileContent[$count]['count']=1;
        }
        $this->write();
    }
    
    /**
     * counts total view amount
     * @author Matus Kokoska
     * @return int sum
     */
    
    public function getTotalViews(){
       $sum=0;
        foreach($this->fileContent as $line){
            $sum+=$line['count'];
        } 
        return $sum;
    }
    
    /**
     * provides data for JavaScript chart of page views
     * @author Matus Kokoska
     * @return string content
     */
    
    public function chartDataProvider(){
        $content="";
        foreach($this->fileContent as $line){     //{"category": "2014-03-01","column-1": 8},
            $content.="{\"category\": \"".$line['y']."-".$line['m']."-".$line['d']."\",\"column-1\": ".$line['count']."}";
            if($line!=$this->fileContent[count($this->fileContent)-1]){
                $content.=",";
            }
        } 
        return $content;
    }
    
}

