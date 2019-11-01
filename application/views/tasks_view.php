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
			<th class="name">Имя</th>
			<th class="email">Email</th>
			<th class="task">Задача</th>
			<th class="status">Статус</th>
			<th class="redact"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data['tasks'] as $task):?>
			<tr>
				<td><?= $task['username'];?></td>
				<td><?= $task['email'];?></td>
				<td>
					<?= htmlentities($task['text']);?><br>

					<?php if($task['redact'] == '1'){ ?>
						<span class="red">Отредактировано администратором</span>
					<?php } ?>
				</td>
				<td>
					<?php if($task['status'] == 'On'){ ?>
						<span class="green">Выполнено</span>
					<?php } else { ?>
						<span class="yellow">В процессе</span>
					<?php } ?>
				</td>
				<td>
					<?php
					if(isset($_SESSION['userid']) && $_SESSION['userid'] == true)
					{?>
						<a href="/tasks/edit/?id=<?= $task['id'];?>" class="btn btn-dark btn-sm">Редактировать</a>
					<?php }?>
				</td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>

<ul class="pagination">
<!--	<li class="page-item"><a class="page-link" href="/main/index/?page=--><?//= $data['previous'] ;?><!--">Previous</a></li>-->
	<?php
	for ($data['page'] = 0; $data['page'] < $data['paginationCount']; $data['page']++){ ?>
		<li class="page-item <?php if(($_GET['page']) == $data['page']) { ?>  active <?php } ?>"><a class="page-link" href="/main/index/?page=<?= $data['page'];?>"><?= $data['page'] + 1;?></a></li>
	<?php } ?>
<!--	<li class="page-item"><a class="page-link" href="/main/index/?page=--><?//= $data['next'] ;?><!--">Next</a></li>-->
</ul>

<div class="add-task">
	<h2>Добавить задачу</h2>
	<div class="needs-validation js-form" id="task_form">
		<div class="form-row">
			<div class="coll-md-4 mt-3">
				<label for="validationTooltip01">Имя</label>
				<input class="form-control" id="validationTooltip01" type="text" name="username" required>
				<div class="invalid-tooltip validate">Введите имя</div>
			</div>
		</div>
		<div class="form-row">
			<div class="coll-md-4 mt-3">
				<label for="validationTooltipUsername">email</label>
				<input class="form-control" id="validationTooltipUsername" type="text" name="email" required>
				<div class="invalid-tooltip validate js-err-email">Укажите Email</div>
			</div>
		</div>
		<div class="coll-md-4 mt-3">
			<label for="validationTooltipTextarea">Задача</label>
			<textarea class="form-control" id="validationTooltipTextarea" name="text" required></textarea>
			<div class="invalid-tooltip validate">Запишите задачу</div>
		</div>
		<button class="btn btn-dark mt-3" id="submit_form" type="submit">Добавить</button>
	</div>
</div>