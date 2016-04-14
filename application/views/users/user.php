<div class="user-page">
	<h1 class="page-header text-center">Страница пользователя</h1>
	<div class="well row profile">
		<h4 class="text-center">
			<a href="#update">Изменить ползователя</a>
		</h4>
		<ul class="list-group col-md-6 col-md-offset-3">
			<li class="list-group-item">
				<small>Имя</small>
				<strong><?= $user->name ?></strong>
			</li>
					<li class="list-group-item">
				<small>Фамилия</small>
				<strong><?= $user->last_name ?></strong>
			</li>
			<li class="list-group-item">
				<small>Отчество</small>
				<strong><?= $user->middle_name ?></strong>
			</li>
			<li class="list-group-item">
				<small>Почта</small>
				<strong><?= $user->email ?></strong>
			</li>
			<li class="list-group-item">
				<small>Навыки</small>
				<strong><?= $user->skills ?></strong>
			</li>
			<li class="list-group-item">
				<small>Опыт</small>
				<strong><?= $user->experience ?></strong>
			</li>
			<li class="list-group-item">
				<small>Комментарий</small>
				<strong><?= $user->comment ?></strong>
			</li>
			<li class="list-group-item">
				<small>Создан</small>
				<strong><?= $user->created ?></strong>
			</li>						
		</ul>
	</div>
</div>
<!-- update form -->
<div class="update-user hidden">
	<div class="page-header text-center">
		<h2>Изменить пользователя</h2>
	</div>
	<div class="row well">
		<h4 class="text-center">
			<a href="#show">Просмотр ползователя</a>
		</h4>
		<form id="add-user-form" method="POST" class="col-md-8 col-md-offset-2">
			<!-- name -->
			<div class="form-group row">
				<label for="name" class="col-sm-3 form-control-label">Имя</label>
				<div class="col-sm-9">
					<input name="name" type="text" class="form-control" id="name" placeholder="Имя" required="required" size="100" value="<?= $user->name ?>" />
				</div>
			</div>
			<!-- last name -->
			<div class="form-group row">
				<label for="last_name" class="col-sm-3 form-control-label">Фамилия</label>
				<div class="col-sm-9">
					<input name="last_name" type="text" class="form-control" id="last_name" placeholder="Фамилия" required="required" size="100" value="<?= $user->last_name ?>" />
				</div>
			</div>
			<!-- middle name -->
			<div class="form-group row">
				<label for="middle_name" class="col-sm-3 form-control-label">Отчество</label>
				<div class="col-sm-9">
					<input name="middle_name" type="text" class="form-control" id="middle_name" placeholder="Отчество" required="required" size="100" value="<?= $user->middle_name ?>" />
				</div>
			</div>
			<!-- email -->
			<div class="form-group row">
				<label for="email" class="col-sm-3 form-control-label">Почта</label>
				<div class="col-sm-9">
					<input name="email" type="mail" class="form-control" id="email" placeholder="Почта" required="required" size="255" value="<?= $user->email ?>" />
				</div>
			</div>
			<!-- skills -->
			<div class="form-group row">
				<label for="skills" class="col-sm-3 col-xs-12 form-control-label">Навыки</label>
				<div class="col-sm-7 col-xs-10">
					<input name="skill" type="text" class="form-control user-skill" id="skills" placeholder="Навык" required="required"  value="<?= array_shift($skills) ?>"/>
				</div>
				<div class="col-sm-2 col-xs-2">
					<button class="remove-skill">-</button>
					<button class="add-skill">+</button>
				</div>
			</div>
			<?php foreach($skills as $skill): ?>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Навык</label>
				<div class="col-sm-9">
					<input class="form-control user-skill" placeholder="Навык" value="<?= $skill ?>" />
				</div>
			</div>
			<?php endforeach; ?>
			<!-- experience -->
			<div class="form-group row">
				<label for="experience" class="col-sm-3 form-control-label">Опыт</label>
				<div class="col-sm-9">
				      <select class="form-control" id="experience" name="experience">
				        <option <?php if($user->experience == 'Без опыта') echo 'selected="selected"'; ?>>Без опыта</option>
				        <option <?php if($user->experience == 'До 1 года') echo 'selected="selected"'; ?>>До 1 года</option>
				        <option <?php if($user->experience == '1-3 года') echo 'selected="selected"'; ?>>1-3 года</option>
				        <option <?php if($user->experience == '3-5 лет') echo 'selected="selected"'; ?>>3-5 лет</option>
				        <option <?php if($user->experience == 'Более 5 лет') echo 'selected="selected"'; ?>>Более 5 лет</option>
				      </select>
				</div>
			</div>
			<!-- comment -->
			<div class="form-group row">
				<label for="comment" class="col-sm-3 form-control-label">Комментарий</label>
				<div class="col-sm-9">
					<textarea name="comment" class="form-control" rows="5" id="comment"><?= $user->comment ?></textarea>
				</div>
			</div>
			<!-- created -->
			<div class="form-group row">
				<label for="comment" class="col-sm-3 form-control-label">Создан</label>
				<div class="col-sm-9">
					<p><?= $user->created ?></p>
				</div>
			</div>
			<!-- submit btn -->
			<div class="form-group col-sm-8 col-sm-offset-2">
				<input class="btn btn-primary btn-lg btn-block" type="submit" value="Сохранить">
			</div>
			<input type="hidden" name="id" value="<?= $user->id ?>" />
		</form>
	</div>
</div>