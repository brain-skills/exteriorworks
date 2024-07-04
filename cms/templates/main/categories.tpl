<!-- Для отображения списка категорий в виде кнопок -->
<div class="d-inline-block mb-3">
    <h5 class="mb-0">Категории новостей:</h5>
    <div class="mb-2">
        {foreach $news_categories as $category}
            <a href="/nc/{$category.alt_name}" class="btn btn-sm btn-primary my-2 mx-1">{$category.name}</a>
        {/foreach}
    </div>
    <h5 class="mb-0">Категории фильмов:</h5>
    <div class="mb-2">
        {foreach $movie_categories as $category}
            <a href="/mc/{$category.alt_name}" class="btn btn-sm btn-primary my-2 mx-1">{$category.name}</a>
        {/foreach}
    </div>
    <h5 class="mb-0">Категории товаров:</h5>
    <div class="mb-2">
        {foreach $products_categories as $category}
            <a href="/pc/{$category.alt_name}" class="btn btn-sm btn-primary my-2 mx-1">{$category.name}</a>
        {/foreach}
    </div>
    <h5 class="mb-0">Категории объявлений:</h5>
    <div class="mb-2">
        {foreach $ads_categories as $category}
            <a href="/ac/{$category.alt_name}" class="btn btn-sm btn-primary my-2 mx-1">{$category.name}</a>
        {/foreach}
    </div>
    <h5 class="mb-0">Категории файлов:</h5>
    <div class="mb-2">
        {foreach $files_categories as $category}
            <a href="/fc/{$category.alt_name}" class="btn btn-sm btn-primary my-2 mx-1">{$category.name}</a>
        {/foreach}
    </div>
</div>