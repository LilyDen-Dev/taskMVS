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

		$paginationCount = $db->count_tasks() / 3;
		$allCount = intval($paginationCount) * 3 - 3;

		if($page == 0){
			$previous = 0;
		} else {
			$previous = $page / 3 - 1;
		}

		if($page == $allCount){
			$next = intval($paginationCount) - 1;
		} else {
			$next = $page / 3 + 1;
		}

		$data = [
			'tasks'=> $res_tasks,
			'page' => $page,
			'paginationCount' => $paginationCount,
			'previous' => $previous,
			'next' => $next,
		];
		$this->view->generate('tasks_view.php', 'template_view.php', $data);
	}
}