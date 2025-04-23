{extends file="templates/main.tpl"}

{block name="title"}Transakcje{/block}
{block name="content"}
    <h1>Transakcje</h1>

    {foreach $msgs->getMessages() as $msg}
      <div class="alert 
                  {if $msg->isInfo()}alert-success{/if}
                  {if $msg->isWarning()}alert-warning{/if}
                  {if $msg->isError()}alert-danger{/if}"
           role="alert">
        {$msg->text}
      </div>
    {/foreach}

    {* ➔ teraz AJAX: dodawanie *}
    <form id="add-transaction-form" class="mb-4"
          onsubmit="
            ajaxPostForm(
              'add-transaction-form',
              '{$conf->action_root}addTransactionPart',
              'transactions-table'
            );
            return false;
          "
          method="POST">
      <div class="mb-3">
        <label for="amount" class="form-label">Kwota</label>
        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Typ</label>
        <select class="form-select" id="type" name="type" required>
          <option value="przychód">Przychód</option>
          <option value="wydatek">Wydatek</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Kategoria</label>
        <input type="text" class="form-control" id="category" name="category" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Opis</label>
        <textarea class="form-control" id="description" name="description"
                  placeholder="*Opis niewymagany*"></textarea>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Data</label>
        <input type="date" class="form-control" id="date" name="date"
               value="{$smarty.now|date_format:'%Y-%m-%d'}" required>
      </div>
      <button type="submit" class="btn btn-primary">Dodaj transakcję</button>
    </form>

    <div id="transactions-table">
      {include file="transactionsTable.tpl"}
    </div>
{/block}
