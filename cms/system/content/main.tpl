<div class="row">
    <h6 style="color: var(--theme-color1)">Общая информация:</h6>
    <div class="col-4 mb-3">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                    <td>Версия CMS:</td>
                    <td class="border-start text-center"><span class="text-muted">0.0.0.0.0.0.4.0</span></td>
                </tr>
                <tr>
                    <td>Тип лицензии:</td>
                    <td class="border-start text-center"><span class="text-muted">Постоянный</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-4 mb-3">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                    <td>Web server:</td>
                    <td class="border-start text-center"><span class="text-muted">Apache</span></td>
                </tr>
                <tr>
                    <td>Server charset:</td>
                    <td class="border-start text-center"><span class="text-muted">UTF-8</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-4 mb-3">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                    <td>Версия PHP:</td>
                    <td class="border-start text-center"><span class="text-muted">8.xx</span></td>
                </tr>
                <tr>
                    <td>Версия MySQL:</td>
                    <td class="border-start text-center"><span class="text-muted">8.xx</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr class="mb-4" style="color: var(--theme-color1)">
<div class="row mt-2">
    <div class="col mb-3">
        <h6 style="color: var(--theme-color1)">Пользователи:</h6>
        <div class="card card-stats">
            <div class="card-body custom_scroll" style="height: 180px;">
                <table class="table table-hover mb-0">
                    <tbody>
                        <tr>
                            <td>Пользователей</td>
                            <td class="border-start text-center" width="70px"><span class="text-muted">{$usersCount}</span></td>
                        </tr>
                        <tr>
                            <td>Мужчин</td>
                            <td class="border-start text-center" width="70px"><span class="text-muted">{$data.maleCount}</span></td>
                        </tr>
                        <tr>
                            <td>Женщин</td>
                            <td class="border-start text-center" width="70px"><span class="text-muted">{$data.femaleCount}</span></td>
                        </tr>
                        <tr>
                            <td>Пол не указан</td>
                            <td class="border-start text-center" width="70px"><span class="text-muted">{$data.unknownCount}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col mb-3">
        <h6 style="color: var(--theme-color1)">Пользователи по возрасту:</h6>
        <div class="card card-stats">
            <div class="card-body custom_scroll" style="height: 180px;">
                <table class="table table-hover mb-0">
                    <tbody>
                        {foreach $data.ageData as $ageItem}
                        <tr>
                            <td>{$ageItem.age} лет</td>
                            <td class="text-end"><span class="text-muted">{$ageItem.count}</span></td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col mb-3">
        <h6 style="color: var(--theme-color1)">Пользователи по городам:</h6>
        <div class="card card-stats">
            <div class="card-body custom_scroll" style="height: 180px;">
                <table class="table table-hover mb-0">
                    <tbody>
                        {foreach $data.cityData as $cityItem}
                        <tr>
                            <td>{$cityItem.city}</td>
                            <td class="text-end"><span class="text-muted">{$cityItem.count}</span></td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <h6 style="color: var(--theme-color1)">Все разделы:</h6>
    <div class="col mb-3">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                    <td>Объявлений</td>
                    <td class="border-start text-center" width="70px"><span class="text-muted">{$adsCount}</span></td>
                </tr>
                <tr>
                    <td>Файлов</td>
                    <td class="border-start text-center" width="70px"><span class="text-muted">{$filesCount}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col mb-3">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                    <td>Фильмов</td>
                    <td class="border-start text-center" width="70px"><span class="text-muted">{$moviesCount}</span></td>
                </tr>
                <tr>
                    <td>Новостей</td>
                    <td class="border-start text-center" width="70px"><span class="text-muted">{$newsCount}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col mb-3">
        <table class="table table-hover mb-0">
            <tbody>
                <tr>
                    <td>Товаров</td>
                    <td class="border-start text-center" width="70px"><span class="text-muted">{$productsCount}</span></td>
                </tr>
                <tr>
                    <td>Страниц</td>
                    <td class="border-start text-center" width="70px"><span class="text-muted">{$pagesCount}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
	var chartsSection = document.getElementById('chartsSection');
	chartsSection.classList.add('active');
	var chartsBlock = document.getElementById('chartsBlock');
	chartsBlock.classList.add('show');
	var commonCharts = document.getElementById('commonCharts');
	commonCharts.classList.add('active');
</script>