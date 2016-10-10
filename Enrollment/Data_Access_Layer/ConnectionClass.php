<?php
class connection{
	private $server = "localhost";
	private $user = "root";
	private $password = "1234";
	private $database = "Enrollment_System";

	function connect()
	{
		return mysql_connect($this->server,$this->user);
	}

	function consult($sql)
	{
		$conection = $this -> connect();
		mysql_set_charset('utf8');
		mysql_select_db($this->database, $conection);
		return mysql_query($sql,$conection);
	}

	
}


?>