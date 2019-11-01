<?php


class Controller_Tasks extends Controller
{
	function action_add()
	{
		$this->load_model('tasks');
		$db = new Model_Tasks();

		$error = false;
		$task = '';

		if (!empty($_POST['username']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['text'])) {
			$task = $db->add_tasks($_POST['username'], $_POST['email'], $_POST['text']);

		}
		else {
			$error = true;
		}
		if ($error) {
			$task = "value is invalid";
		}


		header('Location: /');
	}

	function action_edit()
	{
		$this->load_model('tasks');
		$db = new Model_Tasks();
		$res_tasks = $db->edit_tasks($_GET['id']);
		$task_id = $_GET['id'];
		$task_text = $res_tasks['0'];

		$data = [

			'id' => $task_id,
			'task' => $task_text
		];
		$this->view->generate('edit_view.php', 'template_view.php', $data);
	}

	function action_update()
	{
		$this->load_model('tasks');
		$db = new Model_Tasks();
		$task = $db->update_tasks($_POST['text'], $_GET['id']);
		$status = $db->toggle_tasks($_POST['status'], $_GET['id']);
		$new_text = false;

		if($new_text !== $task){
			$add_redact = $db->redact_tasks("1", $_GET['id']);
		}

		header('Location: /');

	}
}