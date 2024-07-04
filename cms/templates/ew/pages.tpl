{$page.full_desc}
{if $currentUrl == '/contacts'}
    {include file="./submit_feedback.tpl"}
{/if}
<script>
	var activeButton = document.getElementById('{$page.alt_name}');
	activeButton.classList.add('active');
</script>