<li class="nav-item user ms-1">
    <a class="dropdown-toggle gray-6 d-flex text-decoration-none align-items-center lh-sm p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="User" data-bs-auto-close="outside">
        <img class="avatar rounded-1 border border-3" src="{$avatar}" alt="avatar">
        <span class="ms-2 fs-6 d-none d-sm-inline-flex">{$user_name}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-end shadow p-2 p-xl-3 rounded-2">
        {if $user_authenticated}
        <div class="bg-body p-3 rounded-3">
            <h4 class="mb-1 title-font text-gradient">{$user_name}</h4>
            <p class="small text-muted mb-2"><b>E-mail:</b> {$user_email}</p>
            <p class="small text-muted mb-0"><b>Группа:</b> {$group_name}</p>
        </div>
        <ul class="list-unstyled mt-2">
            <li>
                <a class="dropdown-item rounded-1" aria-label="my wallet" href="my-wallet.html">
                    <span class="align-middle">Баланс: <span class="fw-bold text-success"><span data-purecounter-start="0" data-purecounter-separator="," data-purecounter-currency="$" data-purecounter-end="{$user_balance}" class="purecounter">0</span></span></span>
                </a>
            </li>
            <a class="dropdown-item rounded-1" href="/profile">Настройки профиля</a>
            {if $user_group_id <= 3}<a class="dropdown-item rounded-1" href="/admin">Панель управления</a>{/if}
            <li class="dropdown-divider"></li>
        </ul>
        <a class="btn py-2 btn-primary w-100 mt-2 rounded-1" href="#" onclick="logout(event)">
            <img src="system/assets/svg/logout.svg" alt="">
            <span style="top: 1.5px; left:3px; position: relative;">Выйти с админ панели</span>
        </a>
        <script>
            function logout(event) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'engine/logout.php', true);
                xhr.onload = function () {
                    location.reload();
                };
                xhr.send();
                event.preventDefault();
            }
        </script>
        {else}
            <h4>Форма авторизации</h4>
            <form method="POST" action="index.php" class="mb-0">
                <label for="email">Email:</label>
                <input class="form-control mt-2 mb-2" type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input class="form-control mt-2 mb-2" type="password" id="password" name="password" required>
                <button type="submit" class="btn btn-primary w-100 mt-2 mb-0">Войти</button>
                {if isset($error_message)}
                    <p>{$error_message}</p>
                {/if}
            </form>
        {/if}
        <div class="mt-2 text-center small">
            <a class="text-muted me-1" href="#!">Политика</a>•<a class="text-muted mx-1" href="#!">Условия</a>•<a class="text-muted ms-1" href="#!">Cookies</a>
        </div>
    </div>
</li>