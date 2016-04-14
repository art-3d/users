<div class="page-header text-center">
	<h2>Добавить пользователя</h2>
</div>
<div class="row">
	<form id="add-user-form" method="POST" class="col-md-8 col-md-offset-2 well">
		<!-- name -->
		<div class="form-group row">
			<label for="name" class="col-sm-3 form-control-label">Имя</label>
			<div class="col-sm-9">
				<input name="name" type="text" class="form-control" id="name" placeholder="Имя" required="required" size="100" />
			</div>
		</div>
		<!-- last name -->
		<div class="form-group row">
			<label for="last_name" class="col-sm-3 form-control-label">Фамилия</label>
			<div class="col-sm-9">
				<input name="last_name" type="text" class="form-control" id="last_name" placeholder="Фамилия" required="required" size="100" />
			</div>
		</div>
		<!-- middle name -->
		<div class="form-group row">
			<label for="middle_name" class="col-sm-3 form-control-label">Отчество</label>
			<div class="col-sm-9">
				<input name="middle_name" type="text" class="form-control" id="middle_name" placeholder="Отчество" required="required" size="100" />
			</div>
		</div>
		<!-- email -->
		<div class="form-group row">
			<label for="email" class="col-sm-3 form-control-label">Почта</label>
			<div class="col-sm-9">
				<input name="email" type="mail" class="form-control" id="email" placeholder="Почта" required="required" size="255" />
			</div>
		</div>
		<!-- skills -->
		<div class="form-group row">
			<label for="skills" class="col-sm-3 col-xs-12 form-control-label">Навыки</label>
			<div class="col-sm-7 col-xs-10">
				<input name="skill" type="text" class="form-control user-skill" id="skills" placeholder="Навык" required="required" />
			</div>
			<div class="col-sm-2 col-xs-2">
				<button class="remove-skill">-</button>
				<button class="add-skill">+</button>
			</div>
		</div>
		<!-- experience -->
		<div class="form-group row">
			<label for="experience" class="col-sm-3 form-control-label">Опыт</label>
			<div class="col-sm-9">
			      <select class="form-control" id="experience" name="experience">
			        <option>Без опыта</option>
			        <option>До 1 года</option>
			        <option>1-3 года</option>
			        <option>3-5 лет</option>
			        <option>Более 5 лет</option>
			      </select>
			</div>
		</div>
		<!-- comment -->
		<div class="form-group row">
			<label for="comment" class="col-sm-3 form-control-label">Комментарий</label>
			<div class="col-sm-9">
				<textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
			</div>
		</div>
		<!-- submit btn -->
		<div class="form-group col-sm-8 col-sm-offset-2">
			<input class="btn btn-primary btn-lg btn-block" type="submit" value="Добавить">
		</div>
	</form>
</div>