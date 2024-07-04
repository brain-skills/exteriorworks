{* list.tpl *}
<h2>{$page_name}</h2>

{if isset($action) && $action == 'list'}
    <ul>
        {foreach $tpl_files as $tpl_file}
            <li><a href="admin.php?action=tpl_editor&sub_action=edit&tpl_file={$tpl_file}">{$tpl_file}</a></li>
        {/foreach}
    </ul>
{/if}