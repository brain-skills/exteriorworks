<div class="col-12">
	<table class="table mt-4 mb-3">
		<thead class=" border-success" style="bottom: 25px; position: relative;">
			<tr>
				<th class="border-end text-center" width="60px">id</th>
				<th class="border-end">Subject</th>
				<th class="border-end">Name</th>
				<th class="border-end">E-mail</th>
				<th class="border-end">Phone</th>
				<th class="border-end">Ip</th>
				<th class="border-end">City</th>
				<th class="border-end">Date</th>
				<th class="text-center" width="70px">Action</th>
			</tr>
		</thead>
		<tbody>
			{foreach $feedback_orders as $order}
				<tr>
					<td class="border-end text-center">{$order.id}</td>
					<td class="border-end">{$order.subject}</td>
					<td class="border-end">{$order.name}</td>
					<td class="border-end">{$order.email}</td>
					<td class="border-end">{$order.phone}</td>
					<td class="border-end">{$order.ip}</td>
					<td class="border-end">{$order.city}</td>
					<td class="border-end">{$order.created_at}</td>
					<td class="text-center">
						<div class="btn-group">
							<form method="POST" action="#" style="display:inline;">
								<input type="hidden" name="delete_feedback_id" value="{$order.id}">
								<button type="submit" class="no-b mx-1" onclick="return confirm('Вы уверены, что хотите удалить эту заявку?');">
									<i class="fa fa-trash"></i>
								</button>
							</form>
						</div>
					</td>
				</tr>
				<tr>
					<td class="pb-3" colspan="8"><pre>Текст: {$order.message}</pre></td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>
<script>
	var oaaSection = document.getElementById('oaaSection');
	oaaSection.classList.add('active');
	var ordersAndApplications = document.getElementById('ordersAndApplications');
	ordersAndApplications.classList.add('show');
	var currentLink = document.getElementById('feedbackRequests');
	currentLink.classList.add('active');
</script>