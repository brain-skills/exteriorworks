<div class="col-12">
	<form method="POST" enctype="multipart/form-data">
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
									<input type="date" class="form-control mt-2 mb-2" name="date" id="date" placeholder="Дата">
									<div class="form-icon position-absolute">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
											<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
										</svg>
									</div>
								</fieldset>
								<div class="input-group">
									<input type="text" name="title" class="form-control mt-2 mb-2" placeholder="Заголовок файла">
									<div class="input-group-prepend">
									  <span class="input-group-text mt-2 mb-2" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Заголовок файла. Допустимо использование символов и пробелов">?</span>
									</div>
								</div>
								<fieldset class="form-icon-group left-icon position-relative">
									<input type="text" class="form-control mt-2 mb-2" name="alt_name" id="alt_name" placeholder="URL файла">
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
									<option selected disabled value="">- Категория -</option>
									{foreach from=$categories item=category}
										{if $category.parentid == 0}
											<option value="{$category.name}" style="font-weight: bold;">{$category.name}</option>
											{foreach from=$categories item=subcategory}
												{if $subcategory.parentid == $category.id}
													<option value="{$subcategory.name}">{$subcategory.name}</option>
												{/if}
											{/foreach}
										{/if}
									{/foreach}
								</select>
							</div>
							<div class="col-3">
								<fieldset class="form-icon-group left-icon position-relative">
									<input type="text" class="form-control mt-2 mb-2" name="price" id="price" placeholder="Стоимость">
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
									<input type="text" class="form-control mt-2 mb-2" name="version" id="version" placeholder="Версия">
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
									<input type="text" class="form-control mt-2 mb-2" name="license" id="license" placeholder="Лицензия">
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
									<input type="text" class="form-control mt-2 mb-2" name="contact_info" id="contact_info" placeholder="Контактная информация">
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
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="row">
							<div class="col-12">
								<fieldset class="form-icon-group left-icon position-relative">
									<input type="text" class="form-control mt-2 mb-2" name="meta_keys" id="meta_keys" placeholder="Meta keywords">
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
									<input type="text" class="form-control mt-2 mb-2" name="meta_desc" id="meta_desc" placeholder="Meta description">
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
				<textarea id="short_desc" name="short_desc"></textarea>
			</div>
			<div class="col-12">
				<h6 class="mt-3">Полное описание:</h6>
				<textarea id="full_desc" name="full_desc"></textarea>
			</div>
			<div class="col-6">
				<h6 class="mt-3">Файл: <input type="file" name="file" id="file"/></h6>
			</div>
			<div class="col-6">
				<h6 class="mt-3">Изображение: <input type="file" name="image"/></h6>
			</div>
			<div class="col-3">
				<button type="submit" name="addfile" class="btn btn-success mt-2 mb-2">Добавить</button>
			</div>
			<input type="hidden" name="folder" id="folder" value="files">
			<input type="hidden" name="p_id" id="p_id" value="{$page_id}">
		</div>
	</form>
</div>
<script>
	var contentSection = document.getElementById('contentSection');
	contentSection.classList.add('active');
	var contentBlock = document.getElementById('contentBlock');
	contentBlock.classList.add('show');
	var currentLink = document.getElementById('addFiles');
	currentLink.classList.add('active');

	document.getElementById('date').valueAsDate = new Date();
</script>