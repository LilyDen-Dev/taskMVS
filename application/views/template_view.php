<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Title</title>
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
	</head>
	<body>
		<header>
			<a class="logo" href="">Задачник</a>
			<?php
			$btn_name = 'Вход';
			if(isset($_SESSION['login']) && $_SESSION['login'] == true)
			{
				$btn_name = 'Выход';
			}
			?>
			<a href="" class="btn btn-outline-dark"><?= $btn_name ?></a>
		</header>

		<main>


			<?php include 'application/views/'.$content_view; ?>


		</main>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<!--<script type="text/javascript" src="../js/bootstrap.js"></script>-->
	</body>
</html>

<!--include 'application/views/'.$content_view;-->
