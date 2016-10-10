<?php
include("../../Data_Access_Layer/ConnectionClass.php");
class loginClass{

	//Atributes from the class:

	public $username;
	public $password;
	
	//methods from the class:	

	public function sql($sql){
		$connection = new connection();
		return $connection-> consult($sql);
	}

	public function userOk(){

		$cql = "select user_id, name, lastname,username,password,user_Type_id from user where username = '".$this->username."' and password = '".$this->password."'; " ;

		return $this-> sql($cql);
	}

}

?>