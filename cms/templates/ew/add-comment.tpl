<form method="post" action="">
    <input type="hidden" name="action" value="add_comment">
    <input type="hidden" name="news_id" value="{$news.id}">
    {if isset($commentId)}
        <input type="hidden" name="parent_id" value="{$commentId}">
    {/if}
    <div class="mb-3">
        <label for="author" class="form-label">Имя</label>
        <input type="text" class="form-control" id="author" name="author" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Комментарий</label>
        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>