<?php

class Controller_User extends Controller
{

	function action_login()
	{
		$this->load_model('user');
		$db = new Model_User();
		$users = $db->get_user($_POST['login'], $_POST['password']);

		$data = [

			'users'=> $users
		];
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}

	function action_logout()
	{
		unset($_SESSION['userid']);
		session_destroy();
		header('Location: /');

	}

	function action_add()
	{
		$this->load_model('user');
		$db = new Model_User();
		$task = $db->add_user("admin", "123", "1");

		header('Location: /');
	}
}