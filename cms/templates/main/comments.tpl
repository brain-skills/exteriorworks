<hr class="border-success border-2">
<div class="comments">
    {if $comments|@count > 0}
        <ul class="list-unstyled">
            {include file='main/comments-list.tpl' comments=$comments}
        </ul>
    {else}
        <p>Комментариев пока нет.</p>
    {/if}

    <hr class="border-success border-2 mt-4">
    <h5>Добавить комментарий:</h5>
    {include file='main/add-comment.tpl' news=$news}
</div>