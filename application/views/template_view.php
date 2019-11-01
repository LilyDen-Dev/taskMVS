<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Title</title>
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<script type="text/javascript"  src="/js/jquery-3.4.1.min.js"></script>
		<!--		<script type="text/javascript"  src="/js/bootstrap.bundle.js"></script>-->
		<script type="text/javascript"  src="/js/bootstrap.js"></script>
		<script type="text/javascript"  src="/js/main.js"></script>
<!--		<script type="text/javascript"  src="/js/jquery.dynatable.js"></script>-->
	</head>
	<body>
		<header>
			<a class="logo" href="">Задачник</a>
			<?php
			$btn_name = 'Вход';
			$btn_href = '/taskmvs/user/login';
			if(isset($_SESSION['userid']) && $_SESSION['userid'] == true)
			{
				$btn_name = 'Выход';
				$btn_href = '/taskmvs/user/logout';
			}
			?>
			<a href="/<?= $btn_href ?>" class="btn btn-outline-dark"><?= $btn_name ?></a>
		</header>
		<main>
			<?php include 'application/views/'.$content_view; ?>
		</main>
	</body>
</html>
