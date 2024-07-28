{foreach $comments as $comment}
    <li class="mb-4">
        <div class="comment">
            {if isset($comment.author)}
            <button class="border-0 bg-transparent reply-button float-end text-success" data-bs-toggle="collapse" data-bs-target="#replyForm{$comment.id}" aria-expanded="false" aria-controls="replyForm{$comment.id}">
                Ответить
            </button>
            <p class="mb-0 d-block">
                <strong>{$comment.author}</strong>
                {if isset($comment.date)}<span class="text-muted"> | {$comment.date}</span>{/if}</p>
            {/if}
            {if isset($comment.content)}
                <pre class="d-block w-100">{$comment.content|nl2br}</pre>
                <div class="collapse mt-3" id="replyForm{$comment.id}">
                    {include file='main/add-comment.tpl' commentId=$comment.id news=$news}
                </div>
            {/if}
        </div>
    </li>
    {if isset($comment.replies) && $comment.replies|@count > 0}
        <ul class="list-unstyled nested-comments">
            {include file='main/comments-list.tpl' comments=$comment.replies}
        </ul>
    {/if}
{/foreach}