<hr class="border-success border-2">
<div class="comments">
    {if $comments|@count > 0}
        <ul class="list-unstyled">
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
                <!-- Вложенные комментарии -->
                {if isset($comment.replies) && $comment.replies|@count > 0}
                    <ul class="list-unstyled nested-comments">
                        {foreach $comment.replies as $reply}
                            <li>
                                <div class="comment">
                                    <button class="border-0 bg-transparent reply-button float-end text-success" data-bs-toggle="collapse" data-bs-target="#replyForm{$reply.id}" aria-expanded="false" aria-controls="replyForm{$reply.id}">
                                        Ответить
                                    </button>
                                    <strong class="fs-7">Ответ на комментарий от пользователя: {$reply.parent_author}</strong>
                                    <p class="mb-0">
                                        <strong>{if isset($reply.author)}{$reply.author}{/if}</strong>
                                        <span class="text-muted"> | {if isset($reply.date)}{$reply.date}{/if}</span>
                                    </p>
                                    <pre class="d-block w-100">{if isset($reply.content)}{$reply.content|nl2br}{/if}</pre>
                                    <div class="collapse mt-3" id="replyForm{$reply.id}">
                                        {include file='main/add-comment.tpl' commentId=$reply.id news=$news}
                                    </div>
                                </div>
                            </li>
                        {/foreach}
                    </ul>
                {/if}
            {/foreach}
        </ul>
    {else}
        <p>Комментариев пока нет.</p>
    {/if}

    <hr class="border-success border-2 mt-4">
    <h5>Добавить комментарий:</h5>
    {include file='main/add-comment.tpl' news=$news}
</div>