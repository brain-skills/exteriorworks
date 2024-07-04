<div class="row">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-3">
        <img class="img-responsive" src="../../{$ad.image}" alt="" style="min-height: 210px;">
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 mb-3">
        <h4 class="fs-5">{$ad.title}</h4>
        <p class="mb-2"><span class="text-muted">Категории</span>:
            {assign var='categoryAltNames' value=','|explode:$ad.category_alt_names}
            {foreach $categories as $index => $category}
                {if $index > 0}, {/if}<a href="/ac/{$categoryAltNames[$index]|default:''|escape:'url'}">{$category}</a>
            {/foreach}
        </p>
        <p class="text-success fs-5"><span class="text-muted">Цена:</span> {$ad.price}</p>
        <p><span class="text-muted">Просмотров:</span> {$ad.views} | <span class="text-muted">Тип:</span> <span class="{if $ad.authority == 'VIP'}text-warning{elseif $ad.authority == 'Exclusive'}text-danger{elseif $ad.authority == 'Premium'}text-primary{/if}">{$ad.authority}</span></p>
        <p><span class="text-muted">E-mail:</span> <a href="mailto:{$ad.email}">{$ad.email}</a> | <span class="text-muted">Phone:</span> <a href="tel:{$ad.phone}">{$ad.phone}</a></p>
        <pre class="bg-dark text-light px-2 py-2">{$ad.short_desc}</pre>
    </div>
    <div class="col-12 mt-2">
        <pre class="bg-dark text-light px-2 py-2">{$ad.full_desc}</pre>
    </div>
</div>

<script>
	var allSectionsBlock = document.getElementById('allSectionsBlock');
	var ads = document.getElementById('ads');
	var adsList = document.getElementById('adsList');
	var allSectionsList = document.getElementById('allSectionsList');
	allSectionsList.classList.add('active');
	adsList.classList.add('active');
	allSectionsBlock.classList.add('show');
	ads.classList.add('show');
</script>