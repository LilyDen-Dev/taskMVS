<?php

class Controller_Auth extends Controller
{

	function action_login()
	{
		$data = [

			'tasks'=> []
		];
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
}