<div class="col-12">
	<table class="table">
		<tbody>
			<tr>
				<th width="70px" class="border-end text-center">id</th>
				<th class="border-end">name</th>
				<th class="border-end fl-title" style="--text-color: var(--accent-color)">Create</th>
				<th class="border-end fl-title" style="--text-color: var(--accent-color)">Read</th>
				<th class="border-end fl-title" style="--text-color: var(--accent-color)">Update</th>
				<th class="border-end fl-title" style="--text-color: var(--accent-color)">Del</th>
				<th width="70px" class="text-center">count</th>
			</tr>
			{foreach $rows as $row}
				<tr>
					<td class="border-end text-center">{$row.id}</td>
					<td class="border-end">{$row.name}</td>
					<td class="border-end">{$row.create}</td>
					<td class="border-end">{$row.read}</td>
					<td class="border-end">{$row.update}</td>
					<td class="border-end">{$row.del}</td>
					<td class="border-end text-center">{$row.user_count}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>
<script>
	var usersSection = document.getElementById('usersSection');
	usersSection.classList.add('active');
	var usersBlock = document.getElementById('usersBlock');
	usersBlock.classList.add('show');
	var currentLink = document.getElementById('rolesAndRights');
	currentLink.classList.add('active');
</script>