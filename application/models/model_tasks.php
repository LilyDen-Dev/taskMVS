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
		$statement = $this->conn->query('SELECT * FROM `tasks` ORDER BY id DESC LIMIT '.$page.', 3');
		$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $tasks;
	}

	public function add_tasks($username, $email, $text)
	{
		$statement = $this->conn->query('INSERT INTO `tasks`(`username`, `email`, `text`) VALUES ("'.$username.'", "'.$email.'", "'.$text.'") ');
	}

	public function count_tasks()
	{
		return $this->conn->query('SELECT COUNT(*) FROM `tasks`')->fetchColumn();

	}

	public function edit_tasks($id)
	{
		$statement = $this->conn->query('SELECT * FROM `tasks` WHERE id = "'.$id.'"');
		$task = $statement->fetchAll(PDO::FETCH_COLUMN, 3);

		return $task;
	}

	public function update_tasks($text, $id)
	{
		$statement = $this->conn->query('SELECT * FROM `tasks` text WHERE id = "'.$id.'"');
		$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

		$udate_statement = $this->conn->query('UPDATE `tasks` SET text = "'.$text.'" WHERE id = "'.$id.'"');

		$new_statement = $this->conn->query('SELECT * FROM `tasks` text WHERE id = "'.$id.'"');
		$new_tasks = $new_statement->fetchAll(PDO::FETCH_ASSOC);

		$update = $tasks != $new_tasks;

		return $update;
	}

	public function toggle_tasks($status, $id)
	{
		if(isset($status) &&
			$status == 'On')
		{
			$statement = $this->conn->query('UPDATE `tasks` SET status = "'.$status.'" WHERE id = "'.$id.'"');
		}
	}

	public function redact_tasks($redact, $id)
	{
		$statement = $this->conn->query('UPDATE `tasks` SET redact = "'.$redact.'" WHERE id = "'.$id.'"');
	}

}
