<div class="page-header text-center">
	<h2>Пользователи</h2>
</div>
<!-- <div class="col-md-10 col-md-offset-1"> -->
	<table class="table table-striped">
		<thead>
			<tr>
				<th><a href="#name">Имя</a></th>
				<th><a href="#last_name">Фамилия</a></th>
				<th><a href="#middle_name">Отчество</a></th>
				<th><a href="#email">Почта</a></th>
				<th><a href="#skills">Навыки</a></th>
				<th><a href="#experience">Опыт</a></th>
				<th><a href="#comment">Комментарий</a></th>
				<th><a href="#created">Создан</a></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><?= $user->name ?></td>
					<td><?= $user->last_name ?></td>
					<td><?= $user->middle_name ?></td>
					<td><?= $user->email ?></td>
					<td><?= $user->skills ?></td>
					<td><?= $user->experience ?></td>
					<td><?= $user->comment ?></td>
					<td><?= $user->created ?></td>
					<td>
				       	<a href="/users/user/<?= $user->id ?>" class="btn  btn-sm">Просмотр</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<!-- pagination -->
	<nav>
	  <ul class="pager">
	    <li class="<?= $prev_page_class ?>"><a href="?page=<?= $prev_page ?>">Previous</a></li>
	    <li class="<?= $next_page_class ?>"><a href="?page=<?= $next_page ?>">Next</a></li>
	  </ul>
	</nav>
	
	<div class="row well">
		<h4 class="text-center">Фильтр</h4>
		<form role="form">

			<!-- date -->
			<div class="form-group row">
				<label for="date" class="col-sm-1 form-control-label">Дата</label>
				<div class="col-sm-5">
					<input type="text" class="form-control datepicker" id="date" placeholder="От" name="date_from" />
				</div>
				<div class="col-sm-5">
					<input type="text" placeholder="До" class="form-control datepicker" name="date_until" />
				</div>
			</div>
			<!-- search -->
			<div class="form-group row">
				<label for="search" class="col-sm-1 form-control-label">Поиск</label>
				<div class="col-sm-5">
					<input name="search" type="text" class="form-control" placeholder="Поиск" />
				</div>
				<div class="col-sm-5">
					<select class="form-control" name="search_field">
						<option></option>
						<option value="name">Имя</option>
						<option value="last_name">Фамилия</option>
						<option value="middle_name">Отчество</option>
						<option value="email">Почта</option>
						<option value="skills">Навыки</option>
						<option value="experience">Опыт</option>
					</select>
				</div>
			</div>
			<div class="form-group row text-center">
				<div class="btn-group">
					<input type="submit" class="btn btn-primary filter" value="Применить фильтр" />
					<a  href="/" type="submit" class="btn brn-info clear-filter">Сбросить фильтры</a>
				</div>
			</div>
		</form>
	</div>
<!--</div>-->