<div class="row">
    {foreach $moviesList as $movie}
        {assign var='categories' value=','|explode:$movie.categories}
        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
            <div class="card mb-3" style="background: transparent; border: none;">
                <div class="card-body p-0">
                    <span class="position-absolute float-start badge rounded-pill bg-dark m-1">{$movie.year}</span>
                    <a href="/movies/{$movie.alt_name}">
                        <img class="img-responsive aspect-ratio-1-1-5" src="{$movie.image}" alt="">
                        <h6 class="mt-2 mb-0 text-center" style="height: 40px">{$movie.title|truncate:60:"..."}</h6>
                    </a>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{include file="./navigation.tpl"}

<script>
	var allSectionsBlock = document.getElementById('allSectionsBlock');
	var movies = document.getElementById('movies');
	var moviesList = document.getElementById('moviesList');
	var allSectionsList = document.getElementById('allSectionsList');
	allSectionsList.classList.add('active');
	moviesList.classList.add('active');
	allSectionsBlock.classList.add('show');
	movies.classList.add('show');
</script>