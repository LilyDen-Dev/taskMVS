<?php
class Model{
	public function connect(){
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'taskapplication';
		$connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
		return $connection;
	}

	public function disconnect()
	{
	}
}