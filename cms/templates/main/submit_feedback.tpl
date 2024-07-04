<form method="post">
    <div class="row">
        <div class="col-12 col-md-4 mb-2">
            <label class="col-form-label">Имя:</label>
            <fieldset class="form-icon-group left-icon position-relative">
                <input type="text" class="form-control" name="name" placeholder="">
                <div class="form-icon position-absolute">
                    <img src="{$stheme}/images/svg/option.svg" alt="">
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-4 mb-2">
            <label class="col-form-label">Электронная почта:</label>
            <fieldset class="form-icon-group left-icon position-relative">
                <input type="text" class="form-control" name="email" placeholder="">
                <div class="form-icon position-absolute">
                    <img src="{$stheme}/images/svg/option.svg" alt="">
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-4 mb-2">
            <label class="col-form-label">Тема обращения:</label>
            <fieldset class="form-icon-group left-icon position-relative">
                <select class="form-select array-select form-control" name="subject">
                    <option value="Обратная связь" selected>Обратная связь</option>
                    <option value="Техническая поддержка">Техническая поддержка</option>
                    <option value="Жалоба">Жалоба</option>
                </select>
                <div class="form-icon position-absolute">
                    <img src="{$stheme}/images/svg/option.svg" alt="">
                </div>
            </fieldset>
        </div>
        <div class="col-12 col-md-12 mb-2">
            <label class="col-form-label">Сообщение:</label>
            <fieldset class="form-icon-group position-relative">
                <textarea class="form-control mt-2 mb-2" rows="3" name="message" spellcheck="false"></textarea>
            </fieldset>
        </div>
    </div>
    <button type="submit" name="submit_feedback">Отправить</button>
</form>