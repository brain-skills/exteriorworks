<div class="row">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
        <img class="img-responsive" src="../../{$file.image}" alt="" style="min-height: 210px;">
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 mb-3">
        <h4 class="fs-5">{$file.title}</h4>
        <p class="mb-2"><span class="text-muted">Категории</span>:
            {assign var='categoryAltNames' value=','|explode:$file.category_alt_names}
            {foreach $categories as $index => $category}
                {if $index > 0}, {/if}<a href="/fc/{$categoryAltNames[$index]|default:''|escape:'url'}">{$category}</a>
            {/foreach}
        </p>
        <div class="row">
            <div class="col-6">
                <p class="mb-2"><span class="text-muted">Версия:</span> {$file.version}</p>
                <p class="mb-2"><span class="text-muted">Цена:</span> {$file.price}</p>
            </div>
            <div class="col-6">
                <p class="mb-2"><span class="text-muted">Лицензия:</span> {$file.license}</p>
                <p class="mb-2"><span class="text-muted">Контактная информация:</span> {$file.contact_info}</p>
            </div>
        </div>
        <p><span class="text-muted">Просмотров:</span> {$file.views} | <span class="text-muted">Скачиваний:</span> 0</p>
        <pre class="bg-dark text-light px-2 py-2">{$file.short_desc}</pre>
        <p><a href="../../{$file.file_path}" class="fs-4" download>Скачать файл ({$fileSizeFormatted})</a></p>
    </div>
    <div class="col-12 mt-2">
        <pre class="bg-dark text-light px-2 py-2">{$file.full_desc}</pre>
    </div>
</div>

<script>
	var allSectionsBlock = document.getElementById('allSectionsBlock');
	var files = document.getElementById('files');
	var filesList = document.getElementById('filesList');
	var allSectionsList = document.getElementById('allSectionsList');
	allSectionsList.classList.add('active');
	filesList.classList.add('active');
	allSectionsBlock.classList.add('show');
	files.classList.add('show');
</script>