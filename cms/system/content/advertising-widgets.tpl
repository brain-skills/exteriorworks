<div class="col-12">
	<div class="col-12">
		<button class="btn btn-dark mb-0" onclick="openModal('widgetAddForm')">Добавить рекламный виджет</button>
	</div>
	<div id="widgetAddForm" style="display: none;">
		<h5 class="mt-0">Добавить рекламный виджет:</h5>
		<form method="post">
			<div class="row">
				<div class="col-6 mb-2">
					<label>Заголовок виджета:</label>
					<fieldset class="form-icon-group left-icon position-relative">
						<input type="text" class="form-control" name="title" placeholder="Например: реклама">
						<div class="form-icon position-absolute">
							<img src="{$stheme}/images/svg/option.svg" alt="">
						</div>
					</fieldset>
				</div>
				<div class="col-6 mb-2">
					<label>Код виджета:</label>
					<fieldset class="form-icon-group left-icon position-relative">
						<input type="text" class="form-control" name="widget_code" placeholder="...">
						<div class="form-icon position-absolute">
							<img src="{$stheme}/images/svg/option.svg" alt="">
						</div>
					</fieldset>
				</div>
				<div class="col-4">
					<label>Группы пользователей</label>
					<fieldset class="form-icon-group left-icon position-relative mb-2">
						<select class="form-select array-select form-control" name="groups">
							<option value="" selected>Для всех пользователей</option>
							<option value="Администратор">Администраторы</option>
							<option value="Модератор">Модератор</option>
							<option value="Автор">Автор</option>
							<option value="Редактор">Редактор</option>
							<option value="Тех-Поддержка">Тех-Поддержка</option>
							<option value="Бета-тестер">Бета-тестер</option>
							<option value="Премиум-пользователь">Премиум-пользователь</option>
							<option value="Пользователь">Пользователь</option>
							<option value="Гость">Гость</option>
						</select>
						<div class="form-icon position-absolute">
							<img src="{$stheme}/images/svg/option.svg" alt="">
						</div>
					</fieldset>
					<label>Пол пользователей</label>
					<fieldset class="form-icon-group left-icon position-relative mb-2">
						<select class="form-select array-select form-control" name="genders">
							<option value="" selected>Для всех</option>
							<option value="Для мужчин">Для мужчин</option>
							<option value="Для женщин">Для женщин</option>
						</select>
						<div class="form-icon position-absolute">
							<img src="{$stheme}/images/svg/option.svg" alt="">
						</div>
					</fieldset>
				</div>
				<div class="col-4">
					<label>Возраст ОТ</label>
					<fieldset class="form-icon-group left-icon position-relative mb-2">
						<input type="text" class="form-control" name="min_age" placeholder="0">
						<div class="form-icon position-absolute">
							<img src="{$stheme}/images/svg/option.svg" alt="">
						</div>
					</fieldset>
					<label>Возраст ДО</label>
					<fieldset class="form-icon-group left-icon position-relative mb-2">
						<input type="text" class="form-control" name="max_age" placeholder="100">
						<div class="form-icon position-absolute">
							<img src="{$stheme}/images/svg/option.svg" alt="">
						</div>
					</fieldset>
				</div>
				<div class="col-4">
					<label>Начало</label>
					<fieldset class="form-icon-group left-icon position-relative mb-2">
						<input type="datetime-local" class="form-control" name="start_date">
						<div class="form-icon position-absolute">
							<img src="{$stheme}/images/svg/option.svg" alt="">
						</div>
					</fieldset>
					<label>Конец</label>
					<fieldset class="form-icon-group left-icon position-relative mb-2">
						<input type="datetime-local" class="form-control" name="end_date">
						<div class="form-icon position-absolute">
							<img src="{$stheme}/images/svg/option.svg" alt="">
						</div>
					</fieldset>
				</div>
				<div class="col-12">
					<label>Содержимое виджета</label>
					<textarea class="form-control mt-2 mb-2" rows="3" name="description" spellcheck="false"></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary w-100">Создать виджет</button>
		</form>
	</div>
</div>
<hr>
<div class="col-12">
	<table class="table">
		<thead>
		  <tr>
			<th class="border-end text-center" width="50px">#</th>
			<th class="border-end">Title</th>
			<th class="border-end" width="250px">Groups</th>
			<th class="border-end" width="150px">Genders</th>
			<th class="border-end" width="100px">Ages</th>
			<th class="border-end" width="170px">Duration</th>
			<th class="" width="130px">Action</th>
		  </tr>
		</thead>
		<tbody>
			<tr>
				<td class="border-end text-center">1</td>
				<td class="border-end">1</td>
				<td class="border-end" width="250px">1</td>
				<td class="border-end" width="150px">1</td>
				<td class="border-end" width="100px">1</td>
				<td class="border-end" width="170px">1</td>
				<td class="" width="130px">
					<div class="btn-group">
						<a href="#" class="text-warning mx-2 top-1"><i class="fa fa-code"></i></a>
						<a href="#" class="mx-2 top-1"><i class="fa fa-edit"></i></a>
						<form method="POST" action="#" style="display:inline;">
							<input type="hidden" name="delete_widget_id" value="">
							<button type="submit" class="no-b mx-1" onclick="return confirm('Вы уверены, что хотите удалить это объявление?');">
								<i class="fa fa-trash"></i>
							</button>
						</form>
					</div>
				</td>
			</tr>
		</tbody>
	  </table>
</div>
<script>
	var wabSection = document.getElementById('wabSection');
	wabSection.classList.add('active');
	var widgetsAndBanners = document.getElementById('widgetsAndBanners');
	widgetsAndBanners.classList.add('show');
	var currentLink = document.getElementById('advertisingWidgets');
	currentLink.classList.add('active');
</script>