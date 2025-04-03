{extends file="main.tpl"}

{block name="title"}Transakcje{/block}

{block name="content"}
    <h1>Transakcje</h1>

    {foreach $msgs->getMessages() as $msg}
        <div class="alert 
                    {if $msg->isInfo()}alert-success{/if}
                    {if $msg->isWarning()}alert-warning{/if}
                    {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}

    <form method="POST" class="mb-4">
        <h3>Dodaj nową transakcję</h3>
        <div class="mb-3">
            <label for="amount" class="form-label">Kwota</label>
            <input type="number" class="form-control" id="amount" name="amount" step="1" required>
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
            <textarea class="form-control" id="description" placeholder="*Opis niewymagany*" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{date('Y-m-d')}" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj transakcję</button>
    </form>

    <h3>Historia transakcji</h3>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Kwota</th>
                <th>Typ</th>
                <th>Kategoria</th>
                <th>Opis</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            {foreach $transactions as $transaction}
                <tr>
                    <td>{$transaction.data_transakcji}</td>
                    <td>{$transaction.kwota|number_format:2}</td>
                    <td>{$transaction.typ}</td>
                    <td>{$transaction.kategoria|escape}</td>
                    <td>{$transaction.opis|escape}</td>
                    <td>
                        <a href="editTransaction?id={$transaction.id}" class="btn btn-warning btn-sm">Edytuj</a>
                    <form method="POST" action="deleteTransaction" style="display: inline;">
                        <input type="hidden" name="transaction_id" value="{$transaction.id}">
                        <button type="submit" class="btn btn-danger btn-sm">Usuń transakcję</button>
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
                    <a class="page-link" href="?page={$current_page-1}" aria-label="Poprzednia">
                        &laquo;
                    </a>
                </li>
            {else}
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            {/if}
            
            {for $page=1 to $total_pages}
                <li class="page-item {if $current_page == $page}active{/if}">
                    <a class="page-link" href="?page={$page}">{$page}</a>
                </li>
            {/for}

            {if $current_page < $total_pages}
                <li class="page-item">
                    <a class="page-link" href="?page={$current_page+1}" aria-label="Następna">
                        &raquo;
                    </a>
                </li>
            {else}
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            {/if}

        </ul>
    </nav>
</div>


{/block}
