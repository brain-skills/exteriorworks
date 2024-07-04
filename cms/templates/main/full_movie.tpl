<div class="row">
    <div class="col-12 col-sm-3 mb-3">
        <img class="img-responsive aspect-ratio-1-1-5" src="{$movie.image}" alt="">
    </div>
    <div class="col-12 col-sm-9 mb-3">
        <h2>{$movie.title}</h2>
        <p class="mb-2"><span class="text-muted">Категории</span>:
            {assign var='categoryAltNames' value=','|explode:$movie.category_alt_names}
            {foreach $categories as $index => $category}
                {if $index > 0}, {/if}<a href="/mc/{$categoryAltNames[$index]|default:''|escape:'url'}">{$category}</a>
            {/foreach}
        </p>
        <p class="mb-2"><span class="text-muted">Год</span>: {$movie.year}</p>
        <p class="mb-2"><span class="text-muted">Качество</span>: {$movie.quality}</p>
        <p class="mb-2"><span class="text-muted">Режиссер</span>: {$movie.director}</p>
        <p class="mb-2"><span class="text-muted">Актеры</span>: {$movie.actors}</p>
        <p class="mb-2"><span class="text-muted">Рейтинг</span>: {$movie.rating} | <span class="text-muted">Просмотров</span>: {$movie.views} | <span class="text-muted">Tags</span>: {$movie.tags}</p>
    </div>
    <div class="col-12">
        <div class="kinobox_player" style="padding: 10px; background: #111; border-top: 2px solid #222; border-bottom: 2px solid #222;"></div>
        <script src="https://kinobox.tv/kinobox.min.js"></script>
        <script>
            new Kinobox('.kinobox_player', {
                search: {
                    kinopoisk: '{$movie.search_id}', // поиск по kinopoisk id
                    imdb: 'IMDB_ID', // поиск по imdb id
                    title: 'TITLE' // поиск по названию
                },
                'players':{},
            }).init();
        </script>
        <!-- https://kinobox.tv/docs/api/ -->
    </div>
    <div class="col-12">
        <p class="my-4">{$movie.full_desc}</p>
    </div>
</div>

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