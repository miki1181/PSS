{extends file="templates/main.tpl"}

{block name="title"}Analiza Budżetu{/block}

{block name="content"}
    <h1>Analiza Budżetu</h1>

    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Data początkowa</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{$startDate}">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Data końcowa</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{$endDate}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Analizuj</button>
            </div>
        </div>
    </form>

    <h3>Podsumowanie</h3>
    <ul class="list-group mb-4">
        <li class="list-group-item">Suma przychodów: <strong>{$incomeSum|number_format:2} zł</strong></li>
        <li class="list-group-item">Suma wydatków: <strong>{$expenseSum|number_format:2} zł</strong></li>
        <li class="list-group-item">Bilans: 
            <strong class="{if $balance >= 0}text-success{else}text-danger{/if}">
                {$balance|number_format:2} zł
            </strong>
        </li>
    </ul>

    <h3>Podział wydatków na kategorie</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kategoria</th>
                <th>Suma wydatków</th>
            </tr>
        </thead>
        <tbody>
            {foreach $expenseBreakdown as $expense}
                <tr>
                    <td>{$expense.kategoria|escape}</td>
                    <td>{$expense.suma|number_format:2} zł</td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    <h3>Podział przychodów na kategorie</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kategoria</th>
                <th>Suma przychodów</th>
            </tr>
        </thead>
        <tbody>
            {foreach $incomeBreakdown as $income}
                <tr>
                    <td>{$income.kategoria|escape}</td>
                    <td>{$income.suma|number_format:2} zł</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{/block}
