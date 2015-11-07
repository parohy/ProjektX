<?php
	


class Security{
		
	private $servername;
	private $database;
	
	public function __construct($servername){
		$this->servername = $servername;
	}
	
	public function checkUser($usermail, $password){
		return true;
	}
	
	public function inputCheck($input){
	if($input != null){
		return true;
	}
		
	return false;
	}
	
}
	

?>