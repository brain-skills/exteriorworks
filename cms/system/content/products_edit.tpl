{block name="content"}
<form method="post" action="/admin?action=products_edit" enctype="multipart/form-data">
	<div class="row">
		<div class="col-12">
			<ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
				<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Основная информация</button>
				</li>
				<li class="nav-item" role="presentation">
				<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">SEO</button>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="row">
						<div class="col-6">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="date" class="form-control mt-2 mb-2" name="date" id="date" value="{$page.date}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
										<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
									</svg>
								</div>
							</fieldset>
							<div class="input-group">
								<input name="title" type="text" class="form-control mt-2 mb-2" placeholder="Заголовок товара" value="{$page.title}">
								<div class="input-group-prepend">
								  <span class="input-group-text mt-2 mb-2" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Заголовок товара. Допустимо использование символов и пробелов">?</span>
								</div>
							</div>
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="alt_name" id="alt_name" placeholder="ЧПУ URL товара" value="{$page.alt_name}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-6">
							<select class="form-select array-select form-control mt-2 mb-2 h142" name="category[]" id="category" multiple>
								<option disabled value="">- Категория -</option>
								{foreach from=$categories item=category}
									{if $category.parentid == 0}
										<option value="{$category.name}" style="font-weight: bold;"
											{if in_array($category.name, $selectedCategories)}selected{/if}>
											{$category.name}
										</option>
										{foreach from=$categories item=subcategory}
											{if $subcategory.parentid == $category.id}
												<option value="{$subcategory.name}"
													{if in_array($subcategory.name, $selectedCategories)}selected{/if}>
													{$subcategory.name}
												</option>
											{/if}
										{/foreach}
									{/if}
								{/foreach}
							</select>
						</div>
						<div class="col-3">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="price" id="price" placeholder="Стоимость" value="{$page.price}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-2">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="stock_quantity" id="stock_quantity" placeholder="В наличии" value="{$page.stock_quantity}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-2">
							<select class="form-select array-select form-control mt-2 mb-2" name="measure_unit" id="measure_unit">
								<option disabled value="">- Единица -</option>
								<option value="{$page.measure_unit}" selected hidden>{$page.measure_unit}</option>
								<option value="Шт">Шт</option>
								<option value="Кг">Кг</option>
							</select>
						</div>
						<div class="col-2">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="mass" id="mass" placeholder="Вес" value="{$page.mass}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-3">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="sku" id="sku" placeholder="Артикул" value="{$page.sku}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-3">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="brand" id="brand" placeholder="Бренд" value="{$page.brand}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-3">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="model" id="model" placeholder="Модель" value="{$page.model}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-3">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="dimensions" id="dimensions" placeholder="Габариты" value="{$page.dimensions}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-3">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="material" id="material" placeholder="Материал" value="{$page.material}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-2">
							<select class="form-select array-select form-control mt-2 mb-2" name="color" id="color">
								<option disabled value="">- Цвет -</option>
								<option value="{$page.color}" selected hidden>{$page.color}</option>
								<option value="Красный">Красный</option>
								<option value="Оранжевый">Оранжевый</option>
								<option value="Желтый">Желтый</option>
								<option value="Зелёный">Зелёный</option>
								<option value="Голубой">Голубой</option>
								<option value="Синий">Синий</option>
								<option value="Фиолетовый">Фиолетовый</option>
								<option value="Золотой">Золотой</option>
								<option value="Розовый">Розовый</option>
								<option value="Коричневый">Коричневый</option>
								<option value="Серый">Серый</option>
								<option value="Белый">Белый</option>
								<option value="Черный">Черный</option>
							</select>
						</div>
						<div class="col-2">
							<select class="form-select array-select form-control mt-2 mb-2" name="warranty" id="warranty">
								<option disabled value="">- Гарантия -</option>
								<option value="{$page.warranty}" selected hidden>{$page.warranty}</option>
								<option value="1 неделя">1 неделя</option>
								<option value="2 недели">2 недели</option>
								<option value="1 месяц">1 месяц</option>
								<option value="2 месяца">2 месяца</option>
								<option value="3 месяца">3 месяца</option>
								<option value="6 месяцев">6 месяцев</option>
								<option value="1 год">1 год</option>
								<option value="2 года">2 года</option>
								<option value="3 года">3 года</option>
								<option value="5 лет">5 лет</option>
								<option value="10 лет">10 лет</option>
							</select>
						</div>
						<div class="col-2">
							<select class="form-select array-select form-control mt-2 mb-2" name="discount" id="discount">
								<option disabled value="">- Скидка -</option>
								<option value="{$page.discount}" selected hidden>{$page.discount}</option>
								<option value="5%">5%</option>
								<option value="10%">10%</option>
								<option value="15%">15%</option>
								<option value="20%">20%</option>
								<option value="25%">25%</option>
								<option value="30%">30%</option>
								<option value="35%">35%</option>
								<option value="40%">40%</option>
								<option value="45%">45%</option>
								<option value="50%">50%</option>
								<option value="55%">55%</option>
								<option value="60%">60%</option>
								<option value="65%">65%</option>
								<option value="70%">70%</option>
								<option value="75%">75%</option>
								<option value="80%">80%</option>
								<option value="85%">85%</option>
								<option value="90%">90%</option>
							</select>
						</div>
						<div class="col-3">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="min_order" id="min_order" placeholder="Минимальный заказ" value="{$page.min_order}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-3">
							<select class="form-select array-select form-control mt-2 mb-2" name="promotion" id="promotion">
								<option disabled value="">- Акция -</option>
								<option value="{$page.promotion}" selected hidden>{$page.promotion}</option>
								<option value="1=Бонус за покупку">1=Бонус за покупку</option>
								<option value="1=Участие в розыгрыше">1=Участие в розыгрыше</option>
								<option value="1=2">1=2</option>
								<option value="1+1=3">1+1=Бесплатная доставка</option>
								<option value="1+1=3">1+1=3</option>
								<option value="1+1=4">1+1=4</option>
							</select>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="row">
						<div class="col-12">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="meta_keys" id="meta_keys" placeholder="Meta keywords" value="{$page.meta_keys}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
						<div class="col-12">
							<fieldset class="form-icon-group left-icon position-relative">
								<input type="text" class="form-control mt-2 mb-2" name="meta_desc" id="meta_desc" placeholder="Meta description" value="{$page.meta_desc}">
								<div class="form-icon position-absolute">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
										<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
										<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
									</svg>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12">
			<h6 class="mt-2">Короткое описание:</h6>
			<textarea id="short_desc" name="short_desc">{$page.short_desc}</textarea>
		</div>
		<div class="col-12">
			<h6 class="mt-3">Полное описание:</h6>
			<textarea id="full_desc" name="full_desc">{$page.full_desc}</textarea>
		</div>
		<div class="col-12">
			<h6 class="mt-3">Изображение: <input name="image" type="file" /></h6>
			<img src="{$page.image}" style="width: 100px;" alt="">
		</div>
		<div class="col-3">
			<button type="submit" name="addproduct" class="btn btn-success mt-2 mb-2">Добавить</button>
		</div>
		<input type="hidden" name="folder" id="folder" value="products">
		<input type="hidden" name="p_id" id="p_id" value="{$page_id}">
		<input type="hidden" name="page_id" value="{$page.id}">
	</div>
</form>
{/block}
<script>
	var contentSection = document.getElementById('contentSection');
	contentSection.classList.add('active');
	var contentBlock = document.getElementById('contentBlock');
	contentBlock.classList.add('show');
	var currentLink = document.getElementById('addProducts');
	currentLink.classList.add('active');

	document.getElementById('date').valueAsDate = new Date();
</script>