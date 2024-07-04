<div class="col-12">
	<h5 class="mt-0">Страницы:</h5>
	<table class="table vertical-align-middle">
		<tbody>
			<tr>
                <th class="border-end text-center" width="50px">id</th>
                <th class="border-end text-center" width="90px">date</th>
				<th class="border-end">title</th>
				<th class="border-end text-center" width="70px">views</th>
				<th class="border-end text-center" width="80px">actions</th>
			</tr>
			{foreach $rows as $row}
				<tr>
					<td class="border-end text-center text-muted">{$row.id}</td>
					<td class="border-end text-center text-muted">{$row.date|date_format:"%d-%m-%y"}</td>
					<td class="border-end"><a href="/{$row.alt_name}" target="_blank">{$row.title}</a></td>
					<td class="border-end text-center text-muted">{$row.views}</td>
					<td class="border-end text-center">
						<div class="btn-group">
							<a href="/admin?action=page_edit&id={$row.id}" class="mx-1 top-1"><i class="fa fa-edit"></i></a>
							<form method="POST" action="/admin?action=pages" style="display:inline;">
								<input type="hidden" name="delete_page_id" value="{$row.id}">
								<button type="submit" class="no-b mx-1" onclick="return confirm('Вы уверены, что хотите удалить эту страницу?');">
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
	var currentLink = document.getElementById('pagesList');
	currentLink.classList.add('active');
</script>