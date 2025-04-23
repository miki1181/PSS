{* app/views/transactionsTable.tpl *}
<table class="table table-striped">
  <thead>
    <tr>
      <th>Data</th>
      <th>Opis</th>
      <th>Kategoria</th>
      <th>Kwota</th>
      <th>Akcje</th>
    </tr>
  </thead>
  <tbody>
    {foreach $transactions as $tr}
      <tr>
        <td>{$tr.data_transakcji}</td>
        <td>{$tr.opis}</td>
        <td>{$tr.kategoria}</td>
        <td>{$tr.kwota|number_format:2:'.':','}</td>
        <td>
          <a href="{$conf->action_root}editTransaction?id={$tr.id}"
             class="btn btn-sm btn-warning me-1">
            Edytuj
          </a>
          <form id="del-{$tr.id}"
                onsubmit="ajaxPostForm(
                            this.id,
                            '{$conf->action_root}deleteTransaction',
                            'transactions-table'
                          ); return false;"
                method="POST" style="display:inline">
            <input type="hidden" name="transaction_id" value="{$tr.id}" />
            <button type="submit" class="btn btn-sm btn-danger">Usuń transakcję</button>
          </form>
        </td>
      </tr>
    {/foreach}
  </tbody>
</table>

<div class="pagination mt-4">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      {if $current_page > 1}
        <li class="page-item">
          <a class="page-link" href="?page={$current_page-1}" aria-label="Poprzednia">&laquo;</a>
        </li>
      {else}
        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
      {/if}

      {section name=pg start=1 loop=$total_pages+1}
        {if $smarty.section.pg.index == $current_page}
          <li class="page-item active"><span class="page-link">{$smarty.section.pg.index}</span></li>
        {else}
          <li class="page-item"><a class="page-link" href="?page={$smarty.section.pg.index}">{$smarty.section.pg.index}</a></li>
        {/if}
      {/section}

      {if $current_page < $total_pages}
        <li class="page-item">
          <a class="page-link" href="?page={$current_page+1}" aria-label="Następna">&raquo;</a>
        </li>
      {else}
        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
      {/if}
    </ul>
  </nav>
</div>
