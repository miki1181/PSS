{extends file="main.tpl"}

{block name="title"}Filtrowanie i Sortowanie Transakcji{/block}

{block name="content"}
    <h1>Filtrowanie i Sortowanie Transakcji</h1>

    {foreach $msgs->getMessages() as $msg}
        <div class="alert 
                    {if $msg->isInfo()}alert-success{/if}
                    {if $msg->isWarning()}alert-warning{/if}
                    {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}

    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="type" class="form-label">Typ</label>
                <select name="type" id="type" class="form-select">
                    <option value="">Wszystkie</option>
                    <option value="przychód" {if $filter.type == 'przychód'}selected{/if}>Przychód</option>
                    <option value="wydatek" {if $filter.type == 'wydatek'}selected{/if}>Wydatek</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="category" class="form-label">Kategoria</label>
                <input type="text" name="category" id="category" class="form-control" value="{$filter.category|escape}">
            </div>
            <div class="col-md-3">
                <label for="sort" class="form-label">Sortuj według</label>
                <select name="sort" id="sort" class="form-select">
                    <option value="data_transakcji_desc" {if $filter.sort == 'data_transakcji_desc'}selected{/if}>Data (najnowsze)</option>
                    <option value="data_transakcji_asc" {if $filter.sort == 'data_transakcji_asc'}selected{/if}>Data (najstarsze)</option>
                    <option value="kwota_desc" {if $filter.sort == 'kwota_desc'}selected{/if}>Kwota (malejąco)</option>
                    <option value="kwota_asc" {if $filter.sort == 'kwota_asc'}selected{/if}>Kwota (rosnąco)</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filtruj</button>
            </div>
        </div>
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
                </tr>
            {/foreach}
        </tbody>
    </table>
{/block}
