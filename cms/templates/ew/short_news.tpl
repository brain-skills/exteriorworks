<div class="row">
    {foreach $newsList as $story}
        {assign var='categories' value=','|explode:$story.categories}
        <div class="col-12 col-lg-6 mb-5">
            <div class="card" style="background: transparent; border: none;">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-5">
                            <a href="/news/{$story.alt_name}">
                                <span class="position-absolute float-start badge rounded-pill bg-dark m-1">{$story.date|date_format:"%d-%m-%Y"}</span>
                                <img class="img-responsive" src="../{$story.image}" alt="">
                            </a>
                        </div>
                        <div class="col-7">
                            <a href="/news/{$story.alt_name}"><h6 class="text-primary">{$story.title|truncate:55:"..."}</h6></a>
                            <p class="fs-7 mb-0">{$story.short_desc|truncate:110:"..."}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{include file="./navigation.tpl"}

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