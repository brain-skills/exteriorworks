<aside class="ps-3 pe-2 py-4 sidebar" data-bs-theme="none">
    <nav class="navbar navbar-expand-xl py-0">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvas_Navbar">
            <div class="offcanvas-header">
                <div class="d-flex">
                    <a href="/se-cms/" class="brand-icon mx-3" title="">
                        <img src="{$stheme}/images/logo.svg" class="d-xl-inline-flex mt-3" alt="">
                    </a>
                </div>
                <button type="button" class="btn-close btn-close-white me-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-column custom_scroll ps-4 ps-xl-0">
                <!-- start: Workspace -->
                <h6 class="fl-title title-font ps-2 small text-uppercase text-muted" style="--text-color: var(--accent-color)">Все разделы</h6>
                <ul class="list-unstyled menu-list">
                    <li>
                        <a href="/" class="border-success" id="settingsLink">
                            <img src="{$theme}/svg/home.svg" alt="">
                            <span class="mx-2">Главная страница</span>
                        </a>
                    </li>
                    <li>
                        <a href="/news" class="border-success" id="settingsLink">
                            <img src="{$theme}/svg/news.svg" alt="">
                            <span class="mx-2">Новости / Обновления</span>
                        </a>
                    </li>
                    <li>
                        <a href="#allSectionsBlock" id="allSectionsList" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <img src="{$theme}/svg/modules.svg" alt="">
                            <span class="mx-2">Демонстрация модулей</span>
                        </a>
                        <ul class="collapse list-unstyled" id="allSectionsBlock">
                            <li>
                                <a href="#news" id="newsList" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle fl5">Новости</a>
                                <ul class="collapse list-unstyled" id="news">
                                    {foreach $news_categories as $category}
                                        {assign var="translit_name" value=$category.name}
                                        {foreach $config.translit_converter as $from => $to}
                                            {assign var="translit_name" value=str_replace($from, $to, $translit_name)}
                                        {/foreach}
                                        {assign var="translit_name" value=str_replace(' ', '_', $translit_name)} {* Если нужно заменить пробелы на подчеркивания *}
                                        <li><a href="/nc/{$category.alt_name}" id="{$translit_name}">{$category.name}</a></li>
                                    {/foreach}
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#info" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <img src="{$theme}/svg/info.svg" alt="">
                            <span class="mx-2">Информация</span>
                        </a>
                        <ul class="collapse list-unstyled" id="info">
                            <li><a href="/license">Лицензионное соглашение</a></li>
                            <li><a href="#">Системные требования</a></li>
                            <li><a href="#">Возможности Smart Engine</a></li>
                            <li><a href="#">Видеоинструкции</a></li>
                            <li><a href="#">Техническая поддержка</a></li>
                            <li><a href="https://docs.skills.energy/">Онлайн документация</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/demonstration" class="border-success" id="demonstration">
                            <img src="{$theme}/svg/download.svg" alt="">
                            <span class="mx-2">Демо</span>
                        </a>
                    </li>
                    <li>
                        <a href="/license_buy" class="border-success" id="license_buy">
                            <img src="{$theme}/svg/buy.svg" alt="">
                            <span class="mx-2">Купить</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://forum.skills.energy" class="border-success" id="settingsLink">
                            <img src="{$theme}/svg/forum.svg" alt="">
                            <span class="mx-2">Форум</span>
                        </a>
                    </li>
                    <li>
                        <a href="/contacts" class="border-success" id="contacts">
                            <img src="{$theme}/svg/mail.svg" alt="">
                            <span class="mx-2">Наши контакты</span>
                        </a>
                    </li>
                </ul>
                <div class="bg-gradient rounded-3 p-4 text-white promo">
                    <a href="#" class="btn btn-sm w-100 btn-dark" id="docsLink" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="Текущая актуальная версия CMS Skills Energy.">
                        Актуальная версия: <b>1.0</b>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Получить текущий путь страницы
        var currentPath = window.location.pathname;
        // Найти ссылку с соответствующим атрибутом href
        var activeLink = document.querySelector('a[href="' + currentPath + '"]');
        // Проверить, найден ли элемент
        if (activeLink) {
            activeLink.classList.add('active');
        }
    });
</script>