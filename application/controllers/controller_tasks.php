<?php


class Controller_Tasks extends Controller
{
	function action_add()
	{
		$this->load_model('tasks');
		$db = new Model_Tasks();
		$error = false;

		$result = [];
		$task = '';
		$username = $_POST['username'];
		$email = $_POST['email'];
		$text = $_POST['text'];

		if (!empty($username) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($text)) {
			$task = $db->add_tasks($username, $email, $text);
			$result['status'] = "success";

		}
		else {
			$error = true;
			$result['status'] = "error";
		}

		if ($error) {
			$result['error'] = "email is not valid";
		}
		header('Content-type: application/json /');
		echo json_encode($result);
//		header('Location: /');
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