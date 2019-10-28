<?php

class Controller_Main extends Controller
{

	function action_index()
	{
		$page = 0;
		if(isset($_GET['page'])){
			$page = $_GET['page'] * 3;
		}

		$this->load_model('tasks');
		$db = new Model_Tasks();
		$res_tasks = $db->get_tasks($page);

		$paginationCount = $db->count_tasks($page) / 3;

		$data = [
			'tasks'=> $res_tasks,
			'pages' => $page,
			'paginationCount' => $paginationCount,
		];
		$this->view->generate('tasks_view.php', 'template_view.php', $data);
	}
}