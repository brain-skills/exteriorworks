<div class="row">
    {foreach $filesList as $file}
        {assign var='categories' value=','|explode:$file.categories}
        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
            <div class="card" style="background: transparent; border: none;">
                <div class="card-body p-0">
                    <a href="/files/{$file.alt_name}">
                        <span class="position-absolute float-start badge rounded-pill bg-dark m-1">{$file.date|date_format:"%d-%m-%Y"}</span>
                        <img class="img-responsive" src="../{$file.image}" alt="">
                        <h6 class="mt-2 mb-0 text-center" style="height: 40px">{$file.title|truncate:60:"..."}</h6>
                    </a>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{include file="./navigation.tpl"}

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