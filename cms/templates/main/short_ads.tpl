<div class="row">
    {foreach $adsList as $ads}
        {assign var='categories' value=','|explode:$ads.categories}
        <div class="col-6 col-sm-4 col-md-4">
            <div class="card mb-3" style="background: transparent; border: none;">
                <div class="card-body p-0">
                    <div class="position-absolute w-100">
                        <span class="float-start badge rounded-1 bg-dark m-1">
                            <span class="{if $ads.authority == 'VIP'}text-warning{elseif $ads.authority == 'Exclusive'}text-danger{elseif $ads.authority == 'Premium'}text-primary{/if}">{$ads.authority}</span>
                        </span>
                        <span class="float-end badge rounded-1 bg-light text-success fs-7 m-1">{$ads.price}</span>
                    </div>
                    <a href="/ads/{$ads.alt_name}">
                        <img class="img-responsive" src="../{$ads.image}" alt="">
                        <h6 class="mt-2 mb-0 text-center" style="height: 40px">{$ads.title|truncate:60:"..."}</h6>
                    </a>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{include file="./navigation.tpl"}

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