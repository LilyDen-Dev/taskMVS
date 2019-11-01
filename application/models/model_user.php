<?php

class Model_User extends Model
{
	private $conn;
	public function __construct() {
		$dbcon = new parent();
		$this->conn = $dbcon->connect();
	}

	public function get_user($login, $password)
	{
		$statement = $this->conn->query('SELECT * FROM `user` WHERE `email` = "'.$login.'" AND password = "'.$password.'"');
		$users = $statement->fetchObject();

		$_SESSION['userid'] = $users->id;

		if(isset($_SESSION['userid']))    {
			header('Location: /');
		}

		return $users;
	}

	public function add_user($email, $password, $status)
	{
		$statement = $this->conn->query('INSERT INTO `user`(`email`, `password`, `status`) VALUES ("'.$email.'", "'.$password.'", "'.$status.'")');

	}


}
