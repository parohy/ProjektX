<?php

/**
 * Created by Eclipse
 * User: Tomas Paronai
 * Date: 10. 11. 2015
 * Time: 17:00
 */

include_once ('../API/Database.php');

class User{
	
	private $id;	
	private $handlerDB;
	
	function __construct($name, $surname, $email, $password){
		$this->handlerDB = new DBHandler();
		
		
		echo $name,$surname,$email,$password,'<br/>';
		
			$this->saveFirstData('username', $name);
			$this->id = $this->getValidId();
			
		if($this->id != null && $this->id != 0){
			$this->saveData('usersurname', $surname, $this->id);
			$this->saveData('useremail', $email, $this->id);
			$this->saveData('userpassword', $password, $this->id);
		}
				
	}
	
	private function saveAddress($address, $city, $postcode){
		
		if($this->id != null){
			if($address!=null){
				$this->saveData('useraddress', $address, $this->id);
			}
			if($city!=null){
				$this->saveData('usercity', $city, $this->id);
			}
			if($postcode!=null){
				$this->saveData('userpostcode', $postcode, $this->id);
			}
		}
		
	}

	public function getValidId(){
		$this->handlerDB->query('SELECT * FROM users');

        $users = array();
		$users = $this->handlerDB->resultSet();
		$count = count($users);
		
		return $users[$count-1]['userid'];
	}
	private function saveFirstData($parameter, $value){
		echo $parameter,$value,'<br/>';
		$this->handlerDB->query('INSERT INTO users `'.$parameter.'` VALUES :value');
		$this->handlerDB->bind(':value',''.$value.'');
		try{
			$this->handlerDB->execute();
		}catch(PDOException $e){
			echo $e;
		}
	}
	
	private function saveData($parameter, $value, $id){
		echo $parameter,$value,$id,'<br/>';
		$this->handlerDB->query('INSERT INTO users `'.$parameter.'` VALUES :value WHERE `userid`=:userid');
		$this->handlerDB->bind(':value',''.$value.'');
		$this->handlerDB->bind(':userid',''.$id.'');
		try{
			$this->handlerDB->execute();
		}catch(PDOException $e){
			echo $e;
		}
							
	}
}