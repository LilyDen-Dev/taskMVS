<?php

class Model_Tasks extends Model
{
	private $conn;
	public function __construct() {
		$dbcon = new parent();
		// this is not needed in your case
		// you can use $this->conn = $this->connect(); without calling parent()
		$this->conn = $dbcon->connect();
	}

	public function get_tasks($page)
	{

		$statement = $this->conn->query('SELECT * FROM `tasks` LIMIT '.$page.', 3');
		//$statement->execute();
		$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $tasks;
	}

	public function add_tasks($username, $email, $text)
	{

		/*$task = $this->conn->prepare('INSERT INTO `tasks`');
		$task->bindParam(':username', $username);
		$task->bindParam(':email', $email);
		$task->bindParam(':text', $text);
		$task->execute();*/

		$statement = $this->conn->query('INSERT INTO `tasks`(`username`, `email`, `text`) VALUES ("'.$username.'", "'.$email.'", "'.$text.'")');
		//$statement->execute();

	}

	public function count_tasks ()
	{
		return $this->conn->query('SELECT COUNT(*) FROM `tasks`')->fetchColumn();

	}

}
