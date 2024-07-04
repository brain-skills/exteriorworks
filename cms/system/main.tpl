{if isset($user_group_id) && $user_group_id <= 4}
    {include file="system/admin.tpl"}
{else}
    {include file="system/login.tpl"}
{/if}