{block name="pagination"}
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <!-- Кнопка "Назад" -->
      {if $currentPage > 1}
        <li class="page-item"><a class="page-link" href="?page={$currentPage-1}" aria-label="Previous">Назад</a></li>
      {else}
        <li class="page-item disabled"><span class="page-link">Назад</span></li>
      {/if}
      {foreach $pagination as $page}
        <li class="page-item {$page.class}"><a class="page-link" href="?page={$page.number}">{$page.label}</a></li>
      {/foreach}
      <!-- Кнопка "Вперед" -->
      {if $currentPage < $totalPages}
        <li class="page-item"><a class="page-link" href="?page={$currentPage+1}" aria-label="Next">Вперёд</a></li>
      {else}
        <li class="page-item disabled"><span class="page-link">Вперёд</span></li>
      {/if}
    </ul>
  </nav>
{/block}