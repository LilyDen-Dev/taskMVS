<h2>Список задач: </h2>
<div class="sorting">
	<span>Сортировать: </span>
	<select class="custom-select" name="" id="">
		<option value=""> по имени пользователя (по возрастанию)</option>
		<option value=""> по имени пользователя (по убыванию)</option>
		<option value=""> по Email (по возрастанию)</option>
		<option value=""> по Email (по убыванию)</option>
		<option value="">сначала активные</option>
		<option value="">сначала завершонные</option>
	</select>
</div>


<table class="table table-hover">
	<thead>
		<tr>
			<th>№ п/п</th>
			<th>Имя</th>
			<th>Email</th>
			<th>Задача</th>
			<th>Статус</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data['tasks'] as $task):?>
			<tr>
				<td><?= $task['id'];?></td>
				<td><?= $task['username'];?></td>
				<td><?= $task['email'];?></td>
				<td><?= $task['text'];?></td>
				<td>
					<?php /*if(Auth::login):*/?><!--
									<input type="checkbox">
									<label for="">Выполнено</label>
								--><?php /*endif;*/?>
					<?= $task['status'];?>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>

<ul class="pagination">
	<li class="page-item"><a class="page-link" href="#">Previous</a></li>
	<?php
	for ($i = 1; $i <= $data['paginationCount']; $i++){  ?>
		<li class="page-item"><a class="page-link" href="/?page="><?= $i;?></a></li>
	<?php } ?>
	<!--<li class="page-item"><a class="page-link" href="http://taskmvs/tasks/show/?page=2">2</a></li>
	<li class="page-item"><a class="page-link" href="#">3</a></li>-->
	<li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>

<div class="add-task">
	<h2>Добавить задачу</h2>
	<form class="needs-validation" novalidate action="/tasks/add" method="post">
		<div class="form-row">
			<div class="coll-md-4 mt-3">
				<label for="validationTooltip01">Имя</label>
				<input class="form-control" id="validationTooltip01" type="text" name="username" required>
				<div class="invalid-tooltip">Введите имя</div>
			</div>
		</div>
		<div class="form-row">
			<div class="coll-md-4 mt-3">
				<label for="validationTooltipUsername">email</label>
				<input class="form-control" id="validationTooltipUsername" type="text" name="email" required>
				<div class="invalid-tooltip">Укажите Email</div>
			</div>
		</div>
		<div class="coll-md-4 mt-3">
			<label for="validationTooltipTextarea">Задача</label>
			<textarea class="form-control" id="validationTooltipTextarea" name="text" required></textarea>
			<div class="invalid-tooltip">Запишите задачу</div>
		</div>
		<button class="btn btn-dark mt-3" type="submit">Добавить</button>
	</form>
</div>