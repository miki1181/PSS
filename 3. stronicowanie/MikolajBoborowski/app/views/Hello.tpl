{extends file="main.tpl"}

{block name="title"}Strona główna{/block}

{block name="content"}
    <h1>Witaj w aplikacji Budżet Domowy!</h1>
    <p>Wybierz opcję z menu powyżej.</p>
    {if $recent_transactions|@count > 0}
    <h3>Twoje ostatnie transakcje:</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Kategoria</th>
                <th>Kwota</th>
                <th>Typ</th>
            </tr>
        </thead>
        <tbody>
            {foreach $recent_transactions as $transaction}
                <tr>
                    <td>{$transaction.data_transakcji}</td>
                    <td>{$transaction.kategoria|escape}</td>
                    <td>{$transaction.kwota|number_format:2} zł</td>
                    <td>{$transaction.typ}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{/if}

{/block}