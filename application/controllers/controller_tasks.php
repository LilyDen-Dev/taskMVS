<?php


class Controller_Tasks extends Controller
{
	function action_add()
	{
		$this->load_model('tasks');
		$db = new Model_Tasks();
		$task = $db->add_tasks($_POST['username'], $_POST['email'], $_POST['text']);

		header('Location: /');
	}

	function action_edit()
	{

	}
}