<div class="col-12">
	<button class="btn btn-dark mb-0" onclick="openModal('userAddForm')">Добавить нового пользователя</button>
</div>
<div class="col-12">
	<h5 class="mt-3">Список пользователей:</h5>
	<table class="table">
		<tbody>
			<tr>
				<th class="border-end text-center" width="50px">id</th>
				<th class="border-end">email</th>
				<th class="border-end">group</th>
				<th class="border-end">name</th>
				<th class="border-end">city</th>
				<th class="border-end">sales</th>
				<th class="border-end">purchases</th>
				<th>actions</th>
			</tr>
			{foreach $rows as $row}
				<tr>
					<td class="border-end text-center">{$row.id}</td>
					<td class="border-end">{$row.email}</td>
					<td class="border-end">{$row.group}</td>
					<td class="border-end"><a href="/admin?action=user-profile&user_id={$row.id}">{$row.name}</a></td>
					<td class="border-end">{$row.city}</td>
					<td class="border-end">{$row.sales}</td>
					<td class="border-end">{$row.purchases}</td>
					<td class="border-end" width="70px">
						<div class="btn-group">
							<form method="POST">
								<input type="hidden" name="edituser" id="edituser" value="{$row.name}">
								<button type="submit" name="deluser" class="mx-1 bg-transparent border"><i class="fa fa-edit"></i></button>
							</form>
							<form method="POST">
								<input type="hidden" name="delusername" id="delusername" value="{$row.name}">
								<button type="submit" name="deluser" class="mx-1 bg-transparent border text-danger">X</button>
							</form>
						</div>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>
<div id="userAddForm" style="display: none;">
	<h5 class="mt-0">Добавить нового пользователя:</h5>
	<form method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-3">
				<label class="col-form-label mt-1">E-mail (логин)</label>
				<input type="email" class="form-control" name="email" id="email" value="123@mail.ru">
			</div>
			<div class="col-3">
				<label class="col-form-label mt-1">Пароль</label>
				<input type="password" class="form-control" name="password" id="password" value="12345">
			</div>
			<div class="col-3">
				<label class="col-form-label mt-1">Имя пользователя</label>
				<input type="text" class="form-control" name="name" id="name" value="Gaga">
			</div>
			<div class="col-3">
				<label class="col-form-label mt-1">Группа</label>
				<select class="form-select array-select form-control" name="group" id="group">
					<option selected>- не выбрана</option>
					<option value="1">Администратор</option>
					<option value="2">Модератор</option>
					<option value="3">Копирайтер</option>
					<option value="4">Наблюдатель</option>
					<option value="5">Элитный клиент</option>
					<option value="6">Премиум клиент</option>
					<option value="7">VIP клиент</option>
					<option value="8">Пользователь</option>
				</select>
			</div>
			<div class="col-3">
				<label class="col-form-label mt-1">Возраст</label>
				<input type="text" class="form-control" name="age" id="age" value="55">
			</div>
			<div class="col-3">
				<label class="col-form-label mt-1">Телефон</label>
				<input type="text" class="form-control" name="phone" id="phone" value="5454545">
			</div>
			<div class="col-3">
				<label class="col-form-label mt-1">Город</label>
				<input type="text" class="form-control" name="city" id="city" value="Vladikavkaz">
			</div>
			<div class="col-3">
				<label class="col-form-label mt-1">Пол</label>
				<select class="form-select array-select form-control" name="gender" id="gender">
					<option selected>- не выбран</option>
					<option value="Мужчина">Мужчина</option>
					<option value="Женщина">Женщина</option>
				</select>
			</div>
			<div class="col-6">
				<label class="col-form-label mt-1">Изображение профиля (160x160)px.</label>
				<input type="file" class="form-control" name="avatar" id="avatar" accept="image/*">
			</div>
			<div class="col-6">
				<label class="col-form-label mt-1">Фоновое изображение (1800x360)px.</label>
				<input type="file" class="form-control" name="bg_image" id="bg_image" accept="image/*">
			</div>
			<div class="col-12">
				<label class="col-form-label mt-1">Биография пользователя</label>
				<fieldset class="form-icon-group position-relative">
					<textarea class="form-control" name="bio" id="bio" cols="30" rows="3" value="Профи"></textarea>
				</fieldset>
			</div>
			<div class="col-3">
				<button type="submit" name="adduser" class="btn btn-success mt-2 mb-2">Добавить</button>
			</div>
		</div>
	</form>
</div>
<script>
	var usersSection = document.getElementById('usersSection');
	usersSection.classList.add('active');
	var usersBlock = document.getElementById('usersBlock');
	usersBlock.classList.add('show');
	var currentLink = document.getElementById('userManagement');
	currentLink.classList.add('active');
</script>