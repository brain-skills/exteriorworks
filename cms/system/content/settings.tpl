<div class="col-12">
	<div class="card">
		<ul class="nav nav-tabs tab-card pt-3" role="tablist">
			<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab2_general">{$lang.sections.settingssection.nav.basic}</a></li>
			<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab2_optimization" style="color: var(--theme-color1);">{$lang.sections.settingssection.nav.optimization}</a></li>
			<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab2_ads" style="color: var(--theme-color2);">{$lang.sections.settingssection.nav.ads}</a></li>
			<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab2_files" style="color: var(--theme-color3);">{$lang.sections.settingssection.nav.files}</a></li>
			<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab2_movies" style="color: var(--theme-color4);">{$lang.sections.settingssection.nav.movies}</a></li>
			<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab2_news" style="color: var(--theme-color5);">{$lang.sections.settingssection.nav.news}</a></li>
			<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab2_products" style="color: var(--theme-color6);">{$lang.sections.settingssection.nav.products}</a></li>
		</ul>
		<div class="card-body">
			<form method="post">
				<div class="row">
					<div class="tab-content">
						<div class="tab-pane fade active show" id="tab2_general" role="tabpanel">
							<div class="row">
								<div class="col-12 col-md-6 mb-2">
									<label class="col-form-label">{$lang.sections.settingssection.general.title}:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="title" value="{htmlspecialchars($config['title'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-6 mb-2">
									<label class="col-form-label">{$lang.sections.settingssection.general.email}:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="feedback_mail" value="{htmlspecialchars($config['feedback_mail'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-6 mb-2">
									<label class="col-form-label">{$lang.sections.settingssection.general.utc}:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<select class="form-select array-select form-control" name="date_adjust">
											<option value="{htmlspecialchars($config['date_adjust'])}" selected hidden>{htmlspecialchars($config['date_adjust'])}</option>
											<option value="UTC-12:00">UTC-12:00</option>
											<option value="UTC-11:00">UTC-11:00</option>
											<option value="UTC-10:00">UTC-10:00</option>
											<option value="UTC-09:00">UTC-09:00</option>
											<option value="UTC-08:00">UTC-08:00</option>
											<option value="UTC-07:00">UTC-07:00</option>
											<option value="UTC-06:00">UTC-06:00</option>
											<option value="UTC-05:00">UTC-05:00</option>
											<option value="UTC-04:00">UTC-04:00</option>
											<option value="UTC-03:00">UTC-03:00</option>
											<option value="UTC-02:00">UTC-02:00</option>
											<option value="UTC-01:00">UTC-01:00</option>
											<option value="UTC±00:00">UTC±00:00</option>
											<option value="UTC+01:00">UTC+01:00</option>
											<option value="UTC+02:00">UTC+02:00</option>
											<option value="UTC+03:00">UTC+03:00</option>
											<option value="UTC+04:00">UTC+04:00</option>
											<option value="UTC+05:00">UTC+05:00</option>
											<option value="UTC+06:00">UTC+06:00</option>
											<option value="UTC+07:00">UTC+07:00</option>
											<option value="UTC+08:00">UTC+08:00</option>
											<option value="UTC+09:00">UTC+09:00</option>
											<option value="UTC+10:00">UTC+10:00</option>
											<option value="UTC+11:00">UTC+11:00</option>
										</select>
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-6 mb-2">
									<label class="col-form-label">{$lang.sections.settingssection.general.template}:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<select class="form-select array-select form-control" name="skin">
											{foreach from=$skins item=skin}
												{if $skin == $config.skin}
													<option value="{$skin|escape}" selected>{$skin|escape}</option>
												{else}
													<option value="{$skin|escape}">{$skin|escape}</option>
												{/if}
											{/foreach}
										</select>
										
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-6 mb-2">
									<label class="col-form-label">{$lang.sections.settingssection.general.lang}:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<select class="form-select array-select form-control" name="cms_lang">
											<option value="{htmlspecialchars($config['cms_lang'])}" selected hidden>{htmlspecialchars($config['cms_lang'])}</option>
											<option value="Русский">Русский</option>
											<option value="English">English</option>
										</select>
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-6 mb-2">
									<label class="col-form-label">{$lang.sections.settingssection.general.switcher} (1=off, 0=on):</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="site_offline" value="{htmlspecialchars($config['site_offline'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-6 mb-2">
									<label class="col-form-label">{$lang.sections.settingssection.general.description}:</label>
									<fieldset class="form-icon-group position-relative">
										<textarea class="form-control mt-2 mb-2" rows="3" name="description" spellcheck="false">{htmlspecialchars($config['description'])}</textarea>
									</fieldset>
								</div>
								<div class="col-12 col-md-6 mb-2">
									<label class="col-form-label">{$lang.sections.settingssection.general.keywords}:</label>
									<fieldset class="form-icon-group position-relative">
										<textarea class="form-control mt-2 mb-2" rows="3" name="keywords" spellcheck="false">{htmlspecialchars($config['keywords'])}</textarea>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tab2_optimization" role="tabpanel">
							<p>{$lang.sections.settingssection.nav.optimization}</p>
						</div>
						<div class="tab-pane fade" id="tab2_ads" role="tabpanel">
							<div class="row mb-3">
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Объявлений на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="ads_per_page" value="{htmlspecialchars($config['modules']['ads']['ads_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Объявлений на страницу категории:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="ads_fromcats_per_page" value="{htmlspecialchars($config['modules']['ads']['ads_fromcats_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Комментариев на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="ads_comments_limit" value="{htmlspecialchars($config['modules']['ads']['comments_limit'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Короткий шаблон объявления:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="ads_short_tpl" value="{htmlspecialchars($config['modules']['ads']['ads_short_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Полный шаблон объявления:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="ads_full_tpl" value="{htmlspecialchars($config['modules']['ads']['ads_full_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tab2_files" role="tabpanel">
							<div class="row mb-3">
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Файлов на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="files_per_page" value="{htmlspecialchars($config['modules']['files']['files_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Файлов на страницу категории:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="files_fromcats_per_page" value="{htmlspecialchars($config['modules']['files']['files_fromcats_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Комментариев на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="files_comments_limit" value="{htmlspecialchars($config['modules']['files']['comments_limit'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Короткий шаблон файла:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="files_short_tpl" value="{htmlspecialchars($config['modules']['files']['files_short_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Полный шаблон файла:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="files_full_tpl" value="{htmlspecialchars($config['modules']['files']['files_full_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tab2_movies" role="tabpanel">
							<div class="row mb-3">
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Фильмов на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="movies_per_page" value="{htmlspecialchars($config['modules']['movies']['movies_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Фильмов на страницу категории:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="movies_fromcats_per_page" value="{htmlspecialchars($config['modules']['movies']['movies_fromcats_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Комментариев на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="movies_comments_limit" value="{htmlspecialchars($config['modules']['movies']['comments_limit'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Короткий шаблон фильма:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="movies_short_tpl" value="{htmlspecialchars($config['modules']['movies']['movies_short_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Полный шаблон фильма:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="movies_full_tpl" value="{htmlspecialchars($config['modules']['movies']['movies_full_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tab2_news" role="tabpanel">
							<div class="row mb-3">
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Новостей на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="news_per_page" value="{htmlspecialchars($config['modules']['news']['news_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Новостей на страницу категории:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="news_fromcats_per_page" value="{htmlspecialchars($config['modules']['news']['news_fromcats_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Комментариев на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="news_comments_limit" value="{htmlspecialchars($config['modules']['news']['comments_limit'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Короткий шаблон новости:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="news_short_tpl" value="{htmlspecialchars($config['modules']['news']['news_short_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Полный шаблон новости:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="news_full_tpl" value="{htmlspecialchars($config['modules']['news']['news_full_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tab2_products" role="tabpanel">
							<div class="row mb-3">
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Товаров на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="products_per_page" value="{htmlspecialchars($config['modules']['products']['products_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Товаров на страницу категории:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="products_fromcats_per_page" value="{htmlspecialchars($config['modules']['products']['products_fromcats_per_page'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Комментариев на страницу:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="products_comments_limit" value="{htmlspecialchars($config['modules']['products']['comments_limit'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Короткий шаблон товара:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="products_short_tpl" value="{htmlspecialchars($config['modules']['products']['products_short_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Полный шаблон товара:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<input type="text" class="form-control" name="products_full_tpl" value="{htmlspecialchars($config['modules']['products']['products_full_tpl'])}">
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
								<div class="col-12 col-md-4 mb-2">
									<label class="col-form-label">Валюта по умолчанию:</label>
									<fieldset class="form-icon-group left-icon position-relative">
										<select class="form-select array-select form-control" name="default_currency">
											<option value="{htmlspecialchars($config['modules']['products']['default_currency'])}" selected hidden>{htmlspecialchars($config['modules']['products']['default_currency'])}</option>
											<option value="USD">USD</option>
											<option value="RUB">RUB</option>
										</select>
										<div class="form-icon position-absolute">
											<img src="{$stheme}/images/svg/option.svg" alt="">
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6">
						<button type="submit" class="btn btn-primary w-100">Сохранить</button>
					</div>
					<div class="col-6">
						<div id="response-container" style="display: none;">
							<div class="alert alert-success py-1 rounded-3" role="alert">Настройки сохранены и вступят в силу через <span id="countdown">3</span>!</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	document.addEventListener('submit', function(event) {
		// Проверяем, что событие произошло внутри формы
		if (event.target.tagName.toLowerCase() === 'form') {
			// Отображаем блок с сообщением
			document.getElementById('response-container').style.display = 'block';
			// Отправляем форму асинхронно
			var formData = new FormData(event.target);
			var xhr = new XMLHttpRequest();
			xhr.open('POST', event.target.action, true);
			xhr.onload = function () {
				// Запускаем таймер обратного отсчета после успешного ответа сервера
				var countdown = 3;
				var countdownElement = document.getElementById('countdown');
				var countdownInterval = setInterval(function() {
					countdown--;
					countdownElement.textContent = countdown;
					// Если таймер достиг нуля, останавливаем таймер и обновляем страницу
					if (countdown <= 0) {
						clearInterval(countdownInterval);
						window.location.reload();
					}
				}, 1000);
			};
			xhr.send(formData);
			// Предотвращаем отправку формы и перезагрузку страницы
			event.preventDefault();
		}
	});
</script>
<script>
	var settingsSection = document.getElementById('settingsSection');
	settingsSection.classList.add('active');
	var settingsBlock = document.getElementById('settingsBlock');
	settingsBlock.classList.add('show');
	var currentLink = document.getElementById('commonSettings');
	currentLink.classList.add('active');
</script>