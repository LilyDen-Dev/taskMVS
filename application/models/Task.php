<?php

 function addTask ($username, $email, $text){
		$pdo = new PDO('mysql:host=localhost; dbname=taskApplication', 'root', '');
		$sql = "INSERT INTO tasks (username, email, text) VALUES (:username, :email, :text)";
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':username', $username);
		$statement->bindParam(':email', $email);
		$statement->bindParam(':text', $text);
		$statement->execute();
	}

	function getTasks (){
		$pdo = new PDO('mysql:host=localhost; dbname=taskApplication', 'root', '');
		$statement = $pdo->prepare("SELECT * FROM tasks");
		$statement->execute();
		$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $tasks;
	}


