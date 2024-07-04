<div class="col-12">
    <h5 class="mt-0"><a href="/ads" target="_blank">Все объявления</a>:</h5>
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
            {foreach $ads as $ad}
                <tr>
                    <td class="border-end text-center text-muted">{$ad.id}</td>
                    <td class="border-end text-center text-muted">{$ad.date|date_format:"%d-%m-%y"}</td>
                    <td class="border-end"><a href="/ads/{$ad.alt_name}" target="_blank">{$ad.title}</a></td>
                    <td class="border-end fs-8 py-1">
                        {assign var='categoryAltNames' value=','|explode:$ad.category_alt_names}
                        {foreach $ad.category_links as $index => $link}
                            {if $index > 0}, {/if}<a href="{$link}" target="_blank">{$ad.category_names[$index]|default:''}</a>
                        {/foreach}
                    </td>
					<td class="border-end text-center text-muted">{$ad.views}</td>
					<td class="border-end text-center">
                        <div class="btn-group">
                            <a href="/admin?action=ads_edit&id={$ad.id}" class="mx-1 top-1"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="/admin?action=ads" style="display:inline;">
                                <input type="hidden" name="delete_page_id" value="{$ad.id}">
                                <button type="submit" class="no-b mx-1" onclick="return confirm('Вы уверены, что хотите удалить это объявление?');">
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
	var currentLink = document.getElementById('adsList');
	currentLink.classList.add('active');
</script>