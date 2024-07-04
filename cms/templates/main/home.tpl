<h1>Добро пожаловать на главную страницу!</h1>
<p>Здесь вы можете добавить свое содержимое для главной страницы.</p>

<div class="row mt-3">
    <div class="col-12">
        <h4 class="mb-2">Список 10 последних новостей</h4>
        <!-- Вывод последних новостей -->
        <div class="swiper-container" id="latestNewsSwiper">
            <div class="swiper-wrapper">
                {foreach $latestNews as $news}
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-5">
                                <a href="/news/{$news.alt_name}">
                                    <span class="position-absolute float-start badge rounded-pill bg-dark m-1">{$news.date|date_format:"%d-%m-%Y"}</span>
                                    <img class="img-responsive max-wpx-250" src="../{$news.image}" alt="">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="/news/{$news.alt_name}"><h6 class="text-primary">{$news.title|truncate:55:"..."}</h6></a>
                                <p class="fs-7 mb-0">{$news.short_desc|truncate:110:"..."}</p>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
            <div class="manage-buttons mb-5">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <h4 class="mb-2">Список 10 самых популярных новостей</h4>
        <!-- Вывод популярных новостей -->
        <div class="swiper-container" id="popularNewsSwiper">
            <div class="swiper-wrapper">
                {foreach $popularNews as $news}
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-5">
                                <a href="/news/{$news.alt_name}">
                                    <span class="position-absolute float-start badge rounded-pill bg-dark m-1">{$news.date|date_format:"%d-%m-%Y"}</span>
                                    <img class="img-responsive max-wpx-250" src="../{$news.image}" alt="">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="/news/{$news.alt_name}"><h6 class="text-primary">{$news.title|truncate:55:"..."}</h6></a>
                                <p class="fs-7 mb-0">{$news.short_desc|truncate:110:"..."}</p>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
            <div class="manage-buttons mb-5">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <h4 class="mb-2">Список 10 самых просматриваемых новостей</h4>
        <!-- Вывод самых просматриваемых новостей -->
        <div class="swiper-container mb-5" id="mostViewedNewsSwiper">
            <div class="swiper-wrapper">
                {foreach $mostViewedNews as $news}
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-5">
                                <a href="/news/{$news.alt_name}">
                                    <span class="position-absolute float-start badge rounded-pill bg-dark m-1">{$news.date|date_format:"%d-%m-%Y"}</span>
                                    <img class="img-responsive max-wpx-250" src="../{$news.image}" alt="">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="/news/{$news.alt_name}"><h6 class="text-primary">{$news.title|truncate:55:"..."}</h6></a>
                                <p class="fs-7 mb-0">{$news.short_desc|truncate:110:"..."}</p>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
            <div class="manage-buttons mb-5">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>