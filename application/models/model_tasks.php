<?php

class Model_Tasks extends Model
{
	private $conn;
	public function __construct() {
		$dbcon = new parent();
		$this->conn = $dbcon->connect();
	}

	public function get_tasks($page)
	{

		$statement = $this->conn->query('SELECT * FROM `tasks` LIMIT '.$page.', 3');
		$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $tasks;
	}

	public function add_tasks($username, $email, $text)
	{

		$statement = $this->conn->query('INSERT INTO `tasks`(`username`, `email`, `text`) VALUES ("'.$username.'", "'.$email.'", "'.$text.'")');
		//$statement->execute();

	}

	public function count_tasks ()
	{
		return $this->conn->query('SELECT COUNT(*) FROM `tasks`')->fetchColumn();

	}

}
