<div class="row">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
        <img class="img-responsive" src="../../{$news.image}" alt="" style="min-height: 210px;">
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 mb-3">
        <h4 class="fs-5">{$news.title}</h4>
        <p class="mb-2"><span class="text-muted">Категории</span>:
            {assign var='categoryAltNames' value=','|explode:$news.category_alt_names}
            {foreach $categories as $index => $category}
                {if $index > 0}, {/if}<a href="/nc/{$categoryAltNames[$index]|default:''|escape:'url'}">{$category}</a>
            {/foreach}
        </p>
        <p><span class="text-muted">Просмотров:</span> {$news.views} | <span class="text-muted">Рейтинг:</span> {$news.rating} | <span class="text-muted">Теги:</span> {$news.tags}</p>
    </div>
    <div class="col-12 mt-2">
        <div class="bg-dark text-light px-2 mb-3">{$news.short_desc}</div>
        <div class="bg-dark text-light px-2 mb-3">{$news.full_desc}</div>
    </div>
    <div class="col-12 mt-3">
        <h5>Комментарии:</h5>
        {include file='main/comments.tpl' comments=$comments news=$news}
    </div>
</div>

<script>
	var allSectionsBlock = document.getElementById('allSectionsBlock');
	var news = document.getElementById('news');
	var newsList = document.getElementById('newsList');
	var allSectionsList = document.getElementById('allSectionsList');
	allSectionsList.classList.add('active');
	newsList.classList.add('active');
	allSectionsBlock.classList.add('show');
	news.classList.add('show');
</script>