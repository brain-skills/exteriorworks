<div class="col-12">
	<table class="table">
		<tbody>
			<tr>
				<th width="70px" class="border-end text-center">id</th>
				<th class="border-end">name</th>
				<th class="border-end">alt_name</th>
				<th class="border-end">short_tpl</th>
				<th class="border-end">full_tpl</th>
			</tr>
			{foreach $categories as $category}
				<tr>
					<td class="border-end text-center">{$category.id}</td>
					<td class="border-end">{$category.name}</td>
					<td class="border-end">{$category.alt_name}</td>
					<td class="border-end">{$category.short_tpl}</td>
					<td class="border-end">{$category.full_tpl}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>
<script>
	var categoriesSection = document.getElementById('categoriesSection');
	categoriesSection.classList.add('active');
	var categoriesBlock = document.getElementById('categoriesBlock');
	categoriesBlock.classList.add('show');
	var currentLink = document.getElementById('productsCategoriesList');
	currentLink.classList.add('active');
</script>