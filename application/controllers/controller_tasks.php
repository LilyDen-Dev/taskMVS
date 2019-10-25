<?php


class Controller_Tasks extends Controller
{
	function action_show()
	{

		$page = 0;
		if(isset($_GET['page'])){
			$page = $_GET['page'] * 3;
		}

        $this->load_model('tasks');
        $db = new Model_Tasks();
		$res_tasks = $db->get_tasks($page);

		echo $paginationCount = $db->count_tasks() / 3;


		$data = [
			'tasks'=> $res_tasks,
			'pages' => $page,
			'paginationCount' => $paginationCount
		];

		$this->view->generate('tasks_view.php', 'template_view.php', $data);
	}

	function action_add()
	{
		$this->load_model('tasks');
		$db = new Model_Tasks();
		$task = $db->add_tasks($_POST['username'], $_POST['email'], $_POST['text']);

		header('Location: http://taskmvs/tasks/show');
	}

	function action_edit()
	{

	}
}