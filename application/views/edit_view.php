
<form class="needs-validation" novalidate action="/tasks/update/?id=<?= $data['id'];?>" method="post">
	<div class="coll-md-4 mt-3">
		<label for="validationTooltipTextarea">Задача</label>
		<textarea class="form-control" id="validationTooltipTextarea" name="text" required><?= $data['task'];?></textarea>
		<div class="invalid-tooltip">Запишите задачу</div>
	</div>
	<div class="coll-md-4 mt-3">
		<input type="checkbox" value="On" name="status">
		<label for="">Выполнено</label>
	</div>
	<a href="/" class="btn btn-dark mt-3">Назад</a>
	<button class="btn btn-dark mt-3" type="submit">Сохранить</button>
</form>