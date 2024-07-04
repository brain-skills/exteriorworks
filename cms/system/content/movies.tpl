<div class="col-12">
    <h5 class="mt-0"><a href="/movies" target="_blank">Все фильмы</a>:</h5>
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
            {foreach $movies as $movie}
                <tr>
                    <td class="border-end text-center text-muted">{$movie.id}</td>
                    <td class="border-end text-center text-muted">{$movie.date|date_format:"%d-%m-%y"}</td>
                    <td class="border-end"><a href="/movies/{$movie.alt_name}" target="_blank">{$movie.title}</a></td>
                    <td class="border-end fs-8 py-1">
                        {assign var='categoryAltNames' value=','|explode:$movie.category_alt_names}
                        {foreach $movie.category_links as $index => $link}
                            {if $index > 0}, {/if}<a href="{$link}" target="_blank">{$movie.category_names[$index]|default:''}</a>
                        {/foreach}
                    </td>
					<td class="border-end text-center text-muted">{$movie.views}</td>
					<td class="border-end text-center">
                        <div class="btn-group">
                            <a href="/admin?action=movies_edit&id={$movie.id}" class="mx-1 top-1"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="/admin?action=movies" style="display:inline;">
                                <input type="hidden" name="delete_page_id" value="{$movie.id}">
                                <button type="submit" class="no-b mx-1" onclick="return confirm('Вы уверены, что хотите удалить этот фильм?');">
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
	var currentLink = document.getElementById('moviesList');
	currentLink.classList.add('active');
</script>