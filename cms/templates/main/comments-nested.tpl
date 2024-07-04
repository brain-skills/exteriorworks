{if $comments|@count > 0}
    <ul class="list-unstyled nested-comments">
        {foreach $comments as $comment}
            <li class="mb-3 ms-4">
                <div class="comment">
                    <strong>{$comment.author}</strong> <span class="text-muted">{$comment.date}</span>
                    <p>{$comment.content|nl2br}</p>
                </div>
                <button class="btn btn-link reply-button" data-bs-toggle="collapse" data-bs-target="#replyForm{$comment.id}" aria-expanded="false" aria-controls="replyForm{$comment.id}">
                    Ответить
                </button>
                <div class="collapse mt-3" id="replyForm{$comment.id}">
                    {include file='main/add-comment.tpl' commentId=$comment.id news=$news}
                </div>
                <!-- Рекурсивно вложенные комментарии -->
                {if isset($comment.replies) && $comment.replies|@count > 0}
                    {include file='main/comments-nested.tpl' comments=$comment.replies news=$news}
                {/if}
            </li>
        {/foreach}
    </ul>
{/if}