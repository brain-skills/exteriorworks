<div class="col-12">
    <h5 class="mt-0"><a href="/files" target="_blank">Все файлы</a>:</h5>
    <table class="table vertical-align-middle">
        <tbody>
            <tr>
                <th class="border-end text-center" width="50px">id</th>
                <th class="border-end text-center" width="90px">date</th>
                <th class="border-end text-center">title</th>
                <th class="border-end text-center" width="260px">categories</th>
				<th class="border-end text-center" width="70px">views</th>
				<th class="border-end text-center" width="80px">actions</th>
            </tr>
            {foreach $files as $file}
                <tr>
                    <td class="border-end text-center text-muted">{$file.id}</td>
                    <td class="border-end text-center text-muted">{$file.date|date_format:"%d-%m-%y"}</td>
                    <td class="border-end"><a href="/files/{$file.alt_name}" target="_blank">{$file.title}</a></td>
                    <td class="border-end fs-8 py-1">
                        {assign var='categoryAltNames' value=','|explode:$file.category_alt_names}
                        {foreach $file.category_links as $index => $link}
                            {if $index > 0}, {/if}<a href="{$link}" target="_blank">{$file.category_names[$index]|default:''}</a>
                        {/foreach}
                    </td>
					<td class="border-end text-center text-muted">{$file.views}</td>
					<td class="border-end text-center">
                        <div class="btn-group">
                            <a href="/admin?action=files_edit&id={$file.id}" class="mx-1 top-1"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="/admin?action=files" style="display:inline;">
                                <input type="hidden" name="delete_page_id" value="{$file.id}">
                                <button type="submit" class="no-b mx-1" onclick="return confirm('Вы уверены, что хотите удалить этот файл?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
					</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
<script>
	var contentSection = document.getElementById('contentSection');
	contentSection.classList.add('active');
	var contentBlock = document.getElementById('contentBlock');
	contentBlock.classList.add('show');
	var currentLink = document.getElementById('filesList');
	currentLink.classList.add('active');
</script>